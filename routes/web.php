<?php

use App\Models\User;
use App\Models\Listing;
use Illuminate\Support\Str;
use App\Jobs\ListingOnboarded;
use App\Http\Livewire\ListingShow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\AccountSecurity;
use App\Http\Livewire\SAdminUsersList;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Social\Youtube;
use App\Http\Livewire\ListingFileUpload;
use App\Http\Livewire\UserNotifications;
use App\Http\Controllers\ADMGuestController;
use App\Mail\ListingOnboarded_ApplicantMail;
use App\Http\Controllers\ADMGeneralController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Social\ADMAuthSocials;
use App\Http\Livewire\AccountPersonalInfoUpdate;
use App\Http\Controllers\Social\GoogleController;
use App\Http\Controllers\Social\FacebookController;
use App\Http\Controllers\ADM_creators\CreatorsController;

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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'check.dialogue',
    'adm.app_track_views'
])->group(function () {
    Route::get('/user/profile-show', function () {
        return view('ADM_profile.profile-show', [
            'current_page' => ucwords(auth()->user()->name) . ' Profile Page',
        ]);
    })->name('profile.profile-show');
    Route::get('/dashboard', function () {
        $user = User::with([
            'applied_listings' => function ($query) {
                $query->whereNull('creator_marked_complete_on'); // Pending jobs
            },
            'socialAccounts', // Other relationships
        ])
            ->withCount([
                'applied_listings as completed_jobs_count' => function ($query) {
                    $query->whereNotNull('creator_marked_complete_on'); // Completed jobs count
                }
            ])
            ->find(auth()->id());

        $potentialEarnings = $user->applied_listings->sum('price');
        $followers = 0;
        foreach ($user->socialAccounts as $account) {
            $pages = $account->socialPages ?? [];
            foreach ($pages as $page) {
                $followers +=  $page->metrics()->firstWhere("name", "followers")->value ?? 0;
            }
        }
        $topStats = [
            [
                'title' => "Potential Earnings",
                'icon' => 'wallet',
                'count' => "NGN " . formatMoney($potentialEarnings, true),
                'color' => 'primary'
            ],
            [
                'title' => "Jobs Completed",
                'icon' => 'cursor',
                'count' =>  $user->completed_jobs_count,
                'color' => 'info'
            ],
            [
                'title' => "Followers",
                'icon' => 'bank',
                'count' => formatNumber($followers),
                'color' => 'warning'
            ],
            [
                'title' => "Total Socials Connected",
                'icon' => 'trophy',
                'count' =>  count($user->socialAccounts),
                'color' => 'success'
            ],
        ];
        $current_page = "Creator Dash";

        // dbNotify("Hi Bruh", 'this is your first notification', 'success', $user, getIcon('bank'), true);
        return view('ADM_creators.dashboard', compact("topStats", "current_page"));

        // return view('dashboard');
    })->name('dashboard');
    Route::post('/change-profile-picture', [ADMGeneralController::class, 'changeProfilePicture'])->name('change-profile-picture');
    Route::post('/listing/dispute_file/upoad', [ADMGeneralController::class, 'disputeFileUpload'])->name('listing.upload_dispute_files');
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
    $app_name_slug = Str::slug(strtolower(env("APP_NAME")), "_");
    Route::get('/user/{user_name}/create/listings', [CreatorsController::class, "createCreatorListing"])->name('user.creator.listing.new');
    Route::post('/user/creator/listing/media-upload', [CreatorsController::class, 'creatorListingUploadMedia'])->name('user.creator.listing.media-upload');
    Route::post('/user/creator/listing/media-delete', [CreatorsController::class, 'creatorListingDeleteMedia'])->name('user.creator.listing.media-delete');

    Route::get('/user/{user_name}/listings', [CreatorsController::class, "showCreatorListings"])->name('user.services.show');
    Route::get('/user/{user_name}/profile', [CreatorsController::class, "showProfile"])->name('user.public_profile');
    Route::get('user/me/profile/notifications', UserNotifications::class)->name('profile.notifications');
    Route::get('user/me/profile/finance', [CreatorsController::class, "showFinance"])->name('profile.finance');
    Route::get('user/me/profile/socials/index', [CreatorsController::class, "showSocials"])->name('profile.socials');
    Route::get('/listing/{listing}/show', ListingShow::class)->name('listings.show');
    Route::get('/listing/{listing}/dashboard', [ADMGeneralController::class, 'listing_dashboard'])->name('listing.dashboard');
    Route::get('/listing/{listing}/rating', [ADMGeneralController::class, 'listing_ratings'])->name('listing.ratings');
    Route::get('/listing/{listing}/disputes', [ADMGeneralController::class, 'listing_disputes'])->name('listing.disputes');
    Route::get('/listing/{listing}/files', ListingFileUpload::class)->name('listing.files');
    Route::post('/user/{user_id}/gallery', [CreatorsController::class, 'user_gallery_upload'])->name('user.gallery_upload');

    Route::get('social/{page_id}/overview', [ADMGeneralController::class, "socialPageOverview"])->name('social_page.overview');
});


// SUper Admin Routes

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'role:admin',
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
    $app_name_slug = Str::slug(strtolower(env("APP_NAME")), "_");

    Route::get($app_name_slug . '/changelog/settings', [SuperAdminController::class, 'changelog_setting'])->name('super_admin.changelog_setting');
    Route::get($app_name_slug . 'general_setting', [SuperAdminController::class, 'general_setting'])->name('super_admin.general_setting');
    Route::get('users_list', [SuperAdminController::class, 'users_list'])->name('super_admin.users_list');
    Route::post('update_app_logo', [SuperAdminController::class, 'update_app_logo'])->name('super_admin.change_app_logo');
    Route::get('finance/payroll', [SuperAdminController::class, 'payroll'])->name('super_admin.payroll');
    Route::get('extras/listing_disputes', [SuperAdminController::class, 'listing_disputes'])->name('super_admin.listing_disputes');
    // Route::get('/' . $app_name_slug . "/changelog",[ADMGeneralController::class, 'changelog'])->name('changelog');
});

// End SUper Admin Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
])->group(function () {
    $app_name_slug = Str::slug(strtolower(env("APP_NAME")), "_");

    Route::post("/newsletter/subscription", [ADMGuestController::class, "newsletter_subscription"])->name('guest.newsletter_subscription');
    Route::get("/privacy_policy", [ADMGuestController::class, "privacy_policy"])->name('guest.privacy_policy');
    Route::get("/coming_soon", [ADMGuestController::class, "coming_soon"])->name('guest.coming_soon');
    Route::get('/' . $app_name_slug . "/changelog", [ADMGeneralController::class, 'changelog'])->name('changelog');

    Route::get("0auth/google/callback", [GoogleController::class, "google_callBack"])->name('google.callback');
    Route::get("0auth/google/redirect", [GoogleController::class, "google_redirect"])->name('google.redirect');

    // Route::get("0auth/google/callback/auth", [ ADMAuthSocials::class, "google_redirect_auth"  ] )->name('google.callback.auth');
    Route::get("0auth/google/callback/auth", [ADMAuthSocials::class, "google_callback"])->name('google.callback.auth');
    Route::get("0auth/google/redirect/auth", [ADMAuthSocials::class, "google_redirect"])->name('google.redirect.auth');

    Route::get("0auth/github/callback", [ADMAuthSocials::class, "github_callBack"])->name('github.callback');
    Route::get("0auth/github/redirect", [ADMAuthSocials::class, "github_redirect"])->name('github.redirect');

    Route::get("0auth/linkedin/callback", [ADMAuthSocials::class, "linkedin_callBack"])->name('linkedin.callback');
    Route::get("0auth/linkedin/redirect", [ADMAuthSocials::class, "linkedin_redirect"])->name('linkedin.redirect');

    Route::get("0auth/facebook/callback", [FacebookController::class, "facebook_callBack"])->name('facebook.callback');
    Route::get("0auth/facebook/redirect", [FacebookController::class, "facebook_redirect"])->name('facebook.redirect');

    Route::get("0auth/tiktok/callback", [ADMAuthSocials::class, "tiktok_callBack"])->name('tiktok.callback');
    Route::get("0auth/tiktok/redirect", [ADMAuthSocials::class, "tiktok_redirect"])->name('tiktok.redirect');
});


// ==============================================================================================================
// ====================================|BEGIN ROUTES FOR GUESTS|============================================
// ==============================================================================================================



Route::middleware([
    config('jetstream.auth_session'),

])->group(function () {
    Route::get("/", [ADMGuestController::class, "home"])->name('guest.home');
    Route::get("/find-creators", [ADMGeneralController::class, "find_creators"])->name('guest.find_creators');
});
// ==============================================================================================================
// ====================================|END ROUTES FOR GUESTS|============================================
// ==============================================================================================================





// social routes 
Route::get("youtube/channels/view", [Youtube::class, "index"])->name('youtube.index');



// Mail testing view routes
Route::get('mail/dialogue_complete', function () {
    // return view('layouts.ADM_mail_layouts');
    return view('mail.dialogue_complete', [
        'user' => auth()->user()
    ]);
});

Route::get('mail/new_signup', function () {
    // return view('layouts.ADM_mail_layouts');
    return view('mail.new_user', [
        'user' => auth()->user()
    ]);
});
Route::get('mail/newsletter', function () {
    // return view('layouts.ADM_mail_layouts');
    return view('mail.newsletter_sub', [
        'email' => auth()->user()->email
    ]);
});
Route::get('mail/new_job_creators', function () {
    // return view('layouts.ADM_mail_layouts');
    return view('mail.new_job_creators', [
        'user' => auth()->user(),
        'listing' => Listing::find(rand(4, 22))
    ]);
});
Route::get('mail/new_job_brand', function () {
    // return view('layouts.ADM_mail_layouts');
    return view('mail.new_job_brand', [
        'user' => auth()->user(),
        'listing' => Listing::find(rand(4, 22))
    ]);
});
Route::get('mail/listing_onboarded_applicant', function () {
    // return view('layouts.ADM_mail_layouts');
    $brand_onboarding = User::find(rand(4, 22));
    $brand = $brand_onboarding->brandInfos;
    // Mail::to(auth()->user()->email)->send(new ListingOnboarded_ApplicantMail(auth()->user(), Listing::find(rand(4, 22)), $brand));

    return view('mail.listing_onboarded_applicant', [
        'user' => auth()->user(),
        'listing' => Listing::find(rand(4, 22)),
        'brand' => $brand
    ]);
});
Route::get('mail/listing_completed_brand', function () {
    // return view('layouts.ADM_mail_layouts');
    $brand_user = User::find(1);
    $brand = $brand_user->brandInfos;
    $listing = Listing::find(rand(4, 22));
    // Mail::to(auth()->user()->email)->send(new ListingOnboarded_ApplicantMail(auth()->user(), Listing::find(rand(4, 22)), $brand));
    //  $mail_body = view('mail.listing-completed',[
    //              'user'=> $brand_user,
    //              'brand' => $brand,
    //              'listing' => $listing
    //          ])->render();

    //          $mailConfig = [
    //           'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
    //           'mail_from_name' => env('EMAIL_FROM_NAME'),
    //           'mail_recipient_email' => $brand_user->email,
    //           'mail_recipient_name' => $brand_user->name,
    //           'mail_subject' => "'Hurray! Your Listing has been Marked as completed'",
    //           'mail_body' => $mail_body
    //          ];
    //          sendMail($mailConfig);

    return view('mail.listing-completed', [
        'user' => $brand_user,
        'listing' => $listing,
        'brand' => $brand
    ]);
});
Route::get('mail/listing_completed_creator', function () {
    // return view('layouts.ADM_mail_layouts');
    $brand_onboarding = User::find(rand(4, 22));
    $brand = $brand_onboarding->brandInfos;
    // Mail::to(auth()->user()->email)->send(new ListingOnboarded_ApplicantMail(auth()->user(), Listing::find(rand(4, 22)), $brand));

    return view('mail.listing-completed_creator', [
        'user' => auth()->user(),
        'listing' => Listing::find(rand(4, 22)),
        'brand' => $brand
    ]);
});
Route::get('mail/send_test/{email}', function () {
    // return view('layouts.ADM_mail_layouts');
    $brand_onboarding = User::find(rand(4, 22));
    $brand = $brand_onboarding->brandInfos;
    Mail::to(request()->email)->send(new ListingOnboarded_ApplicantMail(auth()->user(), Listing::find(rand(4, 22)), $brand));
    // $when = now()->addSeconds(10);
    // Mail::to(request()->email)
    //     ->later($when, new ListingOnboarded_ApplicantMail(auth()->user(), Listing::find(rand(4, 22)), $brand));
    return view('mail.listing-completed_creator', [
        'user' => auth()->user(),
        'listing' => Listing::find(rand(4, 22)),
        'brand' => $brand
    ]);
});
Route::get('adcre8/setup', function () {
    // Run the storage link command
    $storage = Artisan::call('storage:link');
    $job = Artisan::call('queue:work');
    $socialQueWork =  // Run the queue worker for the specified queue
        Artisan::call('queue:work', [
            '--queue' => 'facebook-metrics',
        ]);

    dd('Setup completed! Storage link created, and the job is started.', $storage, $job, $socialQueWork);
});
