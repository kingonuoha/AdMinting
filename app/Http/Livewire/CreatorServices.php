<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Deals;
use Livewire\Component;
use Livewire\WithPagination;

class CreatorServices extends Component
{

    use WithPagination;


    public $user;
    public $perPage = 5; // Default number of items per page
    public $filters = [
        'status' => null,
    ];

    protected $queryString = ['perPage', 'filters']; // Maintain state via query string


    public function mount($user){
        $this->user = $user;
    }
    public function updatedFilters()
    {
        $this->resetPage(); // Reset pagination when filters change
    }

    public function render()
    {
        $listings = $this->user->creator_listings()
        ->when($this->filters['status'], function ($query, $status) {
                if ($status !== 'all') {
                    $query->where('status', $status);
                }
            })
             ->withCount('dealPurchases') // Automatically handles zero counts for no deals or purchases
            ->orderBy('updated_at', 'desc') // Default sorting
            ->paginate($this->perPage);
            // dd($listings);

        return view('livewire.creator-services', compact('listings'));
    }
}
