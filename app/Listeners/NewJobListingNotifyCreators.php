<?php

namespace App\Listeners;

use App\Events\NewJobListingNotify;
use App\Jobs\NewJobLstingJob;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewJobListingNotifyMail;
use App\Mail\NewJobListingNotifyMailBrand;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class NewJobListingNotifyCreators
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
    public function handle(NewJobListingNotify $event): void
    {
          
            dispatch(new NewJobLstingJob($event))->delay(now()->addMinute(1));

      
    }
}
