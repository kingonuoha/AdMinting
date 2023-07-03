<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_name',
        'app_email',
        'app_logo',
        'app_phone',
        'app_facebook',
        'app_instagram',
        'app_linkedin',
        "app_youtube",
    ];
          /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'app_phone' => 'array',
    ];

}
