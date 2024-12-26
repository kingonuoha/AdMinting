<?php

namespace App\Models\Socials;

use App\Models\Socials\SocialPage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Metric extends Model
{
    use HasFactory;

    protected $fillable = [
        'social_page_id', 'name', 'value', 'timestamp', // Add other fields as necessary
    ];

    // Relationship: A metric belongs to a social page
    public function socialPage()
    {
        return $this->belongsTo(SocialPage::class);
    }

}
