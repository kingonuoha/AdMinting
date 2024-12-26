<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'short_desc',
        'description',
        'brand_name',
        'banner_path',
        'position',
        'logo_path',
        'phone_number',
        'category',
        'brand_email',
        'location',
    ];
    
      /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'brand_email' => 'array',
        'phone_number' => 'array',
        'category' => 'array',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
