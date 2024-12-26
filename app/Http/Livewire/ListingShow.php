<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Listing;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

class ListingShow extends Component
{
    public $listing;
    public $user;
    public $hasApplied = false;
    public $termsAndConditions = false;
    public function mount(Listing $listing){
        // ->extends('layouts.ADM_app')
        $this->listing = $listing;
        $this->user = User::with('brandInfos')->find($listing->user_id);

      
        
    }

    public function applyJob(){
        if (auth()->user()->getRoleNames()->first() == 'brand') {
            return $this->dispatchBrowserEvent('error_alert', ['message' => "You cannot apply for listing at your current role, switch role to apply for this listing"]);
        }
        $this->validate([
            "termsAndConditions" => "accepted"
        ]);
        $this->listing->clicks()
        ->create([
            'user_id' => auth()->user()->id,
            'user_agent' => request()->userAgent(),
            'ip' => request()->ip()
        ]);

         // dd($card_id);
         dbNotify("📨 Job Application Sent!", " We're excited to inform you that your application for a job listing has been successfully sent. Congratulations on taking this important step towards new opportunities!
         
         The employer will now review your application and consider you as a potential candidate. We wish you the best of luck and hope for a positive outcome. Remember to keep an eye on your notifications and email for any updates or communication from the employer.
         
         If you have any questions or need further assistance, feel free to reach out. Stay confident and keep exploring new job prospects!", 'info', auth()->user(), getIcon('card'));
         
        $this->dispatchBrowserEvent("success_alert", [
            'message' => "application has been successfully sent, expect a reply soon!"
        ]);
       createLog("you applied for a listing", getIcon('briefcase'), 'success');

        //send an email to user
    }
    public function render()
    {
      
        // dd($this->listing->clicks()->toArray());
        foreach ($this->listing->clicks()->get() as $item){
            if($item->user_id == auth()->user()->id){
                $this->hasApplied = true;
            }
        }
        // $listing =$this->listing;
        $listing = Listing::find(1);
        $user = $this->user;
        // dd();
        return view('livewire.listing-show', [
        'current_page' => 'Show Listing',
        'bread_action' => [
            'url' => route('dashboard'),
            'text' => "Add Listing"
        ],
    ], compact('listing', 'user'))->extends('layouts.ADM_app', [
            'current_page' => 'Show Listing',
            'title' => 'Adminting | Show Listing',
            'bread_action' => [
                'url' => route('dashboard'),
                'text' => "Add Listing"
            ],
        ]);
    }
}
