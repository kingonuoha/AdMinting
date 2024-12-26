<?php

namespace App\Providers;

use Facebook\Facebook;
use Illuminate\Support\ServiceProvider;
use Facebook\PersistentData\PersistentDataInterface;

class FacebookServiceProvider extends ServiceProvider
{
      /**
     * Register the Facebook SDK in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Facebook::class, function ($app) {
        // dd( env('FACEBOOK_APP/_ID'), config("facebook.redirect_uri"));

            return new Facebook([
                'app_id' => config("facebook.app_id"),
                'app_secret' =>  config("facebook.app_secret"),
                'default_graph_version' => config("facebook.default_graph_version"),
                'persistent_data_handler' => app(PersistentDataInterface::class),
            ]);
        });
    }
    /**
     * Boot any application services.
     *
     * @return void
     */
    public function boot()
    {
        // No boot logic needed for the Facebook SDK.
    }
}
