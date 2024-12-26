<?php 

namespace App\Providers;

use Google\Client;
use Illuminate\Support\ServiceProvider;

class GoogleService extends ServiceProvider
{
    public static function getClient()
    {
        $client = new Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->addScope([
            'https://www.googleapis.com/auth/youtube.readonly',
            'https://www.googleapis.com/auth/userinfo.email',
            'https://www.googleapis.com/auth/userinfo.profile',
        ]);
        $client->setAccessType('offline');
        return $client;
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        // Register the Google Client in the service container
        $this->app->singleton('google.client', function () {
            return self::getClient();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
