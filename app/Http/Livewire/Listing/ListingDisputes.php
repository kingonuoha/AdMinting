<?php

namespace App\Http\Livewire\Listing;

use App\Models\Listing;
use Livewire\Component;

class ListingDisputes extends Component
{
    public $listing_slug, $listing, $disputes;
    public $dispute_files = [], $dispute_description;

    public function mount()
    {
        $this->listing_slug = $listing_slug = (isset(request()->route()->parameters['listing']))? request()->route()->parameters['listing'] : $this->listing_slug;
        $this->listing = Listing::where('slug', $listing_slug)->first();
        $this->disputes = $this->listing->disputes;
    }
    public function render()
    {
        return view('livewire.listing.listing-disputes');
    }
    public function addFileLink($link)
    {
       array_push($this->dispute_files, $link);
    }
    public function saveDispute()
    {
      $this->validate([
        "dispute_description" => "required|min:10",
        "dispute_files" => "required|array",

      ]);

      $disputeSaved = \App\Models\ListingDisputes::create([
       'user_id' => auth()->user()->id,
       'listing_id' => $this->listing->id,
       'supporting_files' => $this->dispute_files,
       'description' => $this->dispute_description,
      ]);
    //   check if the person placing dispute is the employee or employeer

    // if user is the employed one
    if ($this->listing->onboarded_by == auth()->user()->id) {
       $recipient = $this->listing->user;
    }else{
       $recipient = $this->listing->applicant;

    }
      if($disputeSaved){
        $this->dispatchBrowserEvent("showToast", [
            'type' => "success",
            "message" => "Your dispute has been raised, The Admin team has been notified and will oversee the process"
        ]);
        $this->mount();
        $this->reset();

      }

    //   send email to the opposite party that a dispute has been dropped
    dbNotify("Dispute has been raised", 'A dispute has been raised concerning the recent engagement with a job listing('.$this->listing->title.'). Please check your listing dashboard for more details.', 'warning', $recipient, getIcon('warning'));
    //   send email to the opposite party that a dispute has been dropped
    dbNotify("Dispute has been raised", "A dispute has been raised concerning your recent engagement. Please check your Listing(".$this->listing->title.") dashboard for more details. The Admin team has been notified and will oversee the process, striving for an equitable outcome for both parties involved.", 'info', auth()->user(), getIcon('warning'));
    
    notify_admin("Dispute has been raised", "A dispute has been created for a listing(".$this->listing->title."). Please review it in the admin panel.", 'danger', getIcon('shield-thunder'));
    createLog("you raised a dispute", getIcon('warning'), 'danger');

    }
}
