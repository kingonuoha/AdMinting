<?php

namespace App\Http\Controllers\Social;


use Exception;
use Google\Client;
use Google_Client;
use App\Models\User;
use Facebook\Facebook;
use Google\Service\YouTube;
use Google_Service_YouTube;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Facebook\Exception\SDKException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Facebook\Exception\ResponseException;
use Google\Service\Oauth2\Userinfo;
use Illuminate\Support\Facades\Artisan;
use JoelButcher\Facebook\Facades\Facebook as FacebookFacade;

class ADMAuthSocials extends Controller
{
    //
    public function tiktok_redirect()
    {
      // config('tiktok.redirect', route('tiktok.redirect'));
      $clientId = env('TIKTOK_CLIENT_KEY');
      $redirectUrl = route('tiktok.callback');
      $scopes = 'user.info';

      $loginUrl = "https://www.tiktok.com/v2/auth/authorize/?client_key=$clientId&redirect_uri=$redirectUrl&response_type=code&scope=$scopes";
      return redirect()->away($loginUrl);

    }

    public function tiktok_callBack(Request $request)
    {
      $code = $request->input('code');

      $clientId = 'your_tiktok_app_id';
      $clientSecret = 'your_tiktok_app_secret';
      $redirectUrl = 'your_redirect_url';

      $client = new \GuzzleHttp\Client();
      $response = $client->post("https://open-api.tiktok.com/platform/oauth/access_token/", [
          'form_params' => [
              'client_key' => $clientId,
              'client_secret' => $clientSecret,
              'code' => $code,
              'grant_type' => 'authorization_code',
              'redirect_uri' => $redirectUrl,
          ],
      ]);

      $accessToken = json_decode($response->getBody(), true)['access_token'];

      // Now you can use the $accessToken to make API requests to TikTok on behalf of the user.
    }
    public function google_redirect()
    {
      
        // return Socialite::driver('google')
        // ->scopes([
        //   'https://www.googleapis.com/auth/youtube.readonly',
        //   'https://www.googleapis.com/auth/youtube.force-ssl',
        //   ])
        //   ->redirect();
          
          
          $client = $this->createGoogleClient();
          $client->setScopes([
          'https://www.googleapis.com/auth/youtube.readonly',
            'https://www.googleapis.com/auth/youtube.force-ssl',
        ]);

        $authUrl = $client->createAuthUrl();

        return redirect()->away($authUrl);
    }

    public function google_redirect_auth(Request $req)
    {
        if(isset($req->type)){
          config('google.redirect', "http://127.0.0.1:8000/0auth/google/callback?type=".$req->type);
        };
        return Socialite::driver('google')
        ->scopes([
          'openid',
          'https://www.googleapis.com/auth/userinfo.email',
          'https://www.googleapis.com/auth/userinfo.profile',
          'https://www.googleapis.com/auth/youtube.readonly',
          'https://www.googleapis.com/auth/youtube.force-ssl',
          ])
        ->redirect();

    }


    public function google_callBack(Request $request)
    {
      // dd(auth()->user()->email);
      // $G_user = Socialite::driver('google')->user();
      // Set token for the Google API PHP Client
      // $google_client_token = [
      //     'access_token' => $G_user->token,
      //     'refresh_token' => $G_user->refreshToken,
      //     'expires_in' => $G_user->expiresIn
      // ];

      // $client = new Client();
      // $client->setApplicationName("Laravel");
      // $client->setDeveloperKey(env('GOOGLE_SERVER_KEY'));
      // $client->setAccessToken(json_encode($google_client_token));

      // // Define service object for making API requests.
      // $service = new YouTube($client);
      
      // $queryParams = [
      //   // 'forUsername' => 'GoogleDevelopers',
      //   'managedByMe' => true,
      //   'onBehalfOfContentOwner' => $G_user->id//'YOUR_CONTENT_OWNER_ID'
      //   ];
        
      //   $response = $service->channels->listChannels('snippet,contentDetails,statistics', $queryParams);
      //   print_r($response);
      //   dd($response);
        
      // dd($G_user, 
      // auth()->user()->email, 
      // $G_user->email);
      // if($G_user->email == auth()->user()->email){
      //   $user = User::find(auth()->user()->id);
      //   $user->social_google_id = $G_user->id; 
      //   $user->social_google_profile = $G_user->getAvatar(); 
      //   $user->social_google_token = $G_user->token; 
      //   $user->save();
      //   return view('auth.ADM_OAuth_fallback');
      // }else{
      //   dd("Email do not match!");
      // }
      // dd('success');

      if(isset(request()->code)){
      //  dd(session('YoutubeData'));

        $client =  $this->createGoogleClient();
        $client->setScopes([
            'openid',
            'https://www.googleapis.com/auth/userinfo.email',
            'https://www.googleapis.com/auth/userinfo.profile',
            'https://www.googleapis.com/auth/youtube.force-ssl',
        ]);
      
        $client->fetchAccessTokenWithAuthCode($request->code);

        $service = new Youtube($client);
        // $google_user = new Google_Client($client);
        $channels = $service->channels->listChannels('snippet,contentDetails,statistics,id', ['mine' => true]);
        Session::put("YoutubeData", $channels);
        // Access the list of channels and their details
        // Authenticated user 
        $user = User::find(auth()->user()->id);
        foreach($channels->getItems() as $channel){
          // data array for uniform creation and updating
          $insertArray = [
            "channelId" => $channel->id,
            "token" => $client->getAccessToken()['access_token'],
            "channelName" => $channel->getSnippet()["title"],
            "channelThumb"=> $channel->getSnippet()->getThumbnails()->default['url'],            
            "subscriberCount"=> $channel->getStatistics()->subscriberCount,           
            "videoCount"=> $channel->getStatistics()->videoCount,           
            "viewCount"=> $channel->getStatistics()->viewCount,
            "data"            => $channel
          ];
          // create a new channel if channel has not been added
          if($user->channels()->where('channelId', $channel->id)->count() <= 0){
            $user->channels()->create($insertArray);
          }else{
            // problem the "data" array has issues converting to json error is "cannot convert object to string :(
            $user->channels()->where('channelId', $channel->id)->update([
              "token" => $client->getAccessToken()['access_token'],
              "channelName" => $channel->getSnippet()["title"],
              "channelThumb"=> $channel->getSnippet()->getThumbnails()->default['url'],            
              "subscriberCount"=> $channel->getStatistics()->subscriberCount,           
              "videoCount"=> $channel->getStatistics()->videoCount,           
              "viewCount"=> $channel->getStatistics()->viewCount,
            ]);
            print('channel Updated! ');
          }
          //  dd($channel->getSnippet(), $channel->getStatistics(), $channel->getStatus());
        }
        // dd($channels, $client);

      }else{
       dd("An error Occured!! pls go back and try again!");
      };
      
        dd("Successfull, You can close this tab now.");
    }


    private function createGoogleClient()
    {
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri("http://127.0.0.1:8000/0auth/google/callback");
        $client->setDeveloperKey(env("GOOGLE_API_KEY"));

        return $client;
    }



    public function github_redirect()
    {
        return Socialite::driver('github')->redirect();
    }
    public function github_callBack()
    {
       $Git_user = Socialite::driver('github')->user();
       if($Git_user->email === auth()->user()->email){
        $user = User::find(auth()->user()->id);
        $user->social_github_id = $Git_user->id; 
        $user->social_github_profile = $Git_user->getAvatar(); 
        $user->social_github_token = $Git_user->token; 
        $user->save();
        return view('auth.ADM_OAuth_fallback');
      }else{
        dd("Email do not match!");
      }
    }

    public function linkedin_redirect()
    {
        return Socialite::driver('linkedin')->redirect();
    }
    public function linkedin_callBack()
    {
       $linkUser = Socialite::driver('linkedin')->user();
       $accessToken = $linkUser->token;

       $response = Http::withToken($accessToken)->get('https://api.linkedin.com/v2/me');
       $followerCount = $response;//['followers']['total'];
   
       dd($response, $followerCount);
       if($linkUser->email === auth()->user()->email){
        $user = User::find(auth()->user()->id);
        $user->social_linkedin_id = $linkUser->id; 
        $user->social_linkedin_profile = $linkUser->getAvatar(); 
        $user->social_linkedin_token = $linkUser->token; 
        $user->save();
        return view('auth.ADM_OAuth_fallback');
      }else{
        dd("Email do not match!");
      }
    }

    public function facebook_redirect(){
      // set the permissions (scopes)
    // by default the email and public_profile permission are added
    // in the HandlesAuthentication trait

    $scopes = ['pages_manage_posts', 'pages_read_engagement', 'pages_show_list'];
    
    $loginUrl = FacebookFacade::getRedirect(route('facebook.callback'), $scopes);
    
      return redirect()->away($loginUrl);
      // return Socialite::driver('facebook')->scopes([
      //   'public_profile', 'pages_show_list', 'pages_list_engagement', 'pages_manages_posts', 'pages_manage_metadata', 'user_videos', 'user_posts'
      // ])->redirect();
    }

    public function facebook_callBack()
    {
       // this is how to get the token
    // make sur to save the token in the database
    // because you can't use this methods again unless 
    // you repeat the long proccess
    
    $token = FacebookFacade::getToken();


    // this is how to use the token
    
    $fb = app(\JoelButcher\Facebook\Facebook::class);
    $fb->getFacebook()->setDefaultAccessToken($token);

    return $fb->getUser();
    }

    
    }