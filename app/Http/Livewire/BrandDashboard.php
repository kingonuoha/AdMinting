<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Models\User;
use Livewire\Component;

class BrandDashboard extends Component
{
    public $listing_summary, $brand, $featuredCreators;
    public function mount(){
        $totalListing= Listing::all()->where('user_id', auth()->user()->id);
        // getIcon();
        $this->listing_summary = [
            [
                'title' => "Total Listing Created",
                'icon' =>'briefcase',
                'count'=>  $totalListing->count(),
                'color' => 'info'
            ],
            [
                'title' => "Completed Listing",
                'icon' =>'check-square',
                'count'=> $totalListing->where('completed_on', '!=', null)->count(),
                'color' => 'warning'
            ],
            [
                'title' => "Pending Listings",
                'icon' =>'hour-glass',
                'count'=> $totalListing->where('completed_on', null)->count(),
                'color' => 'primary'
            ],
            [
                'title' => "Total Payments",
                'icon' =>'dollar',
                'count'=> 'N'.formatMoney($totalListing->sum('price'), true),
                'color' => 'success'
            ],
        ];

        $this->brand = auth()->user();
        $this->fetchFeaturedCreators(12);
    }

    public function fetchFeaturedCreators($limit = 5){
       return $this->featuredCreators =  $users =  User::where("rating", "!=", 0)->orderBy('rating', 'desc')->limit($limit)->get();
    }
    public function render()
    {
        return view('livewire.brand-dashboard');
    }
}
