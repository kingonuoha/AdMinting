<?php

namespace App\Http\Controllers;

use App\Models\NewsLetter;
use Illuminate\Http\Request;
use App\Mail\NewsLetterSubscription;
use Illuminate\Support\Facades\Mail;

class ADMGuestController extends Controller
{
    //
    public function home(){
        return view('guest.home', [
            // 'current_page' => 'Listings Ratings',
            // 'bread_action' => [
            //     'url' => route('dashboard'),
            //     'text' => "Add Listing"
            // ],
            
        ]);
    }
    public function coming_soon(){
        return view('guest.coming_soon', [
           
        ]);
    }
    public function privacy_policy(){
        return view('guest.privacy_policy', [
           
        ]);
    }
    public function newsletter_subscription(Request $req){
        $data = $req->validate([
            'email'=> 'required|email|unique:news_letters,email'
        ]);
        $isSaved = NewsLetter::create($data);
        if($isSaved){
            Mail::to($data['email'])->send(new NewsLetterSubscription($data));
            dd('Thank You for subscribing, Check your email for response');
        }
    }
}
