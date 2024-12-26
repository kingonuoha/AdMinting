<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingDisputes extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id',
       'listing_id',
       'supporting_files',
       'description',
       'status',
    ];


    protected $casts = [
       'supporting_files' => "array",
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
