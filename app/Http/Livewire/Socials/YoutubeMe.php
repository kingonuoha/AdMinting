<?php

namespace App\Http\Livewire\Socials;

use Livewire\Component;

class YoutubeMe extends Component
{
    public $user, $channels;
    public function mount() {
        $this->user = auth()->user();
        $this->channels = $this->user->channels;
    }
    public function render()
    {
        return view('livewire.socials.youtube-me');
    }
}
