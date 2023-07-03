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

class ListingCompleted implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $listing, $brand, $applicant;
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
       try {
         //send email to brand
         Mail::to($this->brand->email)->send(new ListingCompletedBrand($this->listing, $this->brand));
         //send email to creator
          // delay iteration for 2 seconds for each 5 sent
          usleep(2 * 1000000);
         Mail::to($this->applicant->email)->send(new ListingCompletedCreator($this->listing, $this->brand, $this->applicant));
 
         //Add creator into next  payment roll
          $payroll = new Payroll();
          $payroll->user_id = $this->applicant->id;
          $payroll->listing_id = $this->listing->id;
          $payroll->amount = $this->listing->price;
          $payroll->payment_status = 'pending';
          $payroll->save();

         //send email to admin telling him a creator is ready for payment
         notify_admin('User Ready for Payment', 'this is to inform you that -'.$this->applicant->name.' is ready for payment!');
         //send in app notification to admin telling him a creator is ready for payment

       } catch (\Throwable $th) {
       
       }
    }
}
