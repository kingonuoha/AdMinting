<?php

namespace App\Models;

use App\Models\Deals;
use App\Models\Categories;
use App\Models\Socials\SocialPage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CreatorListing extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'creator_id',
        'social_page_id',
        'title',
        'description',
        'media',
        'status',
    ];

        /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'media' => 'object',
    ];

    public function deals()
    {
        return $this->hasMany(Deals::class, 'listing_id');
    }

    public function socialPage()
    {
        return $this->belongsTo(SocialPage::class, 'social_page_id');
    }

    public function categories()
    {
        return $this->morphToMany(Categories::class, 'listing', 'categories_listing');
    }
     // Define the relationship to count purchases
     public function dealPurchases()
     {
         return $this->hasManyThrough(
             DealPurchase::class, // The target model
             Deals::class,         // The intermediate model
             'listing_id',        // Foreign key on the deals table (connecting deals to listings)
             'deal_id',           // Foreign key on the deal_purchases table (connecting purchases to deals)
             'id',                // Local key on the listings table
             'id'                 // Local key on the deals table
         );
     }
}
