<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Book extends Model
{
    use HasFactory, Sluggable;

    protected $guarded=['id'];

    // protected $with = ['book_category'];

    public function scopeFilter($query, array $filters){

        if(isset($filters['search']) ? $filters['search']:false) {
            return $query->where('title','like', '%'.$filters['search']. '%')
                ->orWhere('author','like', '%'.$filters['search']. '%');
        }


    }

    // public function book_category(){
    //     return $this->belongsTo(Book_category::class);//satu post miliknya satu kategori
    // }

    public function peminjaman(){
        return $this->hasOne(Peminjaman::class);
    }

    public function peminjamanApproved(){
        return $this->hasOne(PeminjamanApproved::class);
    }

    public function getRouteKeyName()
    {
    return 'npb';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function borrow(){
        return $this->hasMany(Borrow::class);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }
}
