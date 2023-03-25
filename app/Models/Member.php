<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'is_admin'];

    protected $hidden = [
        'remember_token',
    ];

    public function borrow(){
        return $this->hasMany(Borrow::class);
    }
}
