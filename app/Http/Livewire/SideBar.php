<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Listing;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class SideBar extends Component
{

    public $user, $listing_id, $listing, $links;

    public function mount(){
       
        // dd(request()->route()->parameters['listing']);
        if (isset(request()->route()->parameters['listing'])) {
           $this->listing_id = request()->route()->parameters['listing'];
           $this->listing = Listing::where('slug', $this->listing_id)->first();
        }
        //    dd($this->listing_id);
    }

    public function links($special_user_id = null){
        //for selected listing at the onboarded section
        if (isset(request()->route()->parameters['listing']) && !is_null(request()->route()->parameters['listing'])) {
            $this->listing_id = request()->route()->parameters['listing'];
            // saving the id in the session for easy access 
            Session::put('listing_slug', $this->listing_id, now()->addMinutes(10));
            $this->listing = Listing::where('slug', $this->listing_id)->first();
         }else if(Session::has('listing_slug')){
            $this->listing_id = Session::get('listing_slug');
            $this->listing = Listing::where('slug', $this->listing_id)->first();
         }
        //checking if there was a user id passed 
        if (is_null($special_user_id)) {
            $this->user = User::find(auth()->user()->id);
        }else{
            $this->user = User::find($special_user_id);
        }
        // Begin Admin Routes
        $genera_links = [
            '__SelectedUserProfile' => [
                ['title'=>'Overiew', 'url' => route('user.profile.show', $this->user->id)],
                ['title'=>'Profile Information', 'url' => route('profile.personal-info')],
                ['title'=>'Brand Information', 'url' => route('profile.profile-show')],
                ['title'=>'Security', 'url' => route('profile.security')],
                ['title'=>'Notifications', 'url' => route('profile.notifications')],
               
            ],
             '__ListingManagement' => []
        ];
        
        if(!is_null($this->listing_id)){
         
            $genera_links['__ListingManagement'] =  array_merge($genera_links['__ListingManagement'],  [
                ['title'=>'Listing Overiew', 'url' => route('listing.dashboard', $this->listing_id)],
                ['title'=>'Files', 'url' => route('listing.files', $this->listing_id)],
                ['title'=>'Settings', 'url' => route('profile.personal-info')],
                // ['title'=>'Brand Information', 'url' => route('profile.profile-show')],
                // ['title'=>'Security', 'url' => route('profile.security')],
                // ['title'=>'Notifications', 'url' => route('profile.notifications')],
               
            ]);
        }
        if(isset($this->listing) && !is_null($this->listing->completed_on)){
         
         array_push($genera_links['__ListingManagement'],  ['title'=>'Rating', 'url' => route('listing.ratings', $this->listing_id)]);
        }

        if (auth()->user()->role == 'adm_admin') {
           
            $links =  [
                'Users' => [
                    ['title'=>'Total Users', 'url' => route('super_admin.users_list')],
    
                ],
                'Finance' => [
                    ['title'=>'Payroll', 'url' => route('super_admin.payroll')],
    
                ],
                'Account' => [
                    ['title'=>'Account Overiew', 'url' => route('profile.profile-show')],
                    ['title'=>'Security', 'url' => route('profile.security')],
                    ['title'=>'Notifications', 'url' => route('profile.notifications')],
                   
                ],
                'Settings' => [
                    ['title'=>'Site Settings', 'url' => route('super_admin.general_setting')],
                    
                ],
            ];
            return array_merge($links, $genera_links);
        // End Admin Routes
        // Begin Creator Routes

        }else if(auth()->user()->role == 'creator'){
            $links =  [
                'Job Listings' => [
                    ['title'=>'All Listings', 'url' => route('listing.index')],
                    
                ],
                'Account' => [
                    ['title'=>'Account Overiew', 'url' => route('profile.profile-show')],
                    ['title'=>'Profile Information', 'url' => route('profile.personal-info')],
                    ['title'=>'Security', 'url' => route('profile.security')],
                    ['title'=>'Notifications', 'url' => route('profile.notifications')],
                   
                ],
               
            ]; 
           return array_merge($links, $genera_links);

        // End Creator Routes
        // Begin Brand Routes
        }else if(auth()->user()->role == 'brand'){
            $links =  [
                'Job Listings' => [
                    ['title'=>'New Listing', 'url' => route('listing.create')],
                    ['title'=>'My Listings', 'url' => route('listing.my_listings')],
                    // ['title'=>'My Listings', 'url' => route('listings.show-application')],
                    
                ],
                'Account' => [
                    ['title'=>'Account Overiew', 'url' => route('profile.profile-show')],
                    ['title'=>'Profile Information', 'url' => route('profile.personal-info')],
                    ['title'=>'Brand Information', 'url' => route('profile.profile-show')],
                    ['title'=>'Security', 'url' => route('profile.security')],
                    ['title'=>'Notifications', 'url' => route('profile.notifications')],
                   
                ],
            ]; 
           return array_merge($links, $genera_links);
        }
        // End Brand Routes

    }
    public function render()
    {
        // $this->mount();
        $link = $this->links  = $this->links();
        return view('livewire.side-bar',compact('link'));
    }
}
