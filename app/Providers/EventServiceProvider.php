<?php

namespace App\Providers;

use App\Events\NewJobListingNotify;
use App\Events\UserCompletedDialogue;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\ListingOnboardedListener;
use App\Listeners\NewJobListingNotifyCreators;
use App\Listeners\UserCompletedDialogueListener;
use SocialiteProviders\TikTok\TikTokExtendSocialite;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Laravel\Socialite\SocialiteManager;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserCompletedDialogue::class =>[
            UserCompletedDialogueListener::class
        ],
        //when a new job is posted
        NewJobListingNotify::class =>[
            NewJobListingNotifyCreators::class
        ],
        //when a user is onboarded
        ListingOnboardedEvent::class =>[
            ListingOnboardedListener::class
        ],
        SocialiteManager::class =>[
            \SocialiteProviders\TikTok\TikTokExtendSocialite::class,
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
