<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Listing;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class SideBar extends Component
{

    public $user, $listing_id, $listing, $links;

    public function mount()
    {

        // dd(request()->route()->parameters['listing']);
        if (isset(request()->route()->parameters['listing'])) {
            $this->listing_id = request()->route()->parameters['listing'];
            $this->listing = Listing::where('slug', $this->listing_id)->first();
        }
        //    dd($this->listing_id);
    }

    public function links($special_user_id = null)
    {
        //for selected listing at the onboarded section
        if (isset(request()->route()->parameters['listing']) && !is_null(request()->route()->parameters['listing'])) {
            $this->listing_id = request()->route()->parameters['listing'];
            // saving the id in the session for easy access 
            Session::put('listing_slug', $this->listing_id, now()->addMinutes(10));
            $this->listing = Listing::where('slug', $this->listing_id)->first();
        } else if (Session::has('listing_slug')) {
            $this->listing_id = Session::get('listing_slug');
            $this->listing = Listing::where('slug', $this->listing_id)->first();
        }
        //checking if there was a user id passed 
        if (is_null($special_user_id)) {
            $this->user = User::find(auth()->user()->id);
        } else {
            $this->user = User::find($special_user_id);
        }
        // Begin Admin Routes
        $genera_links = [
            [
                "category" => ['__SelectedUserProfile' => [
                    ['icon'=>'rocket', 'title' => 'Overiew', 'url' => route('user.public_profile', "@".$this->user->username)],
                    ['icon'=>'rocket', 'title' => 'Profile Information', 'url' => route('profile.personal-info')],
                    ['icon'=>'rocket', 'title' => 'Brand Information', 'url' => route('account.brand_settings')],
                    ['icon'=>'rocket', 'title' => 'Security', 'url' => route('profile.security')],
                    ['icon'=>'rocket', 'title' => 'Notifications', 'url' => route('profile.notifications')],
                ]],
                "icon" => "users"
            ],
            // '__SelectedUserProfile' => [
            //     ['icon'=>'rocket', 'title' => 'Overiew', 'url' => route('user.public_profile', "@".$this->user->id)],
            //     ['icon'=>'rocket', 'title' => 'Profile Information', 'url' => route('profile.personal-info')],
            //     ['icon'=>'rocket', 'title' => 'Brand Information', 'url' => route('account.brand_settings')],
            //     ['icon'=>'rocket', 'title' => 'Security', 'url' => route('profile.security')],
            //     ['icon'=>'rocket', 'title' => 'Notifications', 'url' => route('profile.notifications')],

            // ],
            // [
            //     "category" => ['__ListingManagement' => [

            //         ]
            //     ],
            //     "icon" => "users"
            // ],
        ];
        // if user has  a social account enabled 
        if ($this->user->channels->count() > 0) {
            $genera_links  = array_merge($genera_links, ["Socials" => []]);

            if ($this->user->channels->count() > 0) {
                array_push($genera_links,  [
                    "category" => [
                        'Socials' => [
                            ['icon'=>'rocket', "title" => "Youtube", "url" => route("youtube.index")]
                        ]
                    ],
                    "icon" => "users"
                ]);
            }
        }
        if (!is_null($this->listing_id)) {
            $link_array = [
                ['icon'=>'4-blocks', 'title' => 'Listing Overiew', 'url' => route('listing.dashboard', $this->listing_id)],
                ['icon'=>'folder', 'title' => 'Files', 'url' => route('listing.files', $this->listing_id)],
            ];
            // if listing is completed
            if (isset($this->listing) && !is_null($this->listing->completed_on)) {

                array_push($link_array,  ['icon'=>'trophy', 'title' => 'Rating', 'url' => route('listing.ratings', $this->listing_id)]);
            }
            // if a dispute has been raised on a listing
            if (isset($this->listing->disputes) ) {
                array_push($link_array,  ['icon'=>'users', 'title' => 'Disputes', 'url' => route('listing.disputes', $this->listing_id)]);
            }

            array_push($genera_links,   [
                "category" => [
                    '__ListingManagement' => $link_array
                ],
                "icon" => "users"
            ]);
        }


        if ($this->user->getRoleNames()->first() == 'admin') {

            $links =  [
                [
                    "category" => ['Users' => [
                        ['icon'=>'users', 'title' => 'Total Users', 'url' => route('super_admin.users_list')],
                    ]],
                    "icon" => "users"
                ],
                [
                    "category" => ['Finance' => [
                        ['icon'=>'wallet', 'title' => 'Payroll', 'url' => route('super_admin.payroll')],
                    ]],
                    "icon" => "bank"
                ],
                [
                    "category" => ['Account' => [
                        ['icon'=>'lock-shield', 'title' => 'Account Overiew', 'url' => route('profile.profile-show')],
                        ['icon'=>'shield-thunder', 'title' => 'Security', 'url' => route('profile.security')],
                        ['icon'=>'notification', 'title' => 'Notifications', 'url' => route('profile.notifications')],
                    ]],
                    "icon" => "lock-shield"
                ],
                [
                    "category" => ['Settings' => [
                        ['icon'=>'settings-3', 'title' => 'Site Settings', 'url' => route('super_admin.general_setting')],
                        ['icon'=>'flower', 'title' => 'Change Log Settings', 'url' => route('super_admin.changelog_setting')],
                    ]],
                    "icon" => "spanner"
                ],
                [
                    "category" => ['Extras' => [
                        ['icon'=>'warning', 'title' => 'Listing Disputes', 'url' => route('super_admin.listing_disputes')],
                    ]],
                    "icon" => "spanner"
                ],
            ];
            return array_merge($links, $genera_links);
            // End Admin Routes
            // Begin Creator Routes

        } else if ($this->user->getRoleNames()->first() == 'creator') {
            // pattern
            // return  [
            //     [
            //         "category" => ['Users' => [
            //             ['icon'=>'rocket', 'title' => 'Admins', 'url' => route('users.admin', $this->school_url)],
            //             ['icon'=>'rocket', 'title' => 'Teachers', 'url' => route('users.teacher', $this->school_url)],
            //             ['icon'=>'rocket', 'title' => 'Students', 'url' => route('users.student', $this->school_url)],
            //             ['icon'=>'rocket', 'title' => 'Non-Academia(comming soon)', 'url' => "#"],

            //         ]],
            //         "icon" => "users"
            //     ]
            //         ];
            $links =  [
                [
                    "category" => ['Job Listings' => [
                        ['icon'=>'layers', 'title' => 'All Listings', 'url' => route('listing.index')],
                        ['icon'=>'union', 'title' => 'Onboarded Listings(coming Soon)', 'url' => "#"],
                        ['icon'=>'union', 'title' => 'My Services', 'url' => route("user.services.show", "@".$this->user->username)],
                    ]],
                    "icon" => "briefcase"
                ],
                [
                    "category" => ['Account' => [
                        ['icon'=>'shield-thunder', 'title' => 'Account Overiew', 'url' => route('profile.profile-show')],
                        ['icon'=>'shield-user', 'title' => 'Profile Information', 'url' => route('profile.personal-info')],
                        ['icon'=>'lock-shield', 'title' => 'Security', 'url' => route('profile.security')],
                        ['icon'=>'notification', 'title' => 'Notifications', 'url' => route('profile.notifications')],
                        ['icon'=>'wallet', 'title' => 'Finance', 'url' => route('profile.finance')],
                        ['icon'=>'group-chat', 'title' => 'Socials', 'url' => route('profile.socials')],
                        ['icon'=>'flower', 'title' => 'Public Profile', 'url' => route('user.public_profile', "@".$this->user->username)],
                    ]],
                    "icon" => "lock-shield"
                ],

            ];
            return  array_merge($links, $genera_links);

            // End Creator Routes
            // Begin Brand Routes
        } else if ($this->user->getRoleNames()->first() == 'brand') {

            $links =  [
                [
                    "category" => ['Job Listings' => [
                        ['icon'=>'layers', 'title' => 'New Listing', 'url' => route('listing.create')],
                        ['icon'=>'union', 'title' => 'My Listings', 'url' => route('listing.my_listings')],
                    ]],
                    "icon" => "card"
                ],
                [
                    "category" => ['Account' => [
                        ['icon'=>'shield-thunder', 'title' => 'Account Overiew', 'url' => route('profile.profile-show')],
                        ['icon'=>'shield-user', 'title' => 'Profile Information', 'url' => route('profile.personal-info')],
                        ['icon'=>'lock-shield', 'title' => 'Brand Information', 'url' => route('account.brand_settings')],
                        ['icon'=>'notification', 'title' => 'Security', 'url' => route('profile.security')],
                        ['icon'=>'wallet', 'title' => 'Notifications', 'url' => route('profile.notifications')],
                    ]],
                    "icon" => "lock-shield"
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
        return view('livewire.side-bar', compact('link'));
    }
}
