<?php

namespace App\Models;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clicks extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_agent',
        'ip'
    ];
    protected $guard =[];

    public function listing(){
        return $this->belongsTo(Listing::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
