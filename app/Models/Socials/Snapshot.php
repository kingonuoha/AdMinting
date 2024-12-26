<?php

namespace App\Models\Socials;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snapshot extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'social_page_id',
        'data',
        'name',
        'created_at', // Add other fields as necessary
    ];

    // Relationship: A snapshot belongs to a social page
    public function socialPage()
    {
        return $this->belongsTo(SocialPage::class);
    }
    protected $casts = [
        'data' => 'object',
        ];
}
