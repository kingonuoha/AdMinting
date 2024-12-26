<?php

namespace App\Models;

use App\Models\CreatorListing;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Socials\SocialAccount;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        "email_verified_at",
        'username',
        'otp',
        'email',
        'password',
        'profile_photo_path',
        'dialogue_complete',
        'dialogue_last_complete',
        'bank_details',
        'rating',
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
        'bank_details' => "array",
    ];


    public  $social = [
        'facebook',
        'instagram',
        'twitter',
        'facebook',
        'linkedin',
        'youtube',
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

    public function getProfilePhotoUrlAttribute()
    {
        // Check if the profile photo path is a valid external URL
        if (filter_var($this->profile_photo_path, FILTER_VALIDATE_URL)) {
            return $this->profile_photo_path; // Return the external URL
        }

        // If not an external URL, generate the local storage URL
        return $this->profile_photo_path
            ? asset('storage/' . $this->profile_photo_path) // Local storage path
            : $this->defaultProfilePhotoUrl(); // Fallback to default photo
    }

    protected function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }


    public static function findByUsername($username)
    {
        // Remove the '@' if present
        $cleanUsername = ltrim($username, '@');

        // Fetch the user
        return self::where('username', $cleanUsername)->firstOr(function () {
            throw new ModelNotFoundException('User with username {$username} not found.');
        });
    }

    public function advertiserInfos(): HasOne
    {
        return $this->hasOne(AdvertiserInfo::class, "user_id", "id");
    }
    public function brandInfos(): HasOne
    {
        return $this->hasOne(BrandInfo::class, "user_id", "id");
    }

    public function deals(): HasMany
    {
        return $this->hasMany(Deals::class, "user_id", "id");
    }

    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }
    public function creator_listings(): HasMany
    {
        return $this->hasMany(CreatorListing::class, "creator_id", "id");
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
    public function channels()
    {
        return $this->hasMany(UserYoutube::class);
    }
    public function applied_listings()
    {
        return $this->hasMany(Listing::class, 'onboarded_by');
    }

    public function logs()
    {
        return $this->hasMany(UserLogs::class);
    }

    // Relationship: A user can have multiple social accounts
    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }


    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term)->where('id', "!=", auth()->user()->id);
        });
    }
}
