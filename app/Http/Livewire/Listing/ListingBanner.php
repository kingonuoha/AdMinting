<?php

namespace App\Http\Livewire\Listing;

use App\Models\User;
use App\Models\Listing;
use App\Models\Payroll;
use Livewire\Component;
use App\Jobs\ListingCompleted;
use App\Mail\ListingCompletedBrand;
use Illuminate\Support\Facades\Mail;
use App\Mail\ListingCompletedCreator;

class ListingBanner extends Component
{
    public $listing, $brand, $applicant, $listing_slug;

    public function mount(){
        $this->listing_slug = $listing_slug = (isset(request()->route()->parameters['listing']))? request()->route()->parameters['listing'] : $this->listing_slug;
        $this->listing = Listing::where('slug', $listing_slug)->first();
        // dd( $this->listing);
        $this->brand = User::find($this->listing->user_id);
        $this->applicant = User::find($this->listing->onboarded_by);
        // $afterResponse = ListingCompleted::dispatch($this->listing, $this->brand, $this->applicant);
        // $mailSent = Mail::to($this->brand->email)->send(new ListingCompletedBrand($this->listing, $this->brand));
       
        // dd($instantly, $mailSent,$this->listing, $this->brand );
    }


    public function markAsCompleted(){
        if(auth()->user()->getRoleNames()->first() == 'creator'){
            // run this code if user is a creator
            dbNotify('Listing Completed', 
            auth()->user()->name.'has marked your Listing:'.$this->listing->title.' as Completed! we await your confirmation in the next 7 days, if not we will assume its completed',
            'warning',  
            $this->brand, getIcon('briefcase'));

            $this->listing->update([
                'creator_marked_complete_on' => now()
            ]);

            // Show modal with more infos telling that the brand needs to confirm

            $this->dispatchBrowserEvent('success_alert',[
                'message'=> 'You have successfully Marked this listing as Completed, but we will need Confirmation from -'.$this->brand->brandInfos->brand_name.' within the next 7 days before any action is taken.'
            ]);

            // send notification email to the brand 
            // make job that will notify alert the app about this issue in the next 7 days if not fixed
            createLog("you marked a listed as completed", getIcon('check-circle'), 'warning');

        }else if(auth()->user()->getRoleNames()->first() == 'brand'){
            // run this code if user is a brand
            dbNotify('Listing Completed', 
            "you have successfully Marked your listing as COMPLETED!, please take out few time to rate your experience,in order to rate go to your listing dashboard and go to the 'Rating' tab, Thanks",
            'success',  
            $this->brand, getIcon('check-square'));

            $this->listing->update([
                'completed_on' => now()
            ]);
           
           //send in app notification to admin telling him a creator is ready for payment
           // ============================================================================================
           // ==========================Dispatcg Job========================================
           // ============================================================================================
           ListingCompleted::dispatch($this->listing, $this->brand, $this->applicant)->delay(now()->addSeconds(10));
             $this->dispatchBrowserEvent('success_alert',[
                'message'=> "you have successfully Marked your listing as COMPLETED!, please take out few time to rate your experience,in order to rate go to your listing dashboard and go to the 'Rating' tab, Thanks"
            ]);
            createLog("you marked your listing as completed", getIcon('check-circle'), 'success');

            // $this
        }else if(auth()->user()->getRoleNames()->first() == 'adm_admin'){
            // run this code if user is an Admin
            dbNotify('Listing Completed', 
            "you have successfully Marked your listing as COMPLETED!, Background functions are running to inform brand and creator about action",
            'success',  
            $this->brand, getIcon('check-square'));

            $this->listing->update([
                'completed_on' => now()
            ]);
            // send email to brand and creator for rating
            // add creator to payment list
            $this->dispatchBrowserEvent('success_alert',[
                'message'=>  "you have successfully Marked your listing as COMPLETED!, Background functions are running to inform brand and creator about action",
            ]);
            // ListingCompleted::dispatchAfterResponse($this->listing, $this->brand, $this->applicant);
            ListingCompleted::dispatch($this->listing, $this->brand, $this->applicant)->delay(now()->addSeconds(10));

            
        }else{
            $this->dispatchBrowserEvent('showToast', [
                'type' => "warning",
                'message'=> "Action Denied!"
            ]);
        }
        // $this->listing
       return  $this->mount();
    }
    public function render()
    {
         $listing = $this->listing;
         $brand = $this->brand;
         $applicant = $this->applicant;

         return view('livewire.listing.listing-banner', compact('listing', 'brand', 'applicant'));
    }
}
