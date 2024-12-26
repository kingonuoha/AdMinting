<?php

namespace App\Http\Controllers\Social;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Socials\Metric;
use App\Models\Socials\Snapshot;
use App\Providers\GoogleService;
use App\Models\Socials\SocialPage;
use App\Http\Controllers\Controller;
use Google\Service\YouTubeAnalytics;
use App\Models\Socials\SocialAccount;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    //
    public function google_redirect(Request $request)
    {
        $client = app('google.client');
        $authUrl = $client->createAuthUrl();
        $isAuthenticating = $request->query('is_authenticating', false);
        if ($isAuthenticating ) {
            session(['is_authenticating' => true]);
        }

        // dd($authUrl);
        // dd(session()->all());

        return redirect($authUrl);
    }

    public function google_callBack(Request $request)
    {

            // dd(session()->all());

        $client = app('google.client');
        $authCode = $request->input('code');
        $isAuthenticating = session('is_authenticating') ?? false;

        // Fetch access token
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

        if (isset($accessToken['error'])) {
            return response()->json(['error' => $accessToken['error_description']], 400);
        }

        $client->setAccessToken($accessToken);
        $oauthService = new \Google\Service\Oauth2($client);
        $userInfo = $oauthService->userinfo->get();

        if ($isAuthenticating) {
            // dd(session()->all());
            session()->forget('is_authenticating');
            // **Authenticate or create user account**
            return $this->handleUserAuthentication($userInfo, $accessToken);
        } else {
            // **Handle existing logic for fetching data**
            return $this->handleExistingCallbackLogic($userInfo, $accessToken);
        }

        // return response()->json(['message' => 'Google account, YouTube channels, and insights fetched successfully.']);
    }

    protected function handleUserAuthentication($userInfo, $accessToken)
    {
        $existingUser = User::where('email', $userInfo->email)->first();

        if ($existingUser) {
            // Log in the user
            Auth::login($existingUser);
            $message = "Welcome back! You are now logged in.";
            } else {
                // get high res photo
                $highResPictureUrl = str_replace("s96-c", "s1000-c", $userInfo->picture);
            // Create a new user
            $newUser = User::create([
                'name' => $userInfo->name,
                'email' => $userInfo->email,
                'password' => bcrypt(Str::random(16)), // Generate a random password
                'username' => isset($userInfo->given_name) ? Str::slug($userInfo->given_name) . rand(1000, 9999) : null, // Generate a unique username if provided
                'role' => 'creator', // Default role
                'rating' => 0.0, // Default rating
                'auth_type' => 'google', // Set auth type to Google
                'dialogue_last_complete' => 0, // Default value
                'dialogue_complete' => false, // Default value
                'primary_social' => 'google', // Set Google as primary social
                'bank_details' => null, // Leave as null since it's not provided yet
                'blocked' => false, // Default value
                'profile_photo_path' => $highResPictureUrl ?? null, // Save profile picture if available
                'email_verified_at' => now(), // Mark email as verified
            ]);

            Auth::login($newUser);
            $message = "Your account has been created through google auth and you're logged in.";
        }

        createLog($message, getIcon('shield-thunder'), "success", auth()->user()->id);

        $handleExistingCallbackLogic = $this->handleExistingCallbackLogic($userInfo, $accessToken, true);

       
    }

    protected function handleExistingCallbackLogic($userInfo, $accessToken, $isAuth = false)
    {
        $adcre8User = User::find(auth()->user()->id);

        // dd($userInfo);
        $socialAccount = $this->storeSocialAccount($userInfo, $accessToken, $adcre8User);
        // $socialAccount = SocialAccount::find(2);
        // Fetch YouTube Channels
        $this->fetchChannels($socialAccount);

        // Fetch Insights for each channel
        foreach ($socialAccount->socialPages as $socialPage) {
            $this->fetchChannelDemographics($socialPage);
            $this->fetchInsights($socialPage);
            $this->fetchPosts($socialPage);
        }
        $user =  $socialAccount->user;
        $message = "Google account, YouTube channels, and insights fetched successfully.!!";

        createLog($message, getIcon('warning'), "danger", $user->id);

        if ($isAuth) {
           // Redirect user to a specific page
        return redirect()->route('dashboard')->with('success', $message);
        } else {
            # code...
            return redirect()->route('profile.socials', ["account" => $socialAccount->id, "getDetails" => true]);
        }
        
    }

    public function storeSocialAccount($userInfo, $accessToken, $adcre8User = null)
    {

        $highResPictureUrl = str_replace("s96-c", "s1000-c", $userInfo->picture);
        return SocialAccount::updateOrCreate(
            [
                'platform' => 'google',
                'account_id' => $userInfo->id,
            ],
            [
                'user_id' => $adcre8User->id ?? null,
                'profile' =>  $highResPictureUrl,
                'name' => $userInfo->name,
                'access_token' => $accessToken["access_token"],
                'token_expires_at' => now()->addSeconds($accessToken['expires_in']),
            ]
        );
    }

    public function fetchChannels(SocialAccount $socialAccount)
    {
        $client = app('google.client');
        $client->setAccessToken($socialAccount->access_token);

        $youtube = new \Google\Service\YouTube($client);
        $channels = $youtube->channels->listChannels('snippet,statistics', ['mine' => true]);
        foreach ($channels as $channel) {
            // dd($channel->statistics->subscriberCount);
            $channelSaved = SocialPage::updateOrCreate(
                [
                    'page_id' => $channel->id,
                    'platform' => 'youtube',
                ],
                [
                    'social_account_id' => $socialAccount->id,
                    'picture' => $channel->snippet->thumbnails->high,
                    'about' => $channel->snippet->description,
                    'page_name' => $channel->snippet->title,
                    'access_token' => $socialAccount->access_token,
                    'token_expires_at' => $socialAccount->token_expires_at,
                ]
            );
            // subscriberCount
            $channelSaved->metrics()->updateOrCreate([
                'name' => "followers",
            ], [
                'value' => $channel->statistics->subscriberCount,
                'captured_at' => now(),
            ]);
        }
    }

    public function fetchInsights(SocialPage $socialPage)
    {
        $client = app('google.client');
        $client->setAccessToken($socialPage->access_token);

        $youtubeAnalytics = new \Google\Service\YouTubeAnalytics($client);
        $metrics = ['views', "likes", "dislikes", "comments", "shares",  'averageViewDuration'];
        $engagement = 0;
        $impression = 0;
        foreach ($metrics as $metric) {
            $result = $youtubeAnalytics->reports->query([
                'ids' => 'channel==' . $socialPage->page_id,
                'startDate' => '1970-01-01',  // Set a very early start date
                'endDate' => date('Y-m-d'),    // Set the end date to today
                'metrics' => $metric,
            ]);
            if (!empty($result['rows']) && $metric === "averageViewDuration") {
                // dd($result);
                $socialPage->metrics()->updateOrCreate([
                    'name' => "average_post_engagement",
                ], [
                    'value' => $result['rows'][0][0],
                    'captured_at' => now(),
                ]);
            } else {
                // dd($result);
                $socialPage->metrics()->updateOrCreate([
                    'name' => $metric,
                ], [
                    'value' => $result['rows'][0][0],
                    'captured_at' => now(),
                ]);
            }
            if (in_array($metric, ["likes", "dislikes", "comments", "shares"])) {
                $engagement += $result['rows'][0][0];
            }
            if ($metric === "views") {
                $impression += $result['rows'][0][0];
            }

            if ($impression > 0) {

                $engagement_rate = ($engagement / $impression) *  100;
                $socialPage->metrics()->updateOrCreate([
                    'name' => "engagement_rate",
                ], [
                    'value' => $engagement_rate,
                    'captured_at' => now(),
                ]);
            }
        }

        // dd($engagement, $impression);
    }

    public function fetchPosts(SocialPage $socialPage)
    {
        $client = app('google.client');
        $client->setAccessToken($socialPage->access_token);

        $youtube = new \Google\Service\YouTube($client);

        // Step 1: Fetch the last 30 videos
        $videos = $youtube->search->listSearch('snippet', [
            'channelId' => $socialPage->page_id,
            'order' => 'date',
            'maxResults' => 30,
        ]);

        $videoData = [];
        $videoIds = [];

        // Step 2: Collect video IDs
        foreach ($videos->getItems() as $video) {
            if ($video->id->kind === 'youtube#video') {
                $videoIds[] = $video->id->videoId;
            }
        }

        if (!empty($videoIds)) {
            // Step 3: Fetch video insights using the video IDs
            $videoDetails = $youtube->videos->listVideos('snippet,statistics', [
                'id' => implode(',', $videoIds),
            ]);

            foreach ($videoDetails->getItems() as $video) {
                // dd($videoDetails->getItems(), $video);
                $statistics = $video->statistics;
                $engagement = (int)($statistics->likeCount ?? 0) + (int)($statistics->commentCount ?? 0) + (int)($statistics->favoriteCount ?? 0) + (int)($statistics->dislikeCount ?? 0);
                $impressions = (int)($statistics->viewCount ?? 0);
                $engagementRate = $impressions > 0 ? round(($engagement / $impressions) * 100, 2) : 0;

                $videoData[] = [
                    'title' => $video->snippet->title,
                    'description' => $video->snippet->description,
                    'name' => $video->id,
                    'picture' => $video->snippet->thumbnails->high->url ?? null,
                    'published_at' => $video->snippet->publishedAt,
                    'engagement' => $engagement,
                    'impressions' => $impressions,
                    'engagement_rate' => $engagementRate, // Engagement rate in percentage
                ];
            }
        }

        // Step 4: Save data as a snapshot
        $socialPage->snapshots()->updateOrCreate([
            'name' => 'posts',
        ], [
            'title' => 'YouTube channel videos',
            'description' => 'Last 30 videos in YouTube channel with insights',
            'data' => $videoData,
            'created_at' => now(),
        ]);
    }

    public function fetchChannelDemographics(SocialPage $socialPage)
    {
        $client = app('google.client');
        $client->setAccessToken($socialPage->access_token);

        $youtubeAnalytics = new YouTubeAnalytics($client);

        // Query for gender demographic
        $genderDemographics = $youtubeAnalytics->reports->query([
            'ids' => 'channel==' . $socialPage->page_id,
            'startDate' => now()->subDays(90)->toDateString(),
            'endDate' => now()->toDateString(),
            'metrics' => 'viewerPercentage',
            'dimensions' => 'gender',
        ]);

        // Query for geographic location
        $geoDemographics = $youtubeAnalytics->reports->query([
            'ids' => 'channel==' . $socialPage->page_id,
            'startDate' => now()->subDays(90)->toDateString(),
            'endDate' => now()->toDateString(),
            'metrics' => 'views', // 'views' is a supported metric for geographical breakdown
            'dimensions' => 'country',
        ]);

        // dd($genderDemographics, $geoDemographics);
        $genderData = [];
        foreach ($genderDemographics['rows'] as $row) {
            $genderData[] = [
                'gender' => $row[0],
                'percentage' => $row[1],
            ];
        }

        // Sort and get the top 7 countries based on viewer percentage
        $geoData = [];
        foreach ($geoDemographics['rows'] as $row) {
            $geoData[] = [
                'country' => $row[0],
                'percentage' => $row[1],
            ];
        }
        usort($geoData, fn($a, $b) => $b['percentage'] <=> $a['percentage']);  // Sort in descending order
        $geoData = array_slice($geoData, 0, 7);  // Top 7 countries

        // Save in snapshots table
        $socialPage->snapshots()->updateOrCreate([
            "name" => "demographics"
        ], [
            'title' => "Channel Demographics",
            'description' => "Gender and geographic demographics of the channel",
            'data' => [
                'gender' => $genderData,
                'geography' => $geoData
            ],
            'captured_at' => now(),
        ]);
    }
}
