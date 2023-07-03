<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AccountOverView extends Component
{
    public $user = '';
    public $selected_user_id;

    public function mount(){
        if (is_null($this->selected_user_id)) {
            $this->user = User::find(auth()->user()->id);
        }else{
            $this->user = User::find($this->selected_user_id);
        }
    }

    public function render()
    {
        return view('livewire.account-over-view');
    }
}
