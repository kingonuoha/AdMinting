<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'icon',
        'type',
        'user_id',
    ];
}
