<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\User;

class AccountBannerVertical extends Component
{
   
    public $user;
    public $followers;
    public $sumFollowers;
    
    /**
     * Create a new component instance.
     */
    public function __construct($userId, $sumFollowers)
    {
        $this->sumFollowers = $sumFollowers;
        // Fetch the user by ID
        $this->user = User::with(["advertiserInfos", "creator_listings", "socialAccounts"])->findOrFail($userId);
     
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // dd($this->user);
        return view('components.account-banner-vertical');
    }
}
