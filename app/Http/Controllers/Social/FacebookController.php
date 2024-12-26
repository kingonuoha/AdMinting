<?php

namespace App\Http\Controllers\Social;

use Log;
use App\Models\User;
use Facebook\Facebook;
use Illuminate\Http\Request;
use App\Models\Socials\SocialPage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Socials\SocialAccount;
use App\Jobs\FetchFacebookPageMetrics;
use Facebook\PersistentData\PersistentDataInterface;
// use App\Http\Controllers\Social\FacebookController;

class FacebookController extends Controller
{
    protected $facebook, $since, $since30;

    // Inject the Facebook SDK through the constructor
    public function __construct(Facebook $facebook)
    {
        // Define time range for the last 90 days
        $this->since = strtotime('-90 days');
        $this->since30 = strtotime('-20 days');
        $this->facebook = $facebook;
    }

    // Method to get login URL
    public function getLoginUrl()
    {


        // dd(config("facebook.redirect_uri"));
        $helper = $this->facebook->getRedirectLoginHelper();
        $permissions = [
            "email",
            "read_insights",
            "pages_show_list",
            "business_management",
            "instagram_basic",
            "instagram_manage_insights",
            "pages_read_engagement",
            "pages_read_user_content",
            "pages_manage_posts",
        ];
        return $helper->getLoginUrl(route('facebook.callback'), $permissions);
    }


    // Method to get the authenticated user's account info (name, id, avatar, etc.)
    public function getUserAccountInfo($accessToken)
    {
        // Set the access token for the request
        $this->facebook->setDefaultAccessToken($accessToken);

        try {
            // Fetch the authenticated user's information from the Graph API
            $response = $this->facebook->get('/me?fields=id,name,picture.width(800).height(800){is_silhouette,url},education,about');
            $userAccountInfo = $response->getDecodedBody();

            // You can now return the user's info (name, id, avatar, etc.)
            return $userAccountInfo; // Example: ['id' => '12345', 'name' => 'John Doe', 'picture' => 'https://...']
        } catch (\Exception $e) {
            // Handle errors
            return response()->json(['error' => 'Unable to fetch user account info: ' . $e->getMessage()], 400);
        }
    }




    // Method to fetch user access token
    public function getUserAccessToken($callbackUrl = null)
    {
        $helper = $this->facebook->getRedirectLoginHelper();

        // Use the correct absolute callback URL
        $callbackUrl = $callbackUrl ?? route('facebook.callback');

        return $helper->getAccessToken($callbackUrl);
    }


    // Method to fetch a list of pages
    public function getPageList($accessToken)
    {
        $this->facebook->setDefaultAccessToken($accessToken);
        $response = $this->facebook->get('/me/accounts');
        return $response->getDecodedBody();
    }


    // Method to fetch page insights
    public function getPageInfo($pageId, $accessToken)
    {
        $this->facebook->setDefaultAccessToken($accessToken);
        $response = $this->facebook->get("/{$pageId}?fields=link,picture.width(800).height(800){url,width,is_silhouette},about,username");
        return $response->getDecodedBody();
    }
    // Method to fetch page insights
    public function getPageEngagements($pageId, $accessToken)
    {
        $this->facebook->setDefaultAccessToken($accessToken);
        $response = $this->facebook->get("/{$pageId}/insights?metric=page_post_engagements,page_impressions_unique&since={$this->since}&period=day");
        return $response->getDecodedBody();
    }

    // Method to fetch page engagements
    public function getFollowersCount($pageId, $accessToken)
    {
        $this->facebook->setDefaultAccessToken($accessToken);
        $response = $this->facebook->get("/{$pageId}?fields=followers_count");
        return $response->getDecodedBody();
    }


    public function getInstagramAccounts($pageId, $accessToken, SocialAccount $socialAccount)
    {
        // Set the access token for Facebook SDK
        $this->facebook->setDefaultAccessToken($accessToken);

        // Step 1: Fetch Instagram Account Linked to the Facebook Page
        $igAccountResponse = $this->facebook->get("/{$pageId}?fields=instagram_business_account");
        $igAccountData = $igAccountResponse->getDecodedBody();

        if (!isset($igAccountData['instagram_business_account']['id'])) {
            return; // response()->json(['error' => 'No Instagram Business Account linked to this page'], 404);
        }

        $instagramId = $igAccountData['instagram_business_account']['id'];

        // handle insights from IG pages
        $response =  $this->getInstagramPageInsights($instagramId, $accessToken);



        $socialPage = $socialAccount->socialPages()->updateOrCreate([
            "page_id" => $response["instagram_details"]["id"]

        ], [
            'platform' => "instagram",
            'picture' =>  ["url" => $response["instagram_details"]["profile_picture_url"]],
            'link' =>  $response["instagram_details"]["link"],
            'about' =>  $response["instagram_details"]["about"],
            'page_name' => $response["instagram_details"]["name"],
            'access_token' => $accessToken,
            'token_expires_at' => null,
        ]);

        // save metric
        foreach ($response["metrics"] as $key =>  $metric) {

            $socialPage->metrics()->updateOrCreate([
                "name" => $key
            ], [
                'value' => $metric,
                'captured_at' => now(),
            ]);
        }
        // save metric
        foreach ($response["snapshots"] as $key =>  $snapshot) {

            if ($key === "posts") {

                $socialPage->snapshots()->updateOrCreate([
                    "name" => $key
                ], [
                    'title' => "instagram posts",
                    'description' => "latest 30 posts on your facebook page",
                    'data' =>  $snapshot,
                    'created_at' => now(),
                ]);
            } else {
                if (!empty($snapshot)) {

                    $socialPage->snapshots()->updateOrCreate([
                        "name" => $key
                    ], [
                        'title' => $snapshot["title"],
                        'description' => $snapshot["description"],
                        'data' =>  $snapshot["data"],
                        'created_at' => now(),
                    ]);
                }
            }
            //    save in snapshot 

        }

        $socialPage->update([
            "details_gotten_at" => now()
        ]);
        // dd();
        return true;
    }

    // Method to fetch page insighst from IG page
    // Method to fetch page insights from IG page
    public function getInstagramPageInsights($instagramId, $accessToken)
    {
        try {
            // Set the access token for Facebook SDK
            $this->facebook->setDefaultAccessToken($accessToken);

            // Step 1: Fetch Instagram Account Details
            $igDetailsResponse = $this->facebook->get("/{$instagramId}?fields=name,username,biography,profile_picture_url.width(800),followers_count,media_count");
            $igDetails = $igDetailsResponse->getDecodedBody();

            // Step 2: Fetch Instagram Insights (e.g., Reach, Impressions)
            $igInsightsResponse = $this->facebook->get("/{$instagramId}/insights?metric=impressions,reach&period=day&since={$this->since30}");
            $igInsights = $igInsightsResponse->getDecodedBody();

            // Step 3: Fetch Media Posts
            $igMediaResponse = $this->facebook->get("/{$instagramId}/media?fields=id,caption,media_type,media_url,thumbnail_url,permalink,like_count,comments_count,timestamp&limit=30");
            $igMediaData = $igMediaResponse->getDecodedBody();

            $mediaPosts = [];
            if (!empty($igMediaData['data'])) {
                foreach ($igMediaData['data'] as $media) {
                    // Calculate engagement rate for each post
                    $likes = $media['like_count'] ?? 0;
                    $comments = $media['comments_count'] ?? 0;
                    $engagementRate = (($likes + $comments) / max($igDetails['followers_count'], 1)) * 100;

                    // Append media post data
                    $mediaPosts[] = [
                        'id' => $media['id'],
                        'caption' => $media['caption'] ?? 'No Caption',
                        'media_type' => $media['media_type'],
                        'media_url' => $media['media_url'] ?? '--',
                        'permalink' => $media['permalink'],
                        'thumbnail_url' => $media['thumbnail_url'] ?? null,
                        'like_count' => $likes,
                        'comments_count' => $comments,
                        'engagement_rate' => round($engagementRate, 2) . '%',
                        'timestamp' => $media['timestamp'],
                    ];
                }
            }

            // Step 4: Perform Calculations for Overall Insights
            $followersCount = $igDetails['followers_count'] ?? 0;
            $mediaCount = $igDetails['media_count'] ?? 0;

            $insightsData = [];
            $insightsRawData = [];
            if (!empty($igInsights['data'])) {
                foreach ($igInsights['data'] as $insight) {
                    // dd($insight['values'], $insight);
                    $insightsData[$insight['name']] = array_sum(array_column($insight['values'], 'value'));
                    $insightsRawData[$insight['name']] = [
                        "title" => $insight['title'],
                        "name" => $insight['name'],
                        "description" => $insight['description'],
                        "data" => $insight['values']
                    ];
                }
            }

            // Engagement Rate = (Total Engagements / Followers Count) * 100
            $engagementRate = ($insightsData['impressions'] ?? 0) / max($followersCount, 1) * 100;

            // Average Impressions per Media
            $avgImpressionsPerMedia = ($insightsData['impressions'] ?? 0) / max($mediaCount, 1);

            // /generate instagram profile link 
            $igLink = "https://www.instagram.com/{$igDetails['username']}/";
            // Step 5: Prepare Response Data
            $response = [
                'instagram_details' => [
                    'id' => $instagramId,
                    'name' => $igDetails['name'],
                    'username' => $igDetails['username'],
                    'link' => $igLink,
                    'about' => $igDetails['biography'] ?? '--',
                    'profile_picture_url' => $igDetails['profile_picture_url'] ?? '',
                ],
                'metrics' => [
                    'media_count' => $mediaCount,
                    'followers' => $followersCount,
                    'page_post_impressions' => $insightsData['impressions'] ?? 0,
                    'reach' => $insightsData['reach'] ?? 0,
                    'engagement_rate' => round($engagementRate, 2),
                    'average_post_engagement' => round($avgImpressionsPerMedia, 2),
                ],
                'snapshots' => [
                    'page_post_impressions' => $insightsRawData["impressions"],
                    'page_post_engagements' => [],
                    'posts' => $mediaPosts,

                ]
            ];




            return $response;
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }


    // Method to fetch page engagements
    public function getPostsWithEngagementRates($pageId, $accessToken)
    {
        // Fetch posts
        $this->facebook->setDefaultAccessToken($accessToken);
        $postsResponse = $this->facebook->get("/{$pageId}/posts?fields=id,message,created_time,full_picture.width(1000)&limit=30");
        $postsData = $postsResponse->getDecodedBody()['data'];

        $postsWithEngagementRate = [];
        $totalEngagements = 0;
        foreach ($postsData as $post) {
            // Fetch impressions for the post
            $impressionsResponse = $this->facebook->get("/{$post['id']}/insights?metric=post_impressions_unique");
            $impressionsData = $impressionsResponse->getDecodedBody()['data'][0] ?? null;

            // Fetch engagements for the post
            $engagementsResponse = $this->facebook->get("/{$post['id']}/insights?metric=post_clicks");
            $engagementsData = $engagementsResponse->getDecodedBody()['data'][0] ?? null;

            // Extract values for impressions and engagements
            $impressions = $impressionsData['values'][0]['value'] ?? 0;
            $engagements = $engagementsData['values'][0]['value'] ?? 0;
            // sum up the engagement
            $totalEngagements += $engagement ?? 0;
            // Calculate engagement rate
            $engagementRate = $impressions > 0 ? ($engagements / $impressions) * 100 : 0;

            //   dd($postsData, $engagementsData, $impressionsData, $engagementRate);
            // Add post data with calculated engagement rate
            $postsWithEngagementRate[] = [
                'id' => $post['id'],
                'message' => $post['message'] ?? '(No message)',
                'full_picture' => $post['full_picture'] ?? "(no-media)",
                'created_time' => $post['created_time'],
                'impressions' => $impressions,
                'engagements' => $engagements,
                'engagement_rate' => round($engagementRate, 2), // Round to 2 decimal places
            ];
        }

        // Calculate average engagement
        $averageEngagement = $totalEngagements / max(count($postsData), 1);

        round($averageEngagement, 2); // Round to 2 decimal places

        return [$postsWithEngagementRate, round($averageEngagement, 2)]; // Round to 2 decimal places];
    }

    public function handlePageMetricAndSnapshot(SocialPage $SocialPage)
    {
        // // $page =  $socialAccount->socialPages()->where("page_id", "108629632054775")->first();

        // try {
            $engagementNimpression =  $this->getPageEngagements($SocialPage->page_id, $SocialPage->access_token);
            // save the raw engagement and impression data od e the past 90 days 
            $totalValueEngagement = 0;
            $totalValueImpression = 0;
            foreach ($engagementNimpression['data'] as $data) {
                if ($data['name'] == "page_post_engagements") {
                    //    save in snapshot 
                    $SocialPage->snapshots()->updateOrCreate([
                        "name" => $data['name']
                    ], [
                        'title' => $data['title'],
                        'description' => $data['description'],
                        'data' => $data['values'],
                        'created_at' => now(),
                    ]);

                    // calculate and summ all the values and save in metrics
                    $totalValueEngagement = array_sum(array_column($data['values'], 'value'));
                    //    save in metric
                    $SocialPage->metrics()->updateOrCreate([
                        "name" => $data['name']
                    ], [
                        'value' => $totalValueEngagement,
                        'captured_at' => now(),
                    ]);
                }

                if ($data['name'] == "page_impressions_unique") {
                    //    save in snapshot 
                    $SocialPage->snapshots()->updateOrCreate([
                        "name" => "page_post_impressions"
                    ], [
                        'title' => $data['title'],
                        'description' => $data['description'],
                        'data' => $data['values'],
                        'created_at' => now(),
                    ]);

                    // calculate and summ all the values and save in metrics
                    $totalValueImpression = array_sum(array_column($data['values'], 'value'));
                    //    save in metric
                    $SocialPage->metrics()->updateOrCreate([
                        "name" => "page_post_impressions"
                    ], [
                        'value' => $totalValueImpression,
                        'captured_at' => now(),
                    ]);
                }
               
                // }
            }

                // Calculate the engagement rate
                if ($totalValueImpression > 0) {
                    $engagementRate = round(($totalValueEngagement / $totalValueImpression) * 100);
                    //    save in metric
                    $SocialPage->metrics()->updateOrCreate([
                        "name" => "engagement_rate"
                    ], [
                        'value' => $engagementRate,
                        'captured_at' => now(),
                    ]);
                }

            // get followers 
            $followers =  $this->getFollowersCount($SocialPage->page_id, $SocialPage->access_token);
            $SocialPage->metrics()->updateOrCreate([
                "name" => "followers"
            ], [
                'value' => $followers['followers_count'],
                'captured_at' => now(),
            ]);
            // after saving, we collect and calculate other metrics and save in the metric such as posts

            // dd($page->access_token);
            // get all posts
            $posts = $this->getPostsWithEngagementRates($SocialPage->page_id, $SocialPage->access_token);
            // save posts in snapshot
            //    save in snapshot 
            $SocialPage->snapshots()->updateOrCreate([
                "name" => "posts"
            ], [
                'title' => "facebook posts",
                'description' => "latest 10 posts on your facebook page",
                'data' => $posts[0],
                'created_at' => now(),
            ]);

            // create average post engagement metric 
            $SocialPage->metrics()->updateOrCreate([
                "name" => "average_post_engagement"
            ], [
                'value' => $posts[1],
                'captured_at' => now(),
            ]);
            return true;
        // } catch (\Throwable $th) {
        //    dd( $th->getMessage());
        // }
    }




    public function facebook_redirect()
    {
        $loginUrl = $this->getLoginUrl();
        // Get the persistent data handler from the service container
        $persistentDataHandler = app(PersistentDataInterface::class);

        // Fetch the 'state' directly from the persistent data handler
        $state = $persistentDataHandler->get('state');
        session(['facebook_state' => $state]);

        return redirect()->to($loginUrl);
    }


    public function facebook_callBack(Request $request)
    {
        //    dd(auth()->user());
        // try {
        $user = User::find(auth()->user()->id);
        // Get the state from the request and compare it to the state stored in persistent data
        $stateFromRequest = $request->get('state');

        // Get the persistent data handler from the service container
        $persistentDataHandler = app(PersistentDataInterface::class);

        // Retrieve the state stored in the persistent data handler
        $storedState =  $persistentDataHandler->get("state"); // Retrieve the state from session;
        // Validate the state to prevent CSRF
        if ($stateFromRequest !== $storedState) {
            throw new \Exception('State mismatch: possible CSRF attack!, pls try again');
        }

        // Get the access token from Facebook
        $accessToken = $this->getUserAccessToken();

        // Fetch the authenticated user's account info (e.g., name, ID, avatar)
        $userAccountInfo = $this->getUserAccountInfo($accessToken);
        //  get authenticated User

        $socialAccount = $user->socialAccounts()->updateOrCreate([
            'account_id' => $userAccountInfo["id"],
            'platform' => "facebook",
        ], [
            // if the profile picture is null that is it is a silhouette, then keep null 
            'profile' => ($userAccountInfo["picture"]['data']['is_silhouette']) ? "" : $userAccountInfo["picture"]['data']['url'],
            'name' => $userAccountInfo["name"],
            'access_token' => $accessToken,
            'token_expires_at' => null,
        ]);
        //  dd($userAccountInfo, $accessToken, $createSocialAccount, $storedState, $request->all());



        // begin get page details 
        // $socialAccount = $user->socialAccounts->first();
        // // Get the list of pages that the user manages
        $pageList = $this->getPageList($socialAccount->access_token);
        foreach ($pageList['data'] as $page) {
            // check if the user has the social page already
            // get other info about page
            $pageInfo = $this->getPageInfo($page['id'], $page['access_token']);
            // check if page has instagram 
            // dd($IGPageInfo);
            // dd($pageInfo);
            $SocialPage = $socialAccount->socialPages()->updateOrCreate([
                'page_id' => $page['id'],
            ], [
                'platform' => "facebook",
                'link' => $pageInfo["link"] ?? null,
                'picture' =>  $pageInfo["picture"]['data'],
                'about' =>  isset($pageInfo["about"]) ? $pageInfo["about"] : "-",
                'page_name' => $page['name'],
                'access_token' => $page['access_token'],
                'token_expires_at' => null,
            ]);

            FetchFacebookPageMetrics::dispatch($SocialPage)->onQueue('facebook-metrics');

            //     $this->handlePageMetricAndSnapshot($SocialPage);
            //     // end get page details 

            //     $IGPageInfo = $this->getInstagramAccounts($page['id'], $page['access_token'], $socialAccount);
            //     // // get page insights 
            //     // // $socialAccount = $user->socialAccounts->first();

        }
        // dd($posts);
        // $engagementNimpression['data'];
        return redirect()->route('profile.socials', ["account" => $socialAccount->id, "getDetails" => true]);
        // } catch (\Exception $e) {
        //     dd("error", $e->getMessage(), $request->all());
        //     return redirect()->route('login')->with('error', 'Facebook authentication failed.');
        // }
        dd("done bruv!!");
    }
}
