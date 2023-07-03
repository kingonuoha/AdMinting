<?php

namespace App\Http\Livewire;

use App\Events\ListingOnboardedEvent;
use App\Models\User;
use App\Models\Listing;
use Livewire\Component;
use App\Jobs\ListingOnboarded;

class ListingUserAppliedList extends Component
{

    public $listing_id;
    public $listing;
    protected $clicks;
    public $user;
    public $hasApplied = false;
    protected $listeners = ['refreshAppliedComponent', "redirect_to_user_inbox"];

    public function mount(){
        // ->extends('layouts.ADM_app')
        $this->listing = Listing::find($this->listing_id);
        $this->clicks = $this->listing->clicks();
        $this->user = User::all();
        $this->hasApplied = $this->clicks->with('user')->get()->pluck('user');; 
        // dd($this->hasApplied);
    }
    
    public function refreshAppliedComponent($listing_id)
    {
        $this->listing_id = $listing_id;
        $this->mount();
    }
    public function redirect_to_user_inbox($user_id)
    {
        $this->mount();
       return redirect()->route('user', $user_id);
    }
    
    
    public function selectUserForListing($applicant, $listing)
    {
       $mark_as_onboarded_listing  = Listing::find($listing['id']);
       $mark_as_onboarded_listing->update([
        'onboarded_by'=> $applicant['id'],
        'onboarded_on'=> now()
       ]);
       $this->dispatchBrowserEvent('listing:onboarded_success', [
           "title" => "User Onboarded Successfully",
            "message"=> $applicant['name']." has been successfully onboarded, you can now track your Job progress at your Dashboard, Your chat session has been open",
            "user_id" => $applicant['id']
        ]);
        $this->mount();
       //send mail to admin and user and brand
       event(new  ListingOnboardedEvent($applicant['id'], $mark_as_onboarded_listing));
    //    ListingOnboardedEvent::dispatch($applicant['id'], $mark_as_onboarded_listing);
    //    dd($applicant, $listing);
    }
    
    public function render()
    {

        
        // $listing =$this->listing;
        $user = $this->user;
        return view('livewire.listing-user-applied-list',  [
            'current_page' => 'Job Listing Applications',
            'bread_action' => [
                'url' => route('dashboard'),
                'text' => "Add Listing"
            ],
        ], compact('user'))->extends('layouts.ADM_app', [
                'current_page' => 'Job Listing Applications',
                'title' => 'Adminting | Job Listing Applications',
                'bread_action' => [
                    'url' => route('dashboard'),
                    'text' => "Add Listing"
                ],
            ]);
    }
}
