<?php

use App\Models\User;
use App\Models\Listing;
use App\Jobs\ListingOnboarded;
use App\Http\Livewire\ListingShow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\AccountSecurity;
use App\Http\Livewire\UserNotifications;
use App\Http\Controllers\ADMGeneralController;
use App\Http\Controllers\Social\ADMAuthSocials;
use App\Http\Livewire\AccountPersonalInfoUpdate;
use App\Mail\ListingOnboarded_ApplicantMail;
use App\Http\Controllers\ADM_creators\CreatorsController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Livewire\ListingFileUpload;
use App\Http\Livewire\SAdminUsersList;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'creators.dialogue_complete',
    'brand.dialogue_complete',
    'adm.not_super_admin',
    'adm.app_track_views'
])->group(function () {
    Route::get('/user/profile-show', function(){
        return view('ADM_profile.profile-show',[
            'current_page' => ucwords(auth()->user()->name).' Profile Page',
        ]);
    })->name('profile.profile-show');
    Route::get('/dashboard', function () {
        $user = User::where('dialogue_last_complete', 0)->get();
        // dbNotify("Hi Bruh", 'this is your first notification', 'success', $user, getIcon('bank'), true);
        return view('ADM_creators.dashboard', [
            'current_page' => ucwords(auth()->user()->brandInfos->brand_name).' Dashboard',
            
        ]);
        
        // return view('dashboard');
    })->name('dashboard');
    Route::post('/change-profile-picture', [ADMGeneralController::class, 'changeProfilePicture'])->name('change-profile-picture');
    Route::get('user/me/profile/personal-info', AccountPersonalInfoUpdate::class)->name('profile.personal-info');
    Route::get('user/me/profile/security', AccountSecurity::class)->name('profile.security');
    Route::get('/payment-ref', [CreatorsController::class, 'listing_store']);

    // onboarded_listing routes 
    Route::middleware([
        'adm.part_of_listing'
    ])->group(function () {
        // Route::get('/listing/{listing}/dashboard', [ADMGeneralController::class, 'listing_dashboard'])->name('listing.dashboard');
        // Route::get('/listing/{listing}/rating', [ADMGeneralController::class, 'listing_ratings'])->name('listing.ratings');
        // Route::get('/listing/{listing}/files', ListingFileUpload::class)->name('listing.files');
        Route::post('/listing/{listing}/files/upload', [ListingFileUpload::class, 'listingFileUpload'])->name('listing.files.upload');
        // route('listing.files', $listing_id);
    });

});

// general Routes 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'adm.app_track_views'
])->group(function () {
    Route::get('/user/{user_id}/show-profile', [CreatorsController::class, "showSelectedUserProfile"])->name('user.profile.show');
    Route::get('user/me/profile/notifications', UserNotifications::class)->name('profile.notifications');
    Route::get('/listing/{listing}/show', ListingShow::class)->name('listings.show');
    Route::get('/listing/{listing}/dashboard', [ADMGeneralController::class, 'listing_dashboard'])->name('listing.dashboard');
    Route::get('/listing/{listing}/rating', [ADMGeneralController::class, 'listing_ratings'])->name('listing.ratings');
    Route::get('/listing/{listing}/files', ListingFileUpload::class)->name('listing.files');

});


// SUper Admin Routes

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'adm.must_be_super_admin',
    'adm.app_track_views'
])->prefix('/super_admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('ADM_creators.dashboard', [
            'current_page' => 'Super Admin Dashboard',
            'bread_action' => [
                'url' => route('dashboard'),
                'text' => "Dashboard"
            ],
            
        ]);
    })->name('adm_admin.dashboard');

    Route::get('general_setting', [SuperAdminController::class, 'general_setting'])->name('super_admin.general_setting');
    Route::get('users_list', [SuperAdminController::class, 'users_list'])->name('super_admin.users_list');
    Route::post('update_app_logo', [SuperAdminController::class, 'update_app_logo'])->name('super_admin.change_app_logo');
    Route::get('finance/payroll', [SuperAdminController::class, 'payroll'])->name('super_admin.payroll');


    
});

// End SUper Admin Routes


Route::get("0auth/google/callback", [ ADMAuthSocials::class, "google_callBack"  ] )->name('google.callback');
Route::get("0auth/google/redirect", [ ADMAuthSocials::class, "google_redirect"  ] )->name('google.redirect');

Route::get("0auth/google/callback/auth", [ ADMAuthSocials::class, "google_redirect_auth"  ] )->name('google.callback.auth');
Route::get("0auth/google/redirect/auth", [ ADMAuthSocials::class, "google_redirect"  ] )->name('google.redirect');

Route::get("0auth/github/callback", [ ADMAuthSocials::class, "github_callBack"  ] )->name('github.callback');
Route::get("0auth/github/redirect", [ ADMAuthSocials::class, "github_redirect"  ] )->name('github.redirect');

Route::get("0auth/linkedin/callback", [ ADMAuthSocials::class, "linkedin_callBack"  ] )->name('linkedin.callback');
Route::get("0auth/linkedin/redirect", [ ADMAuthSocials::class, "linkedin_redirect"  ] )->name('linkedin.redirect');


// Mail testing view routes
 Route::get('mail/dialogue_complete', function(){
    // return view('layouts.ADM_mail_layouts');
    return view('mail.dialogue_complete', [
        'user'=> auth()->user()
    ]);
 });

 Route::get('mail/new_signup', function(){
    // return view('layouts.ADM_mail_layouts');
    return view('mail.new_user', [
        'user'=> auth()->user()
    ]);
 });
 Route::get('mail/new_job_creators', function(){
    // return view('layouts.ADM_mail_layouts');
    return view('mail.new_job_creators', [
        'user'=> auth()->user(),
        'listing' => Listing::find(rand(4, 22))
    ]);
 });
 Route::get('mail/new_job_brand', function(){
    // return view('layouts.ADM_mail_layouts');
    return view('mail.new_job_brand', [
        'user'=> auth()->user(),
        'listing' => Listing::find(rand(4, 22))
    ]);
 });
 Route::get('mail/listing_onboarded_applicant', function(){
    // return view('layouts.ADM_mail_layouts');
    $brand_onboarding = User::find(rand(4, 22));
    $brand = $brand_onboarding->brandInfos;
    // Mail::to(auth()->user()->email)->send(new ListingOnboarded_ApplicantMail(auth()->user(), Listing::find(rand(4, 22)), $brand));

    return view('mail.listing_onboarded_applicant', [
        'user'=> auth()->user(),
        'listing' => Listing::find(rand(4, 22)),
        'brand'=> $brand
    ]);
 });
 Route::get('mail/listing_completed_brand', function(){
    // return view('layouts.ADM_mail_layouts');
    $brand_onboarding = User::find(rand(4, 22));
    $brand = $brand_onboarding->brandInfos;
    // Mail::to(auth()->user()->email)->send(new ListingOnboarded_ApplicantMail(auth()->user(), Listing::find(rand(4, 22)), $brand));

    return view('mail.listing-completed', [
        'user'=> auth()->user(),
        'listing' => Listing::find(rand(4, 22)),
        'brand'=> $brand
    ]);
 });
 Route::get('mail/listing_completed_creator', function(){
    // return view('layouts.ADM_mail_layouts');
    $brand_onboarding = User::find(rand(4, 22));
    $brand = $brand_onboarding->brandInfos;
    // Mail::to(auth()->user()->email)->send(new ListingOnboarded_ApplicantMail(auth()->user(), Listing::find(rand(4, 22)), $brand));

    return view('mail.listing-completed_creator', [
        'user'=> auth()->user(),
        'listing' => Listing::find(rand(4, 22)),
        'brand'=> $brand
    ]);
 });
