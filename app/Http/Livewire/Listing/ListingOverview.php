<?php

namespace App\Http\Livewire\Listing;

use App\Models\User;
use App\Models\Listing;
use App\Models\ListingDisputes;
use Livewire\Component;

class ListingOverview extends Component
{
    public $listing, $brand, $applicant, $listing_slug, $folder;
    public $dispute_files = [], $dispute_description;
    
    public function mount(){
        $this->listing_slug = $listing_slug = (isset(request()->route()->parameters['listing']))? request()->route()->parameters['listing'] : $this->listing_slug;
        $this->listing = Listing::where('slug', $listing_slug)->first();
        $this->brand = User::find($this->listing->user_id);
        $this->applicant = User::find($this->listing->onboarded_by);
        $this->folder = 'ListingsFiles/'.$this->listing_slug;
    }

    
    public function saveDispute()
    {
      $this->validate([
        "dispute_description" => "required|min:10",
        "dispute_files" => "required|array",

      ]);

      $disputeSaved = ListingDisputes::create([
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
        $this->dispatchBrowserEvent("closeDisputeModal");

      }

    //   send email to the opposite party that a dispute has been dropped
    dbNotify("Dispute has been raised", 'A dispute has been raised concerning the recent engagement with a job listing('.$this->listing->title.'). Please check your listing dashboard for more details.', 'warning', $recipient, getIcon('warning'));
    //   send email to the opposite party that a dispute has been dropped
    dbNotify("Dispute has been raised", "A dispute has been raised concerning your recent engagement. Please check your Listing(".$this->listing->title.") dashboard for more details. The Admin team has been notified and will oversee the process, striving for an equitable outcome for both parties involved.", 'info', auth()->user(), getIcon('warning'));
    
    notify_admin("Dispute has been raised", "A dispute has been created for a listing(".$this->listing->title."). Please review it in the admin panel.", 'danger', getIcon('shield-thunder'));
    createLog("you raised a dispute on a listing", getIcon('warning'), 'warning');

    }
    public function addFileLink($link)
    {
       array_push($this->dispute_files, $link);
       createLog("you uploaded a file", getIcon('file-up'), 'info');

    }
    
    public function render()
    {
        return view('livewire.listing.listing-overview');
    }
}
