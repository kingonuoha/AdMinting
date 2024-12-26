<?php

namespace App\Jobs;

use App\Mail\ListingCompletedBrand;
use App\Mail\ListingCompletedCreator;
use App\Models\Payroll;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ListingCompleted implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $listing, $brand, $applicant;
    public $tries = 3;
    /**
     * Create a new job instance.
     */
    public function __construct($listing, $brand, $applicant)
    {
        //
        $this->listing = $listing;
         $this->brand = $brand;
         $this->applicant = $applicant;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // dd('hi');
         //Add creator into next  payment roll
         $payroll = new Payroll();
         $payroll->user_id = $this->applicant->id;
         $payroll->listing_id = $this->listing->id;
         $payroll->amount = $this->listing->price;
         $payroll->payment_status = 'pending';
         $payroll->save();
        
        //send email to admin telling him a creator is ready for payment
        notify_admin('User Ready for Payment', 'this is to inform you that -'.$this->applicant->name.' is ready for payment!');

        //  //send email to brand
        //  $mail_body = view('mail.listing-completed',[
        //      'user'=> $this->brand,
        //      'brand' => $this->brand->brandInfos,
        //      'listing' => $this->listing
        //  ])->render();

        //  $mailConfig = [
        //   'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
        //   'mail_from_name' => env('EMAIL_FROM_NAME'),
        //   'mail_recipient_email' => $this->brand->email,
        //   'mail_recipient_name' => $this->brand->name,
        //   'mail_subject' => "'Hurray! Your Listing has been Marked as completed'",
        //   'mail_body' => $mail_body
        //  ];
        //  sendMail($mailConfig);

         Mail::to($this->brand->email)->send(new ListingCompletedBrand($this->listing, $this->brand));
         //send email to creator
          // delay iteration for 2 seconds for each 5 sent
        //   usleep(2 * 1000000);
        //   $mail_body = view('mail.listing-completed_creator',[
        //       'user'=>$this->applicant,
        //       'brand' => $this->brand->brandInfos,
        //       'listing' => $this->listing
        // ])->render();
        
        // $mailConfig = [
        //  'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
        //  'mail_from_name' => env('EMAIL_FROM_NAME'),
        //  'mail_recipient_email' => $this->brand->email,
        //  'mail_recipient_name' => $this->brand->name,
        //  'mail_subject' => 'Hurray! Listing has been Marked as completed',
        //  'mail_body' => $mail_body
        // ];
        // sendMail($mailConfig);
         Mail::to($this->applicant->email)->send(new ListingCompletedCreator($this->listing, $this->brand, $this->applicant));
 
        
         //send in app notification to admin telling him a creator is ready for payment

    }

    public function failed(Throwable $e){
        info('Job Failed!!');
    }
}
