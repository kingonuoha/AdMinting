<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'transaction_id',
        'message',
        'paid_for',
        'status',
        'data',
    ];

        /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];
}
