<?php

namespace App\Models\Socials;

use App\Models\User;
use App\Models\Socials\SocialPage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialAccount extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id',
           'platform',
           'account_id',
           'profile',
           'name',
           'access_token',
           'token_expires_at',
    ];

    // Relationship: Each social account belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: A social account can have many social pages
    public function socialPages()
    {
        return $this->hasMany(SocialPage::class);
    }
}
