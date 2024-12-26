<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Listing;
use Livewire\Component;
use App\Jobs\ListingOnboarded;
use Illuminate\Support\Facades\Mail;
use App\Events\ListingOnboardedEvent;
use Illuminate\Support\Facades\Artisan;
use App\Mail\ListingOnboarded_ApplicantMail;

class ListingUserAppliedList extends Component
{

    public $listing_id;
    public $listing;
    protected $clicks;
    public $user;
    public $hasApplied = false;
    protected $listeners = ['refreshAppliedComponent', "redirect_to_user_inbox", "selectUserForListingConfirmed"];

    public function mount()
    {
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
        // \Illuminate\Support\Facades\Artisan::call();
    }
    public function redirect_to_user_inbox($user_id)
    {
        $this->mount();
        return redirect()->route('user', $user_id);
    }


    // public function getListingStats($applicant_id)
    // {
    //     return "hi bruh". $applicant_id;
    // }
    public function selectUserForListing($applicant, $listing)
    {
        // dd($applicant);
        $s_applicant = User::find($applicant);
        $this->dispatchBrowserEvent('listing:selectUserConfirmation', [
            "title" => "Onboard " . $s_applicant->name . " ?",
            "message" => "are you sure you want to onboard this applicant? he/she will have the ability to customize and manage your listing, including updating content, and responding to inquiries. ",
            "user_id" => $s_applicant->id,
            'listing_id' => $listing
        ]);
        $this->mount();
    }
    public function selectUserForListingConfirmed($applicant, $listing)
    {

        $applicant  = User::find($applicant);
        $mark_as_onboarded_listing  = Listing::find($listing);
        // add new date to the due date field
        // dd($applicant);
        $mark_as_onboarded_listing->update([
            'onboarded_by' => $applicant->id,
            'onboarded_on' => now(),

        ]);
        $this->dispatchBrowserEvent('listing:onboarded_success', [
            "title" => "User Onboarded Successfully",
            "message" => $applicant->name . " has been successfully onboarded, you can now track your Job progress at your Dashboard, Your chat session has been open",
            "user_id" => $applicant->id
        ]);
        $this->mount();
        //send mail to admin and user and brand
        event(new  ListingOnboardedEvent($applicant, $mark_as_onboarded_listing));
        $listing = $mark_as_onboarded_listing;
        $brand = $mark_as_onboarded_listing->user;
        // send mail to applicant
        Mail::to($applicant->email)->later(now()->addMinutes(0.17), new ListingOnboarded_ApplicantMail($applicant, $listing, $brand)); // 10 seconds
        //    ListingOnboardedEvent::dispatch($applicant['id'], $mark_as_onboarded_listing);
        //    dd($applicant, $listing);
       createLog("you selected ".$applicant->name. " for a listing", getIcon('users'), 'success');
       createLog("you were onboarded for a listing", getIcon('trophy'), 'success', $applicant->id);

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
