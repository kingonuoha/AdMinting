<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CreatorDashboard extends Component
{
    public $listing_summary, $user, $applied_listings, $ranking_users, $percent, $links;
    public $stats;

    public function mount($stats){
        $this->user = User::find(auth()->user()->id);
        $this->applied_listings =  $this->user->applied_listings;
        $this->ranking_users = User::where("rating", "!=", 0)->orderBy('rating', 'desc')->limit(5)->get();
        $this->percent = getPercentNull($this->user->toArray(), ['id',"email_verified_at", "current_team_id", "two_factor_secret", "two_factor_recovery_codes", "two_factor_confirmed_at",  "blocked",'created_at', 'updated_at', 'role', 'stripe_id', "pm_type", "pm_last_four", "trial_ends_at", "dialogue_last_complete", "dialogue_complete"]);
        $this->links = (new SideBar)->links();
        $this->stats = $stats;
    }

    public function render()
    {
        // dd(auth()->user()->social_google_id);
        // dd('hi');
        return view('livewire.creator-dashboard');
    }
}
