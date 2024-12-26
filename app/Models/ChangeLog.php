<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChangeLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'change_description',
        'version',
        'type',
        'publish_date',
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'change_description' => 'array',
    ];

    public function creator(){
        return $this->hasOne(User::class, 'id');
    }
    
}
