<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    protected $fillable =[
        'email'
    ];
    protected $table = 'news_letters';
    use HasFactory;
}
