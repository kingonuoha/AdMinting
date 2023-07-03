<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

class AccountPersonalInfoUpdate extends Component
{
    public $user;
    public $username;
    public $email;
    public $prevEmail;
    public $full_name;

    public function mount(){
        $user = User::find(auth()->id());
        $this->username = $user->username;
        $this->email = $user->email;
        $this->prevEmail = $user->email;
        $this->full_name = $user->name;
    }

    public function personal_info_update(){
        $input_array = [
            'name'  => $this->full_name,
            'username'=> $this->username
        ];
        $validation_array = [
            'full_name'=> 'required',
            'username'=> 'required|unique:users,username|regex:/^\S*$/',
        ];
        if ($this->email !== $this->prevEmail) {
            $input_array = array_merge($input_array, [
                'email'=>$this->email,
                'email_verified_at' => null
            ]);
            $validation_array = array_merge($validation_array, [
                'email' => 'required|email|unique:users,email',
            ]);
            
        }
        $this->validate($validation_array, [
            'email.required' => 'The email field is required.',
            'email.email' => 'Invalid!, Please enter a valid email address.',
            'email.unique' => 'This email is already taken. pls try again',
            'username.regex' => 'Username must not contain white space!',
        ]);

      
        $this->user->update($input_array);
        dbNotify("✏️ Profile Update Successful!", "Great news! Your profile has been successfully updated. Your changes have been saved and will now be reflected in your profile. Keep up the good work in maintaining an up-to-date and impressive profile.", 'warning', auth()->user(), getIcon('pencil'));

        $this->dispatchBrowserEvent('showToast', [
            'message' => "Profile Information Update successfull",
            'type'=>"success"
        ]);

        
    }
     public function render()
    {
       $user =  $this->user = User::find(auth()->user()->id);
        return view('livewire.account-personal-info-update', compact('user'))->extends('layouts.ADM_app', [
                'current_page' => 'Profile Information',
                'title' => 'Adminting | Profile Information',
                
            ]);
    }
}
