<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use Livewire\Component;

class MyListing extends Component
{
    public $_selected_listing;
    public $listings;
    protected $listeners = ['disableListingConfirmed', "enableListingConfirmed", "deleteListingConfirmed"];


    
    public function confirmDiableListing($listing_id){
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'message' => "you are about to Disable a Job Listing, Proceed?",
            'id'=> $listing_id
        ]);
    }
    
    public function disableListingConfirmed($listing_id){
        $selected_listing = Listing::where('id', $listing_id)->first();
        $selected_listing->update([
            'is_active' => false
        ]);
        $this->dispatchBrowserEvent('info_alert', [
            'message'=> "Listing has Disabled Successfully, note that this listing has not been deleted but is now invisible and disabled to our creators for application!"
        ]);
        //send notification for action
        // log it out
    }
    public function confirmEnableListing($listing_id){
        $this->dispatchBrowserEvent('swal:confirm_enable', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'message' => "listing has been disabled, are you sure you want to Proceed?",
            'id'=> $listing_id
        ]);
    }

    public function enableListingConfirmed($listing_id){
        $selected_listing = Listing::where('id', $listing_id)->first();
        $selected_listing->update([
            'is_active' => true
        ]);
        $this->dispatchBrowserEvent('info_alert', [
            'message'=> "Listing has Enabled Successfully, This Job Listing is now visible for new Applicants!"
        ]);
        //send notification for action
        // log it out
    }
    public function confirmDeleteListing($listing_id){
        $this->dispatchBrowserEvent('swal:confirm_Delete', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'message' => "You are about to delete a Job Listing, this Action cannot be undone!, And <b>AdMinting</b> is <b>NOT</b> Responsible for any issue that might come up, proceed?",
            'id'=> $listing_id
        ]);
    }
    public function deleteListingConfirmed($listing_id){
        Listing::find($listing_id)->delete();
        $this->dispatchBrowserEvent('info_alert', [
            'title' => 'Listing Deleted',
            'message' => "Listing has been successfully deleted!, Processing backgroun cleanups!",
        ]);
    }
    public function showAppliedUsers($listing_id){
        // if(!is_null($this->_selected_listing)){
            // }
            $this->_selected_listing = $listing_id;
            $this->emit("refreshAppliedComponent", $this->_selected_listing);
        $this->dispatchBrowserEvent('showAppliedUsers');
        //send notification for action
        // log it out
    }

    public function render()
    {
       $listings = $this->listings = auth()->user()->listings;
        return view('livewire.my-listing',[
            'current_page' => 'Show Listing',
            'bread_action' => [
                'url' => route('dashboard'),
                'text' => "Add Listing"
            ],
        ], compact('listings'))->extends('layouts.ADM_app', [
                'current_page' => 'My Listing',
                'title' => 'Adminting | My Listing',
                'bread_action' => [
                    'url' => route('listing.create'),
                    'text' => "Add Listing"
                ],
            ]);
    }
}
