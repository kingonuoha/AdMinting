<?php

use App\Http\Livewire\MyListing;
use App\Http\Livewire\ListingShow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ListingUserAppliedList;
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
    'brand.route',
    'adm.app_track_views'
])->get('brand/onboarding', function () {
    if(!auth()->user()->dialogue_complete){

        return view('ADM_brand.dialogue');
    }else{
        return redirect()->route('brand.dashboard');
    }
})->name('brand.dialogue');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'brand.route'
])->group(function(){
    Route::get('/listings/my_listing', [CreatorsController::class, 'listing_created'])->name('listing.created');
    Route::get('/listings/my_listings', MyListing::class)->name('listing.my_listings');
    Route::get('/listings/new', [CreatorsController::class, 'listing_create'])->name('listing.create');
    Route::post('/listings/new', [CreatorsController::class, 'listing_store'])->name('listing.store');
    Route::get('/listing/{listing}/applications', ListingUserAppliedList::class)->name('listings.show-application');

});


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
//     // 'creators.dialogue_complete'
//     'brand.dialogue_complete'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('brand.dashboard');
// });