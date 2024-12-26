<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Bus\Queueable;
        use Carbon\Carbon;
        use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class HandleOnboardedListingLifetime implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //Get all the Jobs that has not been completed in the db
       $uncompletedListng =  Listing::where('onboarded_on', '!=', null)->where(['completed_on' => null])->get();
       foreach ($uncompletedListng as $listing) {

                                    $date = Carbon::parse($listing->due_date);
        if ($date->isPast() || $date->isToday() ) {
           
              dbNotify("Listing Duraton Reached", "hi am testing my sheduler", 'danger', User::find(26), getIcon('rocket'));
            } 
       }

    }
}
