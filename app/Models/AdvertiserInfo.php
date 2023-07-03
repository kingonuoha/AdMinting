<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertiserInfo extends Model
{
    
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'bio',
        'dob',
        'state',
        'work_experience',
        'category',
        'education',
        'phone_number',
        'portfolio_url',
        'religion',
        'min_price',
        'max_price',
    ];

      /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'education' => 'array',
        'phone_number' => 'array',
    ];

    static $religion = [
        'Islam',
        'Hindu',
        'Buddhist',
        'Christian',
        'Other'
    ];

     public function user(){
        return $this->belongsTo(User::class);
    }
}
