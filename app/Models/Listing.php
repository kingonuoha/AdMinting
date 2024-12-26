<?php

namespace App\Models;

use App\Models\User;
use App\Models\Clicks;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'required_social' => 'array',
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
        'payment_status',
        'onboarded_on',
        'usecase_id',
        'completed_on',
        'content',
        'apply_link',
        'no_of_days',
        'required_social',
        'terms_of_service',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function disputes()
    {
        return $this->hasMany(ListingDisputes::class);
    }

    public function clicks()
    {
        return $this->hasMany(Clicks::class);
    }
    public function useCase()
    {
        return $this->belongsTo(UseCase::class, 'usecase_id');
    }
    public function files()
    {
        return $this->hasMany(ListingFiles::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'listing_id', 'id');
    }

    public function applicant()
    {
        return $this->hasOne(User::class, 'id', 'onboarded_by');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }

    // searching through Listings
    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('title', 'like', $term)
                ->orWhere('location', 'like', $term);
        });
    }


    public static function getPopularListings($limit = 5)
    {
        return self::select('listings.id', 'listings.user_id', 'listings.title', DB::raw('COUNT(clicks.id) as application_count'))
            ->leftJoin('clicks', 'listings.id', '=', 'clicks.listing_id')
            // ->groupBy('listings.user_id')
            ->groupBy('listings.id', 'listings.user_id', 'listings.title')
            ->orderByDesc('application_count')
            ->limit($limit)
            ->get();
    }


    
}
