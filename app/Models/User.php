<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail 
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'profile_photo_path',
        'dialogue_complete',
        'role',
        'rating',
         // Google socials
        'social_google_id',
        'social_google_token',
        'social_google_profile',
         // Facebook socials
        'social_facebook_id',
        'social_facebook_token',
        'social_facebook_profile',
         // twitter socials
        'social_twitter_id',
        'social_twitter_token',
        'social_twitter_profile',
         // linkedin socials
        'social_linkedin_id',
        'social_linkedin_token',
        'social_linkedin_profile',
         // INstagram socials
        'social_instagram_id',
        'social_instagram_token',
        'social_instagram_profile',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'dialogue_complete',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getAvatar()
    {
        return $this->profile_photo_path; // Update to use the "profile_photo_path" attribute
    }

    public function advertiserInfos(): HasOne
    {
       return $this->hasOne(AdvertiserInfo::class, "user_id", "id");
    }
    public function brandInfos(): HasOne
    {
       return $this->hasOne(BrandInfo::class, "user_id", "id");
    }
    
    public function listings(): HasMany
    {
       return $this->hasMany(Listing::class);
    }
    public function ratings(): HasMany
    {
       return $this->hasMany(Rating::class, 'applicant_id', 'id');
    }
    public function payment_methods(): HasMany
    {
       return $this->hasMany(PaymentMethods::class);
    }
    public function transactions(): HasMany
    {
       return $this->hasMany(Transactions::class);
    }
    public function applicants()
    {
        return $this->hasManyThrough(Listing::class, Clicks::class);
    }


    public function scopeSearch($query, $term){
        $term = "%$term%";
        $query->where(function($query) use($term){
            $query->where('name','like', $term)->where('id', "!=", auth()->user()->id);
        });
    }
}
