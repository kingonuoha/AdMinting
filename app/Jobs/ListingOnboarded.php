<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\ListingOnboarded_ApplicantMail;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ListingOnboarded implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $event;
    public $brand_onboarding;
    public $brand;
    public $applicant;
    /**
     * Create a new job instance.
     */
    public function __construct($event)
    {
        //
        $this->event =  $event;
        $this->applicant = User::find($event->applicant_id);
        $this->brand_onboarding = User::find($event->listing->user_id);
        $this->brand = $this->brand_onboarding->brandInfos;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // send mail to applicant 
        $mail_body = view('mail.listing_onboarded_applicant', [
            'user'=> $this->applicant,
            'brand' => $this->brand,
            'listing'=> $this->event->listing
            ])->render();

        $mailConfig = [
            'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
            'mail_from_name' => env('EMAIL_FROM_NAME'),
            'mail_recipient_email' => $this->applicant->email,
            'mail_recipient_name' => $this->applicant->name,
            'mail_subject' => '🎉 Congratulations! Job Offer Accepted! 🎉',
            'mail_body' => $mail_body
        ];
        // sendMail($mailConfig);
        Mail::to($this->applicant->email)->send(new ListingOnboarded_ApplicantMail($this->applicant, $this->event->listing, $this->brand));
    }
}
