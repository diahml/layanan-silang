<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable=['title', 'slug','excerpt','body'];//properti yg boleh diisi pake mass asignment
    protected $guarded=['id'];//yg ga akan keisi pas mass asignment

    protected $with = ['post_category'];

    public function post_category(){
        return $this->belongsTo(Post_category::class);//satu post miliknya satu kategori
    }

    public function getRouteKeyName()
    {
    return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    


 }
