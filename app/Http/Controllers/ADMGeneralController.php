<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ADMGeneralController extends Controller
{
    //
    public function changeProfilePicture(Request $req){
        $user = User::find(auth()->user()->id);
        $path = 'storage/profile-photos';
        $file = $req->file('file');
        $oldPicture =$user->profile_photo_path;
        $file_path = $path.$oldPicture;
        $new_picture_name = 'AIMG'.$user->id.time().rand(1, 100000).'.jpg';

        if($oldPicture != null && File::exists(public_path($file_path))){
            File::delete(public_path($file_path));
            $user->update([
                'profile_photo_path' => null,
            ]);
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if($upload){
            $user->update([
                'profile_photo_path' => 'profile-photos/'.$new_picture_name,
            ]);
            return response()->json(['status' => 1, 'msg' => "Your Profile Picture has been successfully Updated!!"]);
        }else{
            return response()->json(['status' => 0, "Something Went Wrong!!"]);

        }
  
    }




    public function listing_dashboard($listing_id){
        return view('listing.listing_dashboard', [
            'current_page' => 'Listings Oveview',
            // 'bread_action' => [
            //     'url' => route('dashboard'),
            //     'text' => "Add Listing"
            // ],
            
        ]);
    }

    public function listing_ratings($listing_id){
        return view('listing.listing_rating', [
            'current_page' => 'Listings Ratings',
            // 'bread_action' => [
            //     'url' => route('dashboard'),
            //     'text' => "Add Listing"
            // ],
            
        ]);
    }
}
