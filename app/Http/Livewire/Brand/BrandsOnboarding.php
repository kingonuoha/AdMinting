<?php

namespace App\Http\Livewire\Brand;

use DateTime;
use App\Models\User;
use Livewire\Component;
use App\Models\BrandInfo;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use App\Models\NigerianUniversities;
use App\Events\UserCompletedDialogue;

class BrandsOnboarding extends Component
{
     
    public $user;
    public $brand_name, $inception_date, $short_desc;
    public $description, $brand_email, $location;
    public $institution, $degree, $course, $courseYear, $isEditing = false,  $institution_collection = [];
    public $category = [], $currEduStat;
    public $selected_category, $portfolio_url;
    // public $userState;
    // for the select box "graduate" and "Undergraduate"
    public $educational_status;
    public $phone_numbers=[], $phone_number = [];
        
    protected $rules = [
        'brand_name' => 'required',
        'inception_date' => 'required',
       
        
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

        $this->user = User::where("id", auth()->user()->id)->with('brandInfos')->first()->toArray();
        // dd($this->user);
        //if the user details row has been created fetch data from it
        if (!is_null($this->user['brand_infos'])) {
            $this->inception_date = $this->user['brand_infos']['inception_date'];
            $this->brand_name = $this->user['brand_infos']['brand_name'];
            $this->selected_category = is_null($this->user['brand_infos']['category'])? "" : $this->user['brand_infos']['category'];
            $this->description = is_null($this->user['brand_infos']['description'])? "" : $this->user['brand_infos']['description'];
            $this->brand_email = is_null($this->user['brand_infos']['brand_email'])? "" : $this->user['brand_infos']['brand_email'];
            $this->location = is_null($this->user['brand_infos']['location'])? "" : $this->user['brand_infos']['location'];
            $this->phone_numbers = is_null($this->user['brand_infos']['phone_number'])? "" : $this->user['brand_infos']['phone_number'];
            $this->short_desc = is_null($this->user['brand_infos']['short_desc'])? "" : $this->user['brand_infos']['short_desc'];
            // $this->educational_status = $this->user['brand_infos']['educational_status'];
            // $this->phone_numbers = $this->user['brand_infos']['phone_number'] == null ? []: $this->user['brand_infos']['phone_number']; 
        }
        // dd($this->selected_category);
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
        $userSaved = $saveUser->save();

        if (!is_null($this->user['brand_infos'])) {
           $brandInfo = BrandInfo::findOrFail($this->user['brand_infos']['id']);
           $brandInfo->brand_name = $this->brand_name;
           $brandInfo->inception_date = $this->inception_date;
           $infoSaved = $brandInfo->save();
        }else{
            $brandInfo = new BrandInfo;
            $brandInfo->user_id = auth()->user()->id;
            $brandInfo->brand_name = $this->brand_name;
            $brandInfo->inception_date = $this->inception_date;
            $infoSaved = $brandInfo->save();
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
        "short_desc" => "required",
        "brand_email" => "required",
        "location" => "required",
        "description" => "required",
        "phone_numbers" => "required",
        ]);
        //getting the user instance
        $saveUser = User::find(auth()->user()->id);
        // $saveUser->name = $this->name;
       

        // checking if advertiser info is null if so create one    
        if (!is_null($this->user['brand_infos'])) {
           $brandInfo = BrandInfo::findOrFail($this->user['brand_infos']['id']);
           $brandInfo->short_desc = $this->short_desc;
           $brandInfo->brand_email = $this->brand_email;
           $brandInfo->location = $this->location;
           $brandInfo->description = $this->description;
           $brandInfo->phone_number = $this->phone_numbers;
           $infoSaved = $brandInfo->save();
        }else{
            $brandInfo = new BrandInfo;
            $brandInfo->short_desc = $this->short_desc;
            $brandInfo->brand_email = $this->brand_email;
            $brandInfo->location = $this->location;
            $brandInfo->description = $this->description;
            $brandInfo->phone_number = $this->phone_numbers;
            $infoSaved = $brandInfo->save();

           

        }

        if($infoSaved){
            $saveUser->dialogue_last_complete = 2;
            $userSaved = $saveUser->save();
            $this->dispatchBrowserEvent('nextStep');
        }else{
            return false;
        }
    }

    public function showAddNumber(){
        $this->dispatchBrowserEvent('showNumberModal');
    }
    public function savePhoneNumber(){
        $this->validate([
            'phone_number' => "required"
        ]);

        
       $number_exists = $this->array_search_inner($this->phone_numbers, 'number', $this->phone_number, true);
       if($number_exists || $number_exists === 0 || $number_exists === "0"){
        // delete existing number if typed again
           unset( $this->phone_numbers[$number_exists]);
           return  session()->flash('error', 'Number duplicate detected, number has been successfully deleted!');
           
       }
        array_push($this->phone_numbers, ["number"=>$this->phone_number]);
        if (!is_null($this->user['brand_infos'])) {
            $brandInfo = BrandInfo::findOrFail($this->user['brand_infos']['id']);
            $brandInfo->phone_number = $this->phone_numbers;
            $infoSaved = $brandInfo->save();
         }else{
            $brandInfo = new BrandInfo;
             $brandInfo->user_id = auth()->user()->id;
             $brandInfo->phone_number = $this->phone_numbers;
             $infoSaved = $brandInfo->save();
 
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
        
        if (!is_null($this->user['brand_infos'])) {
            $brandInfo = BrandInfo::findOrFail($this->user['brand_infos']['id']);
            $brandInfo->education = $this->institution_collection;
            $infoSaved = $brandInfo->save();
         }else{
            $brandInfo = new BrandInfo;
             $brandInfo->user_id = auth()->user()->id;
             $brandInfo->education = $this->institution_collection;
             $infoSaved = $brandInfo->save();
 
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
            if (!is_null($this->user['brand_infos'])) {
                $brandInfo = BrandInfo::findOrFail($this->user['brand_infos']['id']);
                $brandInfo->education = $this->institution_collection;
                $infoSaved = $brandInfo->save();
            }else{
                $brandInfo = new BrandInfo;
                    $brandInfo->user_id = auth()->user()->id;
                    $brandInfo->education = $this->institution_collection;
                    $infoSaved = $brandInfo->save();
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
        $this->user = User::where("id", auth()->user()->id)->with('brandInfos')->first()->toArray();
        // $this->institution_collection = $this->user['brand_infos']['education'] == null ? []: $this->user['brand_infos']['education'];
        // dd($array);
        return view('livewire.brand.brands-onboarding',[
            'universities' => NigerianUniversities::all(),
            'states' => DB::table('states')->get(),
            'brand_info' =>$this->user['brand_infos']
        ]);
    }
   
}
