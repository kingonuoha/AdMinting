<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AccountBanner extends Component
{
    public $selected_user_id;
    public $user;
    public $percent;
    protected $listeners = [
        "updateAdminBanner" => '$refresh'
    ];
 
    public function mount(){
        if (is_null($this->selected_user_id)) {
            $this->user = User::find(auth()->user()->id);
        }else{
            $this->user = User::find($this->selected_user_id);
        }
      
        $this->percent = getPercentNull($this->user->toArray(), ['id',"email_verified_at", "current_team_id", "two_factor_secret", "two_factor_recovery_codes", "two_factor_confirmed_at",  "blocked",'created_at', 'updated_at', 'role', 'stripe_id', "pm_type", "pm_last_four", "trial_ends_at", "dialogue_last_complete", "dialogue_complete"]);

    }
    public function render()
    {
          // dd($this->user);
          $socialAccounts = $this->user->socialAccounts;
          $followers = 0;
          foreach($socialAccounts as $account){
              $pages = $account->socialPages ?? [];
              foreach($pages as $page){
                $followers +=  $page->metrics()->firstWhere("name", "followers")->value ?? 0;
              }
          }
        return view('livewire.account-banner', compact("followers"));
    }
}
