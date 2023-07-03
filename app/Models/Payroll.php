<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillables =[
       'user_id',
       'listing_id',
       'amount',
       'payment_status'
    ];

    public function user(){
        return  $this->belongsTo(User::class);
    }
    public function listing(){
        return   $this->hasOne(Listing::class,'id','listing_id');
    }
    public function scopeSearch($query, $term){
        $term = "%$term%";
        $query->where(function ($query) use($term){
            $query->whereHas('user', function ($query) use($term){
                $query->where('name', 'like', $term);
            })->orWhereHas('listing', function ($query) use($term){
                    $query->where('title', 'like', $term);
                })->get();
        });
        // ->orWhereHas('listing', function ($query) use($term){
        //     $query->where('title', 'like', $term);
        // })
    }
}
