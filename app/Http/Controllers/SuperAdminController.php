<?php

namespace App\Http\Controllers;

use App\Models\AppSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SuperAdminController extends Controller
{
    //
    public function general_setting(){
        return view('ADM_admin.general_settings',   [
            'current_page' => 'General Settings',
        'bread_action' => [
            'url' => route('dashboard'),
            'text' => "Dashboard"
        ],
        ]);
    }
    public function users_list(){
        return view('ADM_admin.users_list',   [
            'current_page' => 'Users List',
        'bread_action' => [
            'url' => route('dashboard'),
            'text' => "Dashboard"
        ],
        ]);
    }

    public function payroll (Request $req){
        return view('ADM_admin.payroll_view',   [
            'current_page' => 'Total Payroll',
        'bread_action' => [
            'url' => route('dashboard'),
            'text' => "Dashboard"
        ],
        ]);
    
    }


    public function update_app_logo(Request $req){
        $former_logo = AppSettings::find(1);
        $path = 'storage/app_logo';
        $file = $req->file('file');
        $oldPicture =$former_logo->app_logo;
        $file_path = $path.$oldPicture;
        $new_picture_name = 'ADM_LOGO_'.$former_logo->id.time().rand(1, 100000).'.'.$file->extension();

        if($oldPicture != null && File::exists(public_path($file_path))){
            File::delete(public_path($file_path));
            $former_logo->update([
                'app_logo' => null,
            ]);
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if($upload){
            $former_logo->update([
                'app_logo' => 'app_logo/'.$new_picture_name,
            ]);
            return response()->json(['status' => 1, 'msg' => "Your Profile Picture has been successfully Updated!!"]);
        }else{
            return response()->json(['status' => 0, "Something Went Wrong!!"]);

        }
    }
}
