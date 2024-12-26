<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use Livewire\Component;
use App\Models\Categories;
use Illuminate\Support\Facades\Request;
use Livewire\WithPagination;

class ListingIndex extends Component
{
    use WithPagination;
    public $search;
    public $category, $filter_category;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $listing_count = count(Listing::where('is_active', true)
        ->search(trim($this->search))
        ->get());
        $listings = Listing::where(['is_active'=> true, "payment_status" => "paid", 'onboarded_by' =>  null])
        // ->with('categories')
        ->latest()
        ->search(trim($this->search))
            // ->when($this->filter_category, function($query){
            //     $query->where('category_slug', $this->filter_category);
            // })
        ->paginate(10);
        // return ($listings);
        // if (!is_null($this->filter_category)) {
        //     $category = $this->filter_category;
        //     $listings =  $listings->filter(function($listing) use($category){
        //             return $listing->categories->contains('category_slug', $category);
        //     })->paginate(10);
        // }
        $categories = Categories::orderBy('category_name')->get();
        return view('livewire.listing-index',  [
            "listings" => $listings
        ], compact('categories', 'listing_count'));
    }
}
