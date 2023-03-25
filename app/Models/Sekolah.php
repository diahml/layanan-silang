<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);//satu sekolah punya satu user
    }

    protected $guarded=['id'];

    protected $with = ['user'];

    
}
