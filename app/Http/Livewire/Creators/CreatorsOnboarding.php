<?php

namespace App\Http\Livewire\Creators;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Categories;
use App\Models\AdvertiserInfo;
use Illuminate\Support\Facades\DB;
use App\Models\NigerianUniversities;
use Illuminate\Validation\Validator;
use App\Events\UserCompletedDialogue;
use App\Models\Socials\SocialAccount;

class CreatorsOnboarding extends Component
{

    public $user;
    public $name, $dob, $bio, $userState,$religion,  $socials, $userSocialAccounts, $seeSocialAccounts;
    public  $isEditing = false, $institution_collection = [];
    public $category = [];
    public $selected_category, $portfolio_url;
    // public $userState;
    // for the select box "graduate" and "Undergraduate"
    public $phone_numbers = [], $phone_number = [];
    protected $rules = [
        'name' => 'required',
        'dob' => 'required|olderThan:15',
        'bio' => 'nullable|min:30',
        'userState' => 'required',
        'religion' => 'required',

    ];

    protected  $listeners = [
        'getLastStop',
        'deleteInstitutionConfirmed'
    ];

    public function __construct()
    {
        // dd($this->userState, $this->religion);
        \Illuminate\Support\Facades\Validator::extend('olderThan', function ($attribute, $value, $parameters) {
            $minAge = (!empty($parameters)) ? (int) $parameters[0] : 13;
            return (new DateTime)->diff(new DateTime($value))->y >= $minAge;

            // or the same using Carbon:
            // return Carbon\Carbon::now()->diff(new Carbon\Carbon($value))->y >= $minAge;
        }, ['Must be at least 13 Years of Age']);
    }

    public function mount()
    {
        $this->phone_numbers = [];
        $CnameArr = [];
        $IDsArr = [];
        $Cname = Categories::all('category_name')->toArray();
        $id = Categories::all('id')->toArray();
        foreach ($Cname as $keys => $names) {

            array_push($CnameArr, $names['category_name']);
        }
        foreach ($id as $keys => $IDs) {
            array_push($IDsArr, $IDs['id']);
        }
        $this->category = array_merge($this->category, ["category_name" => $CnameArr]);
        $this->category = array_merge($this->category, ["id" => $IDsArr]);

        $this->user = User::where("id", auth()->user()->id)->with('advertiserInfos')->first()->toArray();
        // dd($this->user);
        $this->name = $this->user['name'];


        //if the user details row has been created fetch data from it
        if (!is_null($this->user['advertiser_infos'])) {
            $this->dob = $this->user['advertiser_infos']['dob'];
            $this->bio = $this->user['advertiser_infos']['bio'];
            $this->selected_category = $this->user['advertiser_infos']['category'];
            $this->selected_category = $this->user['advertiser_infos']['category'];
            $this->phone_numbers = $this->user['advertiser_infos']['phone_number'] == null ? [] : $this->user['advertiser_infos']['phone_number'];
        }
        // an arrsy of social currently used by adcrea8, could be updated in the future
        $this->socials = [
            [
                'name' => 'Facebook',
                "desc" => "Connect with Friends and Clients",
                'redirect_url' => route('facebook.redirect'), // Replace with your actual route
                'logo' => asset('users/assets/media/svg/brand-logos/facebook-4.svg'),
            ],
            [
                'name' => 'Google',
                "desc" => "Plan properly your workflow",
                'redirect_url' => route('google.redirect'), // Replace with your actual route
                'logo' => asset('users/assets/media/svg/brand-logos/youtube-3.svg'),
            ],
            [
                'name' => 'Instagram',
                "desc" => "Share Ideas",
                'redirect_url' =>route('facebook.redirect'), // Replace with your actual route
                'logo' => asset('users/assets/media/svg/brand-logos/instagram-2-1.svg') ,
            ],
        ];
    }
    public function getLastStop()
    {
        // dd('hi');
        if ($this->user['dialogue_last_complete'] != 0) {

            return $this->dispatchBrowserEvent('continueFromStop', [
                'index' => $this->user['dialogue_last_complete']
            ]);
        }
    }

    public function openEducationModal()
    {
        return $this->dispatchBrowserEvent('open_education_modal');
    }

    public function openConectedAccountModal($platform)
    {
        $this->seeSocialAccounts = [
            "platform" => $platform,
            "accounts" => $this->userSocialAccounts->where("platform", strtolower($platform))
        ];
        // dd($this->seeSocialAccounts);
        return $this->dispatchBrowserEvent('social:open-connected');
    }
    public function closeConectedAccountModal()
    {
        $this->seeSocialAccounts = null;
        return $this->dispatchBrowserEvent('social:close-connected');
    }
   
    public function stepOne()
    {

        $this->validate();
        $saveUser = User::find(auth()->user()->id);
        $saveUser->dialogue_last_complete = 1;
        $saveUser->name = $this->name;
        $userSaved = $saveUser->save();

        if (!is_null($this->user['advertiser_infos'])) {
            $advertiserDetails = AdvertiserInfo::findOrFail($this->user['advertiser_infos']['id']);
            $advertiserDetails->dob = $this->dob;
            $advertiserDetails->bio = $this->bio;
            $advertiserDetails->state = $this->userState;
            $advertiserDetails->religion = $this->religion;
            $infoSaved = $advertiserDetails->save();
        } else {
            $advertiserInfo = new AdvertiserInfo;
            $advertiserInfo->user_id = auth()->user()->id;
            $advertiserInfo->dob = $this->dob;
            $advertiserInfo->state = $this->userState;
            $advertiserInfo->religion = $this->religion;
            $advertiserInfo->bio = $this->bio;
            $infoSaved = $advertiserInfo->save();
        }

        if ($userSaved && $infoSaved) {
            $this->dispatchBrowserEvent('nextStep');
        } else {
            return false;
        }
    }


    public function stepTwo()
    {
        // dd($this->educational_status);
        $this->validate([
            "portfolio_url" => "url|nullable",
            "selected_category" => "required",
        ]);
        //getting the user instance
        $saveUser = User::find(auth()->user()->id);
        // $saveUser->name = $this->name;


        // checking if advertiser info is null if so create one    
        if (!is_null($this->user['advertiser_infos'])) {
            $advertiserDetails = AdvertiserInfo::findOrFail($this->user['advertiser_infos']['id']);
            $advertiserDetails->category = $this->selected_category;
            $advertiserDetails->portfolio_url = $this->portfolio_url;
            $infoSaved = $advertiserDetails->save();
        } else {
            $advertiserInfo = new AdvertiserInfo;
            $advertiserInfo->category = $this->selected_category;
            $advertiserInfo->portfolio_url = $this->portfolio_url;
            $infoSaved = $advertiserInfo->save();
        }

        if ($infoSaved) {
            $saveUser->dialogue_last_complete = 2;
            $userSaved = $saveUser->save();
            $this->dispatchBrowserEvent('nextStep');
        } else {
            return false;
        }
    }
    public function showAddNumber()
    {
        $this->dispatchBrowserEvent('showNumberModal');
    }
    public function savePhoneNumber()
    {
        $this->validate([
            'phone_number' => "required"
        ]);

        $this->phone_numbers = array_merge($this->phone_numbers, [$this->phone_number]);
        if (!is_null($this->user['advertiser_infos'])) {
            $advertiserDetails = AdvertiserInfo::findOrFail($this->user['advertiser_infos']['id']);
            $advertiserDetails->phone_number = $this->phone_numbers;
            $infoSaved = $advertiserDetails->save();
        } else {
            $advertiserInfo = new AdvertiserInfo;
            $advertiserInfo->user_id = auth()->user()->id;
            $advertiserInfo->phone_number = $this->phone_numbers;
            $infoSaved = $advertiserInfo->save();
        }
        session()->flash('success', 'Phone Number Added successfully');
    }


    public function stepThree()
    {
        //checking for empty social connection of the user

        $saveUser = User::find(auth()->user()->id);

        $saveUser->dialogue_last_complete = 3;
        $userSaved = $saveUser->save();
        $this->dispatchBrowserEvent('nextStep');
    }
    public function stepFour()
    {
        //checking for empty social connection of the user
        $this->validate([
            'phone_numbers' => 'required'
        ]);
        $saveUser = User::find(auth()->user()->id);

        $saveUser->dialogue_last_complete = 4;
        $saveUser->dialogue_complete = true;
        $userSaved = $saveUser->save();
        event(new UserCompletedDialogue($saveUser));
        $this->dispatchBrowserEvent('nextStep');
    }

    public function array_search_inner($array, $attr, $val, $strict = FALSE)
    {
        // Error is input array is not an array
        if (!is_array($array)) return FALSE;
        // Loop the array
        foreach ($array as $key => $inner) {
            // Error if inner item is not an array (you may want to remove this line)
            // if (!is_array($inner)) return FALSE;
            // Skip entries where search key is not present
            if (!isset($inner[$attr])) continue;
            if ($strict) {
                // Strict typing
                if ($inner[$attr] === $val) return $key;
            } else {
                // Loose typing
                if ($inner[$attr] == $val) return $key;
            }
        }
        // We didn't find it
        return NULL;
    }


    public function render()
    {
        
        $this->user = User::where("id", auth()->user()->id)->with('advertiserInfos')->first()->toArray();
        // get all user connected accounts 
        // dd($this->seeSocialAccounts);
        $this->userSocialAccounts = SocialAccount::where("user_id", $this->user['id'])->get();
        // dd($array);
        return view('livewire.creators.creators-onboarding', [
            'states' => DB::table('states')->get()
        ]);
    }
}
