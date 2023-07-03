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

class CreatorsOnboarding extends Component
{
    
    public $user;
    public $name, $dob, $bio, $userState, $userLga, $religion;
    public $institution, $degree, $course, $courseYear, $isEditing = false, $min_price, $max_price,  $institution_collection = [];
    public $category = [], $currEduStat;
    public $selected_category, $portfolio_url;
    // public $userState;
    // for the select box "graduate" and "Undergraduate"
    public $educational_status;
    public $phone_numbers=[], $phone_number = [];
        
    protected $rules = [
        'name' => 'required',
        'dob' => 'required|olderThan:15',
        'bio' => 'required',
        'userState' => 'required',
        'religion' => 'required',
        
    ];

    protected  $listeners = [
        'getLastStop',
        'deleteInstitutionConfirmed'
    ];

    public function __construct(){
        // dd($this->userState, $this->religion);
        \Illuminate\Support\Facades\Validator::extend('olderThan', function($attribute, $value, $parameters)
        {
            $minAge = ( ! empty($parameters)) ? (int) $parameters[0] : 13;
            return (new DateTime)->diff(new DateTime($value))->y >= $minAge;
        
            // or the same using Carbon:
            // return Carbon\Carbon::now()->diff(new Carbon\Carbon($value))->y >= $minAge;
        }, ['Must be at least 13 Years of Age']);
    }
   
    public function mount(){
        $this->phone_numbers=[];
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

        $this->user = User::where("id", auth()->user()->id)->with('advertiserInfos')->first()->toArray();
        // dd($this->user);
        $this->name = $this->user['name'];
        
        
        //if the user details row has been created fetch data from it
        if (!is_null($this->user['advertiser_infos'])) {
            $this->institution_collection = $this->user['advertiser_infos']['education'] == null ? []: $this->user['advertiser_infos']['education'];
            $this->dob = $this->user['advertiser_infos']['dob'];
            $this->bio = $this->user['advertiser_infos']['bio'];
            $this->selected_category = $this->user['advertiser_infos']['category'];
            $this->selected_category = $this->user['advertiser_infos']['category'];
            $this->educational_status = $this->user['advertiser_infos']['educational_status'];
            $this->phone_numbers = $this->user['advertiser_infos']['phone_number'] == null ? []: $this->user['advertiser_infos']['phone_number']; 
        }
        
    }
    public function getLastStop(){
        // dd('hi');
        if($this->user['dialogue_last_complete'] != 0){
            
            return $this->dispatchBrowserEvent('continueFromStop', [
                'index' => $this->user['dialogue_last_complete']
            ]);
        }
        
    }
  
    public function openEducationModal(){
      
            
            return $this->dispatchBrowserEvent('open_education_modal');
        
        
    }

    public function stepOne(){
       
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
        }else{
            $advertiserInfo = new AdvertiserInfo;
            $advertiserInfo->user_id = auth()->user()->id;
            $advertiserInfo->dob = $this->dob;
            $advertiserInfo->state = $this->userState;
            $advertiserInfo->religion = $this->religion;
            $advertiserInfo->bio = $this->bio;
            $infoSaved = $advertiserInfo->save();

           

        }

        if($userSaved && $infoSaved){
            $this->dispatchBrowserEvent('nextStep');
        }else{
            return false;
        }
    }


    public function stepTwo(){
        // dd($this->educational_status);
        $this->validate([
        "portfolio_url" => "url|nullable",
        "educational_status" => "required",
        "selected_category" => "required",
        "min_price" => "nullable|min:5|max:400|integer",
        "max_price" => "nullable|min:5|max:400|integer",
        ]);
        //getting the user instance
        $saveUser = User::find(auth()->user()->id);
        // $saveUser->name = $this->name;
       

        // checking if advertiser info is null if so create one    
        if (!is_null($this->user['advertiser_infos'])) {
           $advertiserDetails = AdvertiserInfo::findOrFail($this->user['advertiser_infos']['id']);
           $advertiserDetails->category = $this->selected_category;
           $advertiserDetails->min_price = ($this->min_price == null)? 0000 : $this->min_price;
           $advertiserDetails->max_price = ($this->max_price == null)? 0000 : $this->max_price;
           $advertiserDetails->portfolio_url = $this->portfolio_url;
           $advertiserDetails->educational_status = $this->educational_status;
           $infoSaved = $advertiserDetails->save();
        //    "portfolio_url" => "required|url",
        //    "educational_status" => "required",
        //    "selected_category" => "required",
        }else{
            $advertiserInfo = new AdvertiserInfo;
            $advertiserInfo->category = $this->selected_category;
           $advertiserInfo->portfolio_url = $this->portfolio_url;
           $advertiserInfo->min_price = ($this->min_price == null)? 0000 : $this->min_price;
           $advertiserInfo->max_price = ($this->max_price == null)? 0000 : $this->max_price;
           $advertiserInfo->educational_status = $this->educational_status;
            $infoSaved = $advertiserInfo->save();

           

        }

        if($infoSaved){
            $saveUser->dialogue_last_complete = 2;
            $userSaved = $saveUser->save();
            $this->dispatchBrowserEvent('nextStep');
        }else{
            return false;
        }
    }

    public function make_min_max_null(){
       $this->min_price = null;
       $this->max_price = null;
       $this->dispatchBrowserEvent('showToast',[
        "message" => "You can now recieve Job Listing of all price tags",
        'type'=>"success"
       ]);
    }
    public function showAddNumber(){
        $this->dispatchBrowserEvent('showNumberModal');
    }
    public function savePhoneNumber(){
        $this->validate([
            'phone_number' => "required"
        ]);

        array_push($this->phone_numbers, ["number"=>$this->phone_number]);
        if (!is_null($this->user['advertiser_infos'])) {
            $advertiserDetails = AdvertiserInfo::findOrFail($this->user['advertiser_infos']['id']);
            $advertiserDetails->phone_number = $this->phone_numbers;
            $infoSaved = $advertiserDetails->save();
         }else{
            $advertiserInfo = new AdvertiserInfo;
             $advertiserInfo->user_id = auth()->user()->id;
             $advertiserInfo->phone_number = $this->phone_numbers;
             $infoSaved = $advertiserInfo->save();
 
         }
        session()->flash('success', 'Phone Number Added successfully');
    }

    
    public function stepThree(){
        //checking for empty social connection of the user

        $saveUser = User::find(auth()->user()->id);
        
            $saveUser->dialogue_last_complete = 3;
            $userSaved = $saveUser->save();
            $this->dispatchBrowserEvent('nextStep');
    }
    public function stepFour(){
        //checking for empty social connection of the user
        $this->validate([
            'phone_number'=>'required'
        ]);
        $saveUser = User::find(auth()->user()->id);
        
            $saveUser->dialogue_last_complete = 4;
            $saveUser->dialogue_complete = true;
            $userSaved = $saveUser->save();
            event(new UserCompletedDialogue($saveUser));
            $this->dispatchBrowserEvent('nextStep');
    }
    public function saveInstitution(){
        $this->validate([
            "institution" => "required",
        "degree" => "required",
        "courseYear" => "required",
        "course" => "required",
        ]);

        $currInstitutionArray = [
            'id' => now(),
            "institution" => (int)$this->institution,
            "degree" => $this->degree ,
            "course" => $this->course ,
            "courseYear" => $this->courseYear 
        ];

        array_unshift($this->institution_collection, $currInstitutionArray);
        
        if (!is_null($this->user['advertiser_infos'])) {
            $advertiserDetails = AdvertiserInfo::findOrFail($this->user['advertiser_infos']['id']);
            $advertiserDetails->education = $this->institution_collection;
            $infoSaved = $advertiserDetails->save();
         }else{
            $advertiserInfo = new AdvertiserInfo;
             $advertiserInfo->user_id = auth()->user()->id;
             $advertiserInfo->education = $this->institution_collection;
             $infoSaved = $advertiserInfo->save();
 
         }

        $this->institution = "";
        $this->degree= "";
        $this->course= "";
        $this->courseYear= "";
        
        session()->flash('success', 'Education Added!');
    }

    public function delInstitution($id){
        // $this->institution_collection = "";
       return $this->dispatchBrowserEvent('deleteInstitution',[
        "title"=> "Are you sure?",
        'body'=> " You are about to Delete your Educational Details from the app, this action cant be undone, Proceed?",
        'id'=> $id
       ]);
    }
        

    public function deleteInstitutionConfirmed($id){
        $key = $this->array_search_inner ($this->institution_collection, 'id', $id);
        // dd($key);
        $InstName = '';
        if($key || $key === 0 || $key === "0"){
            //retrieve name of institution for success message
            $InstName = NigerianUniversities::find($this->institution_collection[$key]['institution'])->name;
            // Delete the selected array from array list
            unset($this->institution_collection[$key]);
            //update the database
            if (!is_null($this->user['advertiser_infos'])) {
                $advertiserDetails = AdvertiserInfo::findOrFail($this->user['advertiser_infos']['id']);
                $advertiserDetails->education = $this->institution_collection;
                $infoSaved = $advertiserDetails->save();
            }else{
                $advertiserInfo = new AdvertiserInfo;
                    $advertiserInfo->user_id = auth()->user()->id;
                    $advertiserInfo->education = $this->institution_collection;
                    $infoSaved = $advertiserInfo->save();
            }

            if($infoSaved){
                session()->flash('success', $InstName.' has been removed from list!');
            }

        }
}

public function array_search_inner ($array, $attr, $val, $strict = FALSE) {
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
        if (!is_null($this->user['advertiser_infos'])) {
        $this->institution_collection = $this->user['advertiser_infos']['education'] == null ? []: $this->user['advertiser_infos']['education'];
        }
        // dd($array);
        return view('livewire.creators.creators-onboarding',[
            'universities' => NigerianUniversities::all(),
            'states' => DB::table('states')->get()
        ]);
    }
}
