<?php

use App\Http\Controllers\ADM_creators\CreatorsController;
use App\Http\Livewire\ListingShow;
use App\Http\Livewire\MyListing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    'role:creator',
    'adm.app_track_views'
])->group(function(){

 Route::get('creators/onboarding', function () {
    // dd(auth()->user()->dialogue_complete);
    if(!auth()->user()->dialogue_complete){
        // dd("hi");
        return view('ADM_creators.dialogue');
    }else{
        return redirect()->route('dashboard');
    }
})->name('creators.dialogue');


    // Route::get('/listing/{listing}/show', ListingShow::class)->name('listings.show');
    Route::get('/listings/index', [CreatorsController::class, 'listing_index'])->name('listing.index');
    Route::get('/listing/{listing}/apply', [CreatorsController::class, 'listing_apply'])->name('listings.apply');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
//     // 'creators.dialogue_complete'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('creator.dashboard');
// });

