<?php

namespace App\Listeners;

use App\Jobs\ListingOnboarded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ListingOnboardedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
        dispatch(new ListingOnboarded($event))->delay(now()->addMinute(1));
    }
}
