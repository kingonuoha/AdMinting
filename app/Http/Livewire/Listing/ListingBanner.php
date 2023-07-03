<?php

namespace App\Http\Livewire\Listing;

use App\Jobs\ListingCompleted;
use App\Models\User;
use App\Models\Listing;
use Livewire\Component;

class ListingBanner extends Component
{
    public $listing, $brand, $applicant, $listing_slug;

    public function mount(){
        $this->listing_slug = $listing_slug = (isset(request()->route()->parameters['listing']))? request()->route()->parameters['listing'] : $this->listing_slug;
        $this->listing = Listing::where('slug', $listing_slug)->first();
        $this->brand = User::find($this->listing->user_id);
        $this->applicant = User::find($this->listing->onboarded_by);
    }


    public function markAsCompleted(){
        if(auth()->user()->role == 'creator'){
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
        }else if(auth()->user()->role == 'brand'){
            // run this code if user is a brand
            dbNotify('Listing Completed', 
            "you have successfully Marked your listing as COMPLETED!, please take out few time to rate your experience,in order to rate go to your listing dashboard and go to the 'Rating' tab, Thanks",
            'success',  
            $this->brand, getIcon('check-square'));

            $this->listing->update([
                'completed_on' => now()
            ]);
            // send email to brand and creator for rating
            // add creator to payment list
            dispatch(new ListingCompleted($this->listing, $this->brand, $this->applicant))->delay(now()->addMinute());
             $this->dispatchBrowserEvent('success_alert',[
                'message'=> "you have successfully Marked your listing as COMPLETED!, please take out few time to rate your experience,in order to rate go to your listing dashboard and go to the 'Rating' tab, Thanks"
            ]);
        }else if(auth()->user()->role == 'adm_admin'){
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
            dispatch(new ListingCompleted($this->listing, $this->brand, $this->applicant))->delay(now()->addMinute());
            $this->dispatchBrowserEvent('success_alert',[
                'message'=>  "you have successfully Marked your listing as COMPLETED!, Background functions are running to inform brand and creator about action",
            ]);

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
