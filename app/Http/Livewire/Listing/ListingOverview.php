<?php

namespace App\Http\Livewire\Listing;

use App\Models\User;
use App\Models\Listing;
use Livewire\Component;

class ListingOverview extends Component
{
    public $listing, $brand, $applicant, $listing_slug, $folder;
    
    public function mount(){
        $this->listing_slug = $listing_slug = (isset(request()->route()->parameters['listing']))? request()->route()->parameters['listing'] : $this->listing_slug;
        $this->listing = Listing::where('slug', $listing_slug)->first();
        $this->brand = User::find($this->listing->user_id);
        $this->applicant = User::find($this->listing->onboarded_by);
        $this->folder = 'ListingsFiles/'.$this->listing_slug;
    }

    
    public function render()
    {
        return view('livewire.listing.listing-overview');
    }
}
