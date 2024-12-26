<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FindCreators extends Component
{
    public  $creators;
    public function mount()
    {
        $this->creators =  fetchFeaturedCreators();
    }
    public function render()
    {
        return view('livewire.find-creators');
    }
}
