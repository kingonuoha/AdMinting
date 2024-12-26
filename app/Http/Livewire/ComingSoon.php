<?php

namespace App\Http\Livewire;

use App\Mail\NewsLetterSubscription;
use Livewire\Component;
use App\Models\NewsLetter;
use Illuminate\Support\Facades\Mail;

class ComingSoon extends Component
{
    public $email;
    public function addToNewsLetter(){
        $data = $this->validate([
            'email'=> 'required|email|unique:news_letters,email'
        ]);
        $isSaved = NewsLetter::create($data);
        if($isSaved){
            Mail::to($data['email'])->send(new NewsLetterSubscription($data));
            $this->dispatchBrowserEvent('addedToNewsLetter');
        }
    }
    public function render()
    {
        return view('livewire.coming-soon');
    }
}
