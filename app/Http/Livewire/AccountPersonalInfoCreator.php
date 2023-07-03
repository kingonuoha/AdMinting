<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class AccountPersonalInfoCreator extends Component
{
    public $user;
    public $username;
    public $email;
    public $bio;
    public $selected_category;
    public $dob;
    public $userState;
    public $prevEmail;
    public $ustates;
    public $religion;
    public $portfolio;
    public $Ireligion;
    public $full_name;
    public $category = [];
    public $phone_numbers = [];
    public $phone_number;

    public function mount(){
        $user = User::find(auth()->id());
        // dd($user->advertiserInfos->phone_number);
        $this->userState = $user->advertiserInfos->state;
        $this->Ireligion = $user->advertiserInfos->religion;
        $this->selected_category = $user->advertiserInfos->category;
        $this->portfolio = $user->advertiserInfos->portfolio;
        $this->dob = $user->advertiserInfos->dob;
        $this->bio = $user->advertiserInfos->bio;
        $this->ustates = DB::table('states')->get();

        $CnameArr = [];
        $IDsArr = [];
       $Cname = Categories::all('category_name')->toArray();
       $id = Categories::all('id')->toArray();
       foreach($Cname as $keys => $names){

        array_push($CnameArr, $names['category_name']);
       }
       foreach($id as $keys => $IDs){
        array_push($IDsArr, $IDs['id']);
       }
       $this->category = array_merge( $this->category, ["category_name" => $CnameArr]);
       $this->category = array_merge( $this->category, ["id" => $IDsArr]);
    }

    public function addNumber(){
        $this->validate([
            'phone_number' =>[['required', 'regex:/^[0-9]{10}$/'],
            [
                'phone_number.regex' => 'pls enter a valid Phone Number!',
            ]],
        ]);

        array_push($this->phone_numbers, ["number"=>$this->phone_number]);
        if (!is_null($this->user->advertiserInfos)) {
            $advertiserDetails = $this->user->advertiserInfos->update([
                'phone_number' => $this->phone_numbers
            ]);
            $this->dispatchBrowserEvent('showToast', [
                'message'=>'Phone Number Added successfully',
                "type"=>"success"
            ]);
         }
    }
    public function personal_info_creator_update()
    {
        $this->validate([
            'dob' =>'required',
            'userState' =>'required',
            'religion' =>'required',
            'bio' =>'required',
            'selected_category' =>'required',
            'portfolio' =>'nullable|url',
        ]);

        if (!is_null($this->user->advertiserInfos)) {
            $advertiserDetails = $this->user->advertiserInfos->update([
                "dob" => $this->dob,
                "state" => $this->userState,
                "religion" => $this->religion,
                "bio" => $this->bio,
                "category" => $this->selected_category,
                "portfolio" => $this->portfolio,

            ]);
            dbNotify("✏️ Profile Update Successful!", "Great news! Your profile has been successfully updated. Your changes have been saved and will now be reflected in your profile. Keep up the good work in maintaining an up-to-date and impressive profile.", 'success', auth()->user(), getIcon('pencil'));
            $this->dispatchBrowserEvent('showToast', [
                'message'=>'Profession Details has been uploaded successfully...running some background functions!',
                "type"=>"success"
            ]);
         }
    }
    public function render()
    {
        $this->user = User::find(auth()->id());
        return view('livewire.account-personal-info-creator');
    }
}
