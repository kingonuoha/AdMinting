<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Categories;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;

class ListingCreate extends Component
{
    use WithPagination;
    public $amount = 20;
    public $allow_highlight;
    public $highlighting_price = 19;
    public $title;
    public $location;
    public $description;
    public $highlighted;
    public $payment_ref = '';
    public $states;
    public $listings;
    public $category = [];


    protected $listeners = ['addCount' => 'increaseAmount'];

    public function increaseAmount(){
        $this->amount += $this->highlighting_price;
        // dd($this->amount);
    }
    public function mount(){
        $CnameArr = [];
        $IDsArr = [];
        $Cname = Categories::all('category_name')->toArray();
        $id = Categories::all('id')->toArray();
        foreach($Cname as $keys => $names){
 
         array_push($CnameArr, $names['category_name']);
        }
        foreach($id as $keys => $IDs){
         array_push($IDsArr, $IDs['id']);
        }
        $this->category = array_merge( $this->category, ["category_name" => $CnameArr]);
        $this->category = array_merge( $this->category, ["id" => $IDsArr]);
        $this->states = DB::table('states')->get();
    }
    public function render()
    {
        $this->listings = auth()->user()->listings;
        return view('livewire.listing-create');
    }
}
