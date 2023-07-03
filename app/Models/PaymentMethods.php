<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethods extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id',
       'channel',
       'ip_address',
       'authorization_code',
       'authorization_email',
       'authorization',
    ];
       /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'authorization' => 'object',
    ];
}
