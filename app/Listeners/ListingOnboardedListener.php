<?php

namespace App\Listeners;

use App\Jobs\ListingOnboarded;
use App\Mail\ListingOnboarded_ApplicantMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        // getIcon();
        // Mail::to($event->applicant->email)->send(new ListingOnboarded_ApplicantMail($event->applicant, $event->event->listing, $event->brand));
        Mail::to($event->applicant->email)->later(now()->addMinutes(0.17), new ListingOnboarded_ApplicantMail($event->applicant, $event->event->listing, $event->brand)); // 10 seconds

        dispatch(new ListingOnboarded($event));
    }
}
