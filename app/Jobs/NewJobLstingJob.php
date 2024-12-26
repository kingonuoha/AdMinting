<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewJobListingNotifyMail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\NewJobListingNotifyMailBrand;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class NewJobLstingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $event;
    /**
     * Create a new job instance.
     */
    public function __construct($event)
    {
        //
        $this->event = $event;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        // Send Db notification to all creators
        dbNotify("New Job Listing Alert!", "Exciting opportunity awaits! Check out the latest job listing and unlock your career potential. Don't miss out on this chance to join an amazing dynamic team. Apply now! 🚀", 'info', $this->event->creators, getIcon('briefcase'), true);
        // Send Db notification the brand posting
        dbNotify("📢 Attention Job Listing Owner! 🌟", "Fantastic news! Your job listing has just gone live. Get ready to attract top talent and find the perfect candidate for your opening. Start receiving applications today and unlock the potential of your business.", 'info', $this->event->brand_publishing, getIcon('briefcase'));
        // Send Db notification the Admin
        notify_admin("📢 Attention Application Admin! 🌟", "We're excited to inform you that a new job listing has been added to the application. As the administrator, you play a crucial role in managing and reviewing the listings. Take a moment to review the latest addition and ensure it meets your standards. Stay proactive in connecting job seekers with remarkable opportunities.", 'info');
        // send mail to applicant 
        $mail_body = view('mail.new_job_brand', [
            'user' => $this->event->brand_publishing,
            'listing' =>  $this->event->listing
        ])->render();

        $mailConfig = [
            'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
            'mail_from_name' => env('EMAIL_FROM_NAME'),
            'mail_recipient_email' => $this->event->brand_publishing->email,
            'mail_recipient_name' => $this->event->brand_publishing->name,
            'mail_subject' => env("APP_NAME") . " | Congratulations! Your Job Posting is Live",
            'mail_body' => $mail_body
        ];
        sendMail($mailConfig);
        $int = 0;
        // Mail::to($this->event->brand_publishing->email)->send(new NewJobListingNotifyMailBrand($this->event->brand_publishing, $this->event->listing));
        foreach ($this->event->creators as $creator) {


            $mail_body = view('mail.new_job_creators',[
                'user'=> $creator
            ])->render();

            $mailConfig = [
                'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                'mail_from_name' => env('EMAIL_FROM_NAME'),
                'mail_recipient_email' => $creator->email,
                'mail_recipient_name' => $creator->name,
                'mail_subject' => env("APP_NAME") . " | Congratulations! Your Job Posting is Live",
                'mail_body' => $mail_body
            ];
            sendMail($mailConfig);
            // Mail::to($creator->email)->send(new NewJobListingNotifyMail($creator, $this->event->listing));
            if ($int == 4) {
                // delay iteration for 2 seconds for each 5 sent
                $int == 0;
                usleep(2 * 1000000);
            }
            $int++;
        }
    }

    public function failed(Exception $exception)
    {
        // Retry the job after a delay
        $this->retryAfter(10); // Retry after 2 minutes (120 seconds)
    }
}
