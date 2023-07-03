<?php

namespace App\Models;

use App\Models\User;
use App\Models\Clicks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    protected $guard = [

    ];
    protected $fillable = [
       'user_id',
       'title',
       'slug',
       'location',
       'price',
       'logo',
       'is_highlighted',
       'is_active',
       'onboarded_by',
       'creator_marked_complete_on',
       'onboarded_on',
       'completed_on',
       'content',
       'apply_link',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function clicks(){
        return $this->hasMany(Clicks::class);
    }
    public function files(){
        return $this->hasMany(ListingFiles::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class, 'listing_id', 'id');
    }

    public function applicant(){
        return $this->hasOne(User::class, 'id', 'onboarded_by');
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    

    public function categories(){
        return $this->belongsToMany(Categories::class);
    }

    // searching through Listings
    public function scopeSearch($query, $term){
        $term = "%$term%";
        $query->where(function($query) use($term){
            $query->where('title','like', $term)
            ->orWhere('location','like', $term);
        });
    }
}
