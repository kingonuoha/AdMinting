<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UseCase;
use Livewire\Component;
use App\Models\Categories;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Events\NewJobListingNotify;
use App\Models\ListingFiles;
use Illuminate\Foundation\Testing\WithFaker;

class ListingCreate extends Component
{
    use WithPagination;
    public $amount = 0;
    public $allow_highlight;
    public $highlighting_price = 1500;
    public $title;
    public $location;
    public $description;
    public $highlighted;
    public $payment_ref = '';
    public $states;
    public $listings;
    public $category = [];
    public $s_use_case;
    public $use_cases;
    public $fileLinks = [];
    public $selected_category;
    public $required_social;
    public $due_date;
    public $terms_of_service;

   

    protected $listeners = ['addCount' => 'increaseAmount'];


    public function updatedFileLinks($value){
        dd('hi', $value);
    }
    public function addFileLink($link)
    {
        $this->fileLinks =array_merge($this->fileLinks, $link);
       createLog("you added a file to your listing", getIcon('file-up'), 'warning');

    }


    public function increaseAmount()
    {
        $this->amount += $this->highlighting_price;
        // dd($this->amount);
    }
    public function mount()
    {
        $CnameArr = [];
        $IDsArr = [];
        $Cname = Categories::all('category_name')->toArray();
        $id = Categories::all('id')->toArray();
        $this->use_cases = UseCase::all();
        foreach ($Cname as $keys => $names) {

            array_push($CnameArr, $names['category_name']);
        }
        foreach ($id as $keys => $IDs) {
            array_push($IDsArr, $IDs['id']);
        }
        $this->category = array_merge($this->category, ["category_name" => $CnameArr]);
        $this->category = array_merge($this->category, ["id" => $IDsArr]);
        $this->states = DB::table('states')->get();
    }

    public function storeListing()
    {
        
       
        $this->resetErrorBag();
        $data =   $this->validate([
            'title' => "required",
            'required_social' => "required",
            'terms_of_service' => 'nullable|min:20|max:500',
            'due_date' => "required|integer|between:2,60",
            'description' => "required|max:600|min:40",
            'location' => "required",
            'highlighted' => "nullable",
            'selected_category' => "required",
            'amount' => "required|numeric|min:2000|max:400000000",
            's_use_case' => "required",
            'fileLinks' => "required",
        ]);



        $socials = [] ;
        foreach (explode(',', $data['required_social']) as $social) {
            array_push($socials, $social);
        }
        $this->required_social = $socials;
        // dd($this->required_social);
        $user = User::find(auth()->user()->id);

     

        //   dd(($response), $user->payment_methods);

        try {
            $md = new \ParsedownExtra();

            $listing = $user->listings()->create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']) . '-' . rand(1111, 9999),
                'location' => $data['location'],
                'content' => $md->text($data['description']),
                'usecase_id' => $data['s_use_case'],
                'required_social' => $this->required_social,
                'terms_of_service' => $data['terms_of_service'],
                'is_highlighted' => filled('highlighted'),
                'no_of_days' =>$data['due_date'],
                'price' =>$data['amount'],
                'is_active' => true,
                'apply_link' => "http://adminting.lcl/listings/new"
            ]);

            
            foreach (explode(',', $data['selected_category']) as $reqTag) {
                $tag = Categories::firstOrCreate(
                    [
                        'category_slug' => Str::slug(trim($reqTag))
                    ],
                    [
                        'category_name' => ucwords(trim($reqTag))
                    ],

                );
                $tag->listings()->attach($listing->id);
                
            }
            foreach ($this->fileLinks as $hash) {
                $file = ListingFiles::where('unique_hash', $hash)->first();
                $file->update(['listing_id' => $listing->id]);
            }
            // dispatch app messages
            NewJobListingNotify::dispatch($listing, auth()->user());
            $this->dispatchBrowserEvent("success_alert", ["message" => "Job Listing has been added Successfully, you can track progress at your dashboard!"]);
            dbNotify("listing created", "Job Listing has been added Successfully, you can track progress at your dashboard!", "success", $user,'briefcase', false);
       createLog("you created a listing", getIcon('briefcase'), 'info');
            
        } catch (\Throwable $th) {
       createLog("error creating listing", getIcon('warning'), 'danger');

            return $this->dispatchBrowserEvent("error_alert", ["message" => "An Error occured! :" . $th->getMessage()]);

            // return ;
        }

        //  redirect to paystack
        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
          'email' => auth()->user()->email,
          'amount' => $this->amount * 100,
          'callback_url' => route('listing.payment-confirm', ['user_id'=> $user->id, 'listing_id' => $listing->id]),
          'channels' =>['card']
        ];
      
        $fields_string = http_build_query($fields);
      
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Authorization: Bearer ".env('PAYSTACK_SECRET'),
          "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $result =json_decode(curl_exec($ch)) ;
        if($result->status){
            return redirect()->away($result->data->authorization_url);
        }else{
          dd('an Error Occured!');
        }

    }

    public function render()
    {
        $this->listings = auth()->user()->listings;
        return view('livewire.listing-create');
    }
}
