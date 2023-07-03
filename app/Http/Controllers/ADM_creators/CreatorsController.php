<?php

namespace App\Http\Controllers\ADM_creators;

use App\Events\NewJobListingNotify;
use ParsedownExtra;
use App\Models\User;
use App\Models\Listing;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\ListingOnboarded;

class CreatorsController extends Controller
{
    //
    public function listing_index(){
       
        return view('ADM_creators.listing_index',  [
        'current_page' => 'Listings',
        'bread_action' => [
            'url' => route('dashboard'),
            'text' => "Add Listing"
        ],
        
    ]);
    }


    public function listing_show(){
       
        return view('ADM_creators.listing_show',  [
        'current_page' => 'Listings',
        'bread_action' => [
            'url' => route('dashboard'),
            'text' => "Add Listing"
        ],
        
    ]);
    }


    public function listing_apply(Listing $listing, Request $req){
       
      $listing->clicks()
            ->create([
                'user_agent' => $req->userAgent(),
                'ip' => $req->ip()
            ]);
            return redirect()->to($listing->apply_link);
    }

    public function showSelectedUserProfile($user_id){
        $user = User::find($user_id);
        dbNotify('👀 Profile Viewed!', "Hey there! Just wanted to give you a quick heads-up that your profile was recently viewed. It's great to see others taking an interest in what you have to offer. Keep up the good work and stay open to new opportunities!", 'info', $user, getIcon('search'));
        return view('ADM_creators.view_selected_user',[
            'user' => $user,
            'current_page' => $user->name.' Profile',
            // 'title' => "Adminting | Create a new Job Listing",
            'bread_action' => [
                'url' => route('listing.my_listings'),
                'text' => "My Listing"
            ],
        ]);
    }
    public function listing_create(){
        $amount = 900;
        return view('ADM_creators.listing_create',  [
            'current_page' => 'New Listing',
            'title' => "Adminting | Create a new Job Listing",
            'amount' => $amount,
            'bread_action' => [
                'url' => route('listing.my_listings'),
                'text' => "My Listing"
            ],
            
        ]);
     
    } 
    public function listing_store(Request $req){
        
          $req->validate([
                'title'=> "required",
                'description'=> "required"
              ]);
            
    $user = User::find(auth()->user()->id);

    //   begin paymet verification
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$req->payment_ref,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "Authorization: Bearer ".env('PAYSTACK_SECRET'),
          "Cache-Control: no-cache",
          'Content-Type: application/json'
        ),
      ));
      
      $response = json_decode(curl_exec($curl));
      $err = curl_error($curl);
    
      curl_close($curl);
      
      if ($err) {
        // echo "cURL Error #:" . $err;
      } else {
        // echo 'success';
        //save payment method for user 
        $auth = $response->data->authorization;
        $user->payment_methods()->firstOrCreate([
            'channel'=> $auth->channel,
            'authorization_code'=> $auth->authorization_code,
        ],[
            'channel' => $auth->channel,
            'ip_address' => $req->ip(),
            'authorization_code'=> $auth->authorization_code,
            'authorization_email' => $user->email,
            'authorization' => $auth,
        ]);
        // save transaction
        saveTransaction($response->data, "Payment for New Job Listing");
        // notify user about payment success
        dbNotify("💰 Payment Confirmed! 💳", "Congratulations! We are thrilled to inform you that your payment ($".$response->data->amount.") has been successfully confirmed. Thank you for your prompt payment and trust in our services. Your transaction has been completed, and we appreciate your support.", 'success', auth()->user(), getIcon('bank'));
      }
    //   end paymet verification
      
    //   dd(($response), $user->payment_methods);

    try {
        $md = new \ParsedownExtra();

        $listing = $user->listings()->create([
            'title'=> $req->title,
            'slug'=> Str::slug($req->title).'-'.rand(1111, 9999),
            'location' => $req->location,
            'content' => $md->text($req->description),
            'is_highlighted' => $req->filled('highlighted'),
            'is_active' => true,
            'apply_link' => "http://adminting.lcl/listings/new"
        ]);

        foreach (explode(',', $req->category) as $reqTag) {
            $tag = Categories::firstOrCreate([
                'category_slug' => Str::slug(trim($reqTag))
            ],[
                'category_name' =>ucwords(trim($reqTag))
            ],

        );
        $tag->listings()->attach($listing->id);
    }
    // dispatch app messages
    NewJobListingNotify::dispatch($listing, auth()->user());
    
    return response()->json([
        'code' => 1,//trigger success notification
        'message' => "Job Listing has been added Successfully, you can track progress at your dashboard!"
    ]);
    } catch (\Throwable $th) {
        //throw $th;
        return response()->json([
            'code' => 0,//trigger error notification
            'message' => "An Error occured! :".$th->getMessage()
        ]);
        // return ;
    }
     
    }


}
