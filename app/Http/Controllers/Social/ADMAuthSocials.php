<?php

namespace App\Http\Controllers\Social;


use Google\Client;
use Google_Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Google\Service\YouTube;
use Illuminate\Support\Facades\Http;
use Google_Service_YouTube;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class ADMAuthSocials extends Controller
{
    //
    public function google_redirect()
    {
        // return Socialite::driver('google')
        // ->scopes([
        //   'https://www.googleapis.com/auth/youtube.readonly',
        //   'https://www.googleapis.com/auth/youtube.force-ssl',
        //   ])
        // ->redirect();


        $client = $this->createGoogleClient();
        $client->setScopes([
            'https://www.googleapis.com/auth/youtube.force-ssl',
        ]);

        $authUrl = $client->createAuthUrl();

        return redirect()->to($authUrl);
    }

    public function google_redirect_auth(Request $req)
    {
        if(isset($req->type)){
          config('google.redirect', "http://127.0.0.1:8000/0auth/google/callback?type=".$req->type);
        };
        return Socialite::driver('google')
        ->scopes([
          'https://www.googleapis.com/auth/youtube.readonly',
          'https://www.googleapis.com/auth/youtube.force-ssl',
          ])
        ->redirect();

    }


    public function google_callBack(Request $request)
    {
      // $G_user = Socialite::driver('google')->user();
      // // Set token for the Google API PHP Client
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
        
      // // dd($G_user);
      // if($G_user->email === auth()->user()->email){
      //   $user = User::find(auth()->user()->id);
      //   $user->social_google_id = $G_user->id; 
      //   $user->social_google_profile = $G_user->getAvatar(); 
      //   $user->social_google_token = $G_user->token; 
      //   $user->save();
      //   return view('auth.ADM_OAuth_fallback');
      // }else{
      //   dd("Email do not match!");
      // }



      $client =  $this->createGoogleClient();
        $client->setScopes([
            'https://www.googleapis.com/auth/youtube.force-ssl',
        ]);

        $client->fetchAccessTokenWithAuthCode($request->code);

        $service = new Youtube($client);
        $channels = $service->channels->listChannels('snippet', ['mine' => true]);

        // Access the list of channels and their details
        foreach($channels->getItems() as $channel){
           dd($channel->getSnippet()->getTitle());
        }
        dd($channels);
        return redirect()->back();
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
}
