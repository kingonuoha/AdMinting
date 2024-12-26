<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
// use App\Providers\FacebookServiceProvider;

class AccountPersonalInfoUpdate extends Component
{
    public $user;
    public $username;
    public $email;
    public $prevEmail;
    public $full_name;
    public $instagram_profile, $facebook_profile, $twitter_profile, $linkedin_profile;
    public $instagram_profile_followers, $facebook_profile_followers, $twitter_profile_followers, $linkedin_profile_followers, $default_handle;
    protected $facebookService;

    public function mount(){
        // Inject the Facebook service provider


        $user = User::find(auth()->id());
        $this->username = $user->username;
        $this->email = $user->email;
        $this->prevEmail = $user->email;
        $this->full_name = $user->name;
        // dd($user->channels);
        $this->instagram_profile = $user->social_instagram_profile;
        $this->facebook_profile = $user->social_facebook_profile;
        $this->twitter_profile = $user->social_twitter_profile;
        $this->linkedin_profile = $user->social_linkedin_profile;
                // social _count
        $this->instagram_profile_followers = $user->social_instagram_followers;
        $this->facebook_profile_followers = $user->social_facebook_followers;
        $this->twitter_profile_followers = $user->social_twitter_followers;
        $this->linkedin_profile_followers = $user->social_linkedin_followers;
    }

    public function saveDefaultHandle(){
        $this->validate([
            'default_handle' => "required|in:".implode(',', (new User)->social)
        ]);
        $this->user->update([
            'primary_handle' => $this->default_handle
        ]);
        $this->dispatchBrowserEvent('success_alert', [
            "message"=> $this->default_handle." has been successfully set as your default social handle"
        ]);
        createLog("you updated your default social handle", getIcon('pencil'), '4-blocks');

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

        createLog("you updated your profile", getIcon('pencil'), 'success');
        
    }


    
    
    public function openInstagramModal()
    {
        return $this->dispatchBrowserEvent('social:Instagram');
    }
    public function saveInstagram()
    {
        $this->validate([
            'instagram_profile' => [
                'nullable',
                'url',
                function ($attribute, $value, $fail) {
                    $parsedUrl = parse_url($value);
                    if (!isset($parsedUrl['host']) || $parsedUrl['host'] !== 'www.instagram.com') {
                        $fail("The $attribute must be a valid Instagram profile link.");
                    }
                },
            ],
            'instagram_profile_followers' => "required|integer",
        ]);
        // dd(parse_url($this->instagram_profile));
        $user = User::find(auth()->user()->id);
        $user->update([
            'social_instagram_profile' => $this->instagram_profile,
            'social_instagram_followers' => $this->instagram_profile_followers
        ]);
        $this->dispatchBrowserEvent('social:InstagramClose');
        if (!empty($this->instagram_profile)) {
            return $this->dispatchBrowserEvent('success_alert', [
                'message' => "instagram Profile adedd successfully!"
            ]);
        } else {
            return $this->dispatchBrowserEvent('info_alert', [
                'message' => "Empty String was passed in instagram Profile!"
            ]);
        }
    }
    public function openFacebookModal()
    {
            // Get the login URL
            // $loginUrl = $this->facebookService->getLoginUrl();
            

    
            // Redirect the user to the Facebook login page
            return redirect()->to(route('facebook.redirect'));
    
         $this->dispatchBrowserEvent('social:Facebook');
    }
    public function saveFacebook()
    {
        $this->validate([
            'facebook_profile' => [
                'nullable',
                'url',
                function ($attribute, $value, $fail) {
                    $parsedUrl = parse_url($value);
                    if (!isset($parsedUrl['host']) || $parsedUrl['host'] !== 'www.facebook.com') {
                        $fail("The $attribute must be a valid Facebook profile link.");
                    }
                },
            ],
            "facebook_profile_followers" => 'required|integer'
        ]);
        // dd(parse_url($this->instagram_profile));
        $user = User::find(auth()->user()->id);
        $user->update([
            'social_facebook_profile' => $this->facebook_profile,
            'social_facebook_followers' => $this->facebook_profile_followers
        ]);
        $this->dispatchBrowserEvent('social:FacebookClose');
        if (!empty($this->facebook_profile)) {
            return $this->dispatchBrowserEvent('success_alert', [
                'message' => "Facebook Profile adedd successfully!"
            ]);
        } else {
            return $this->dispatchBrowserEvent('info_alert', [
                'message' => "Empty String was passed in Facebook Profile!"
            ]);
        }
    }
    public function saveTwitter()
    {
        $this->validate([
            'twitter_profile' => [
                'nullable',
                'url',
                function ($attribute, $value, $fail) {
                    $parsedUrl = parse_url($value);
                    if (!isset($parsedUrl['host']) || $parsedUrl['host'] !== 'www.twitter.com') {
                        $fail("The $attribute must be a valid twitter profile link.");
                    }
                },
            ],
            'twitter_profile_followers'=> 'required|integer'
            
            
        ]);
        // dd(parse_url($this->instagram_profile));
        $user = User::find(auth()->user()->id);
        $user->update([
            'social_twitter_profile' => $this->twitter_profile,
            'social_twitter_followers' => $this->twitter_profile_followers
        ]);
        $this->dispatchBrowserEvent('social:TwitterClose');
        if (!empty($this->twitter_profile)) {
            return $this->dispatchBrowserEvent('success_alert', [
                'message' => "Twitter Profile adedd successfully!"
            ]);
        } else {
            return $this->dispatchBrowserEvent('info_alert', [
                'message' => "Empty String was passed in Twitter Profile!"
            ]);
        }
    }
    public function saveLinkedin()
    {
        $this->validate([
            'linkedin_profile' => [
                'nullable',
                'url',
                function ($attribute, $value, $fail) {
                    $parsedUrl = parse_url($value);
                    if (!isset($parsedUrl['host']) || $parsedUrl['host'] !== 'www.linkedin.com') {
                        $fail("The $attribute must be a valid Facebook profile link.");
                    }
                },
            ],
            "linkedin_profile_followers" => "required|integer"
        ]);
        // dd(parse_url($this->instagram_profile));
        $user = User::find(auth()->user()->id);
        $user->update([
            'social_linkedin_profile' => $this->linkedin_profile,
            'social_linkedin_followers' => $this->linkedin_profile_followers
        ]);
        $this->dispatchBrowserEvent('social:LinkedinClose');
        if (!empty($this->linkedin_profile)) {
            return $this->dispatchBrowserEvent('success_alert', [
                'message' => "Linkedin Profile added successfully!"
            ]);
        } else {
            return $this->dispatchBrowserEvent('info_alert', [
                'message' => "Empty String was passed in Linkedin Profile!"
            ]);
        }
    }

    public function openLinkedinModal()
    {
        return $this->dispatchBrowserEvent('social:Linkedin');
    }
    public function openTwitterModal()
    {
        return $this->dispatchBrowserEvent('social:Twitter');
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
