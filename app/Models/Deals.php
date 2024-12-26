<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    use HasFactory;

  
    protected $fillable = [
        'listing_id',
        'name',
        'description',
        'price',
        'is_optional',
        'delivery_duration',
        'questions',
    ];

    public function listing()
    {
        return $this->belongsTo(CreatorListing::class, 'listing_id');
    }

    public function purchases()
    {
        return $this->hasMany(DealPurchase::class, 'deal_id');
    }

     public $features = [
        ['value' => "I'll Share Your Content", 'icon' => "flower"],
        ['value' => "I'll Create Custom Content", 'icon' => "flower"],
        ['value' => "I'll Purchase Your Product (Extra)", 'icon' => "flower"],
        ['value' => "You Ship Me Your Product", 'icon' => "flower"],
        ['value' => "Brand Mention", 'icon' => "flower"],
        ['value' => "You Ship Me Your Product", 'icon' => "flower"],
        ['value' => "Product Placement", 'icon' => "flower"],
        ['value' => "Source 1080HD Video", 'icon' => "flower"],
    ];

       /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'questions' => 'array',
    ];

}
