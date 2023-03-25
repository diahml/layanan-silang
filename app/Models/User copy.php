<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    
    
    protected $guarded = ['id', 'is_admin'];


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
