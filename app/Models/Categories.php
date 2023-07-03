<?php

namespace App\Models;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_slug',
        'ordering'
    ];

    protected $guard = [

    ];

    public function  listings(){
        return $this->belongsToMany(Listing::class);
    }
}
