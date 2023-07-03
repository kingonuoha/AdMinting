<?php

namespace App\Http\Livewire\Listing;

use App\Models\User;
use App\Models\Rating;
use Livewire\Livewire;
use App\Models\Listing;
use Livewire\Component;

class ListingRating extends Component
{
    public $listing, $brand, $applicant, $listing_slug, $listing_ratings;
    public $applicant_rating, $experience_rating, $comment;

    protected $listeners = [
        'refresh' => '$refresh'
    ];
    public function mount(){
        $this->listing_slug = $listing_slug = (isset(request()->route()->parameters['listing']))? request()->route()->parameters['listing'] : $this->listing_slug;
        $this->listing = Listing::where('slug', $listing_slug)->first();
        // dd($this->listing);
        $this->brand = User::find($this->listing->user_id);
        $this->applicant = User::find($this->listing->onboarded_by);
        $this->listing_ratings = $this->listing->ratings()->first();
    }


    public function submitRating()
    {
        // dd($this->applicant_rating, $this->experience_rating, $this->comment);
        $this->validate([
            'applicant_rating' => 'required',
            'experience_rating' => 'required',
            'comment' => 'required',
        ]);
        $userRatings = Rating::where([
            'applicant_id'=> $this->applicant->id,
            'brand_id'=> $this->brand->id,
            'listing_id'=> $this->listing->id,
            ])->get();

            if ($userRatings->count() <= 0) {
               
                $new_rating =  new Rating();
                $new_rating->applicant_rating =intval($this->applicant_rating);
                $new_rating->experience_rating =intval($this->experience_rating);
                $new_rating->comments = $this->comment;
                $new_rating->brand_id = $this->brand->id;
                $new_rating->applicant_id = $this->applicant->id;
                $new_rating->listing_id = $this->listing->id;
                $new_rating->save();
                
                //update the user rating in the "rating" column in the users table
                $avgRating =  $this->applicant->ratings()->average('applicant_rating');
                $this->applicant->rating = $avgRating;
                $this->applicant->save();

               $this->dispatchBrowserEvent('rate_modal:close');
               return  $this->dispatchBrowserEvent('success_alert', [
                    'message'=> "Thank you for taking the time to rate your experience and provide valuable feedback. 
                    Your input helps us improve our services and ensure the best possible experience for our users. 
                    If you have any further questions or concerns, please don't hesitate to reach out to us.
                    We appreciate your participation and look forward to serving you again in the future!"
                ]);
                // Livewire::refresh();
            }else{
              return   $this->dispatchBrowserEvent('warning_alert', [
                    'message'=> "You cant rate more than once!"
                ]);
            }
    }


    public function render()
    {
        $this->mount();
        return view('livewire.listing.listing-rating');
    }
}
