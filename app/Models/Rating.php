<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillables = [
        "brand_id",
        "applicant_id",
        "listing_id",
        "experience_rating",
        "applicant_rating",
        "comments",
    ];
}
