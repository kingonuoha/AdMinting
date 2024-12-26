<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Listing;
use Livewire\Component;

class MyListing extends Component
{
    public $_selected_listing;
    public $listings;
    protected $listeners = ['disableListingConfirmed', "enableListingConfirmed", "deleteListingConfirmed", 'rePay'];



    public function confirmDiableListing($listing_id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'message' => "you are about to Disable a Job Listing, Proceed?",
            'id' => $listing_id
        ]);
    }

    public function disableListingConfirmed($listing_id)
    {
        $selected_listing = Listing::where('id', $listing_id)->first();
        $selected_listing->update([
            'is_active' => false
        ]);
        $this->dispatchBrowserEvent('info_alert', [
            'message' => "Listing has Disabled Successfully, note that this listing has not been deleted but is now invisible and disabled to our creators for application!"
        ]);
       createLog("you disabled a listing", getIcon('warning'), 'danger');

        //send notification for action
        // log it out
    }
    public function confirmEnableListing($listing_id)
    {
        $this->dispatchBrowserEvent('swal:confirm_enable', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'message' => "listing has been disabled, are you sure you want to Proceed?",
            'id' => $listing_id
        ]);
    }

    public function enableListingConfirmed($listing_id)
    {
        $selected_listing = Listing::where('id', $listing_id)->first();
        $selected_listing->update([
            'is_active' => true
        ]);
        $this->dispatchBrowserEvent('info_alert', [
            'message' => "Listing has Enabled Successfully, This Job Listing is now visible for new Applicants!"
        ]);
       createLog("you enabled a listing", getIcon('check-square'), 'success');

        //send notification for action
        // log it out
    }
    public function confirmDeleteListing($listing_id)
    {
        $this->dispatchBrowserEvent('swal:confirm_Delete', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'message' => "You are about to delete a Job Listing, this Action cannot be undone!, And <b>AdMinting</b> is <b>NOT</b> Responsible for any issue that might come up, proceed?",
            'id' => $listing_id
        ]);
    }
    public function deleteListingConfirmed($listing_id)
    {
        Listing::find($listing_id)->delete();
        $this->dispatchBrowserEvent('info_alert', [
            'title' => 'Listing Deleted',
            'message' => "Listing has been successfully deleted!, Processing backgroun cleanups!",
        ]);
       createLog("you deleted a listing", getIcon('bin'), 'danger');

    }
    public function showAppliedUsers($listing_id)
    {
        // if(!is_null($this->_selected_listing)){
        // }
        $this->_selected_listing = $listing_id;
        $this->emit("refreshAppliedComponent", $this->_selected_listing);
        $this->dispatchBrowserEvent('showAppliedUsers');
        //send notification for action
        // log it out
    }

    public function rePayAlert($listing_id, $listing_price)
    {
        $this->dispatchBrowserEvent(
            'listing:repayAlert',
            [
                'message' => "Your payment is important to us. To ensure your security, we're redirecting you to our ultra-safe payment gateway. Rest assured, your data is encrypted and under our vigilant protection. Feel confident as you complete your transaction in this secure environment.",
                'listing_id' => $listing_id, 'listing_price' => $listing_price
            ]
        );
        // $this-> rePay($listing_id, $listing_price);
    }
    public function rePay($listing_id, $listing_price)
    {
        $user = User::find(auth()->user()->id);

        //  redirect to paystack
        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => auth()->user()->email,
            'amount' => $listing_price * 100,
            'callback_url' => route('listing.payment-confirm', ['user_id' => $user->id, 'listing_id' => $listing_id]),
            'channels' => ['card']
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . env('PAYSTACK_SECRET'),
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = json_decode(curl_exec($ch));
        if ($result->status) {
            return redirect()->away($result->data->authorization_url);
        } else {
            dd('an Error Occured!');
        }
    }

    public function render()
    {
        $this->listings = User::find(auth()->user()->id)->listings()->orderBy('created_at', 'desc')->get(); //()->where('payment_status', "paid")->get();
        $listings = $this->listings;
        return view('livewire.my-listing', [
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
