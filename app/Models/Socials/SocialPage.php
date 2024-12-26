<?php

namespace App\Models\Socials;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialPage extends Model
{
    use HasFactory;


    protected $fillable = [
        'social_account_id',
        'platform',
        'page_id',
        'page_name',
        'picture',
        'link',
        'about',
        'access_token',
        'token_expires_at',
        'details_gotten_at',
    ];

    // Relationship: A social page belongs to a social account
    public function socialAccount()
    {
        return $this->belongsTo(SocialAccount::class);
    }

    // Relationship: A social page has many metrics
    public function metrics()
    {
        return $this->hasMany(Metric::class);
    }

    // Relationship: A social page has many snapshots
    public function snapshots()
    {
        return $this->hasMany(Snapshot::class);
    }

    public function scopeSearch($query, $term)
{
    return $query->whereRaw('LOWER(page_name) LIKE ?', ['%' . strtolower($term) . '%']);
}


    protected $casts = [
        'picture' => 'object',
        ];
}
