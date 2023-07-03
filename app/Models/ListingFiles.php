<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingFiles extends Model
{
    protected $fillables = [
        'uploaded_by',
        'listing_id',
        'name',
        'folder',
        'type',
        'size',
    ];
    use HasFactory;

    public function uploader(){
        return $this->belongsTo(User::class, "uploaded_by");
    }
}
