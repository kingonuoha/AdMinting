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
    public $category;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $listing_count = count(Listing::where('is_active', true)
        ->search(trim($this->search))
        ->get());
        $listings = Listing::where('is_active', true)
        // ->with('categories')
        ->latest()
        ->search(trim($this->search))
            // ->when($this->category, function($query){
            //     $query->where('category_slug', $this->category);
            // })
        ->paginate(10);
        // return ($listings);
        // if (request()->has('category')) {
        //     $category = request('category');
        //     $listings =  $listings->filter(function($listing) use($category){
        //             return $listing->categories->contains('category_slug', $category)->paginate(10);
        //     });
        // }
        $categories = Categories::orderBy('category_name')->get();
        return view('livewire.listing-index',  [
            "listings" => $listings
        ], compact('categories', 'listing_count'));
    }
}
