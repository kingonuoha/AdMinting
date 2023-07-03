<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appVisits extends Model
{
    use HasFactory;

    protected $fillables = [
        'ip_address',
        'device',
        'browser',
        'hits',
        'os',
    ];
}
