<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Facebook\Url\UrlDetectionHandler;
use Facebook\Url\UrlDetectionInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Facebook\CachePersistentDataHandler;
use Facebook\PersistentData\PersistentDataInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PersistentDataInterface::class, fn($app) => new CachePersistentDataHandler($app['cache']));

        //
        $this->app->singleton(UrlDetectionInterface::class, fn ($app) => $app[UrlDetectionHandler::class]);
        // app/Providers/AppServiceProvider.php
        $this->app->bind('path.public', function() {
            return realpath(base_path().'/public_html');
          });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    //    if (app()->environment('local')) {
    //         URL::forceRootUrl(env('APP_URL', request()->root()));
    //         URL::forceScheme('https'); // Force HTTPS if necessary
    //     }
        
        Validator::extend('authorized_domain', function ($attribute, $value, $parameters, $validator) {
            $authorizedDomains = ['instagram.com', 'facebook.com', 'linkedin.com'];
            $parsedUrl = parse_url($value);
            if (in_array($parsedUrl['host'], $authorizedDomains)) {
                return true;
            }
            return false;
        });
    }
}
