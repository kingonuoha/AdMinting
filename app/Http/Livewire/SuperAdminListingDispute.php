<?php

namespace App\Http\Livewire;

use App\Models\ListingDisputes;
use Livewire\Component;

class SuperAdminListingDispute extends Component
{
    public $total_disputes;

    public function mount()
    {
    }
    
    public function markSettled($dispute_id)
    {
        $dispute = ListingDisputes::find($dispute_id);
        $dispute->update([
            "status" => 'settled'
        ]);
        $this->dispatchBrowserEvent('success_alert', [
            'message'=> " this dispute has been marked as settled"
        ]);
       createLog("you marked a dispute as settled", getIcon('check-square'), 'warning');

    }
    
    public function render()
    {
        $this->total_disputes = ListingDisputes::all();

        return view('livewire.super-admin-listing-dispute');
    }
}
