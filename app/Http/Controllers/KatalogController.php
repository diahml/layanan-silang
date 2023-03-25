<?php

namespace App\Http\Controllers;

use App\Models\Book_category;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(){

        return view ('book',[
            "active"=>"katalog",
            "books"=> Book::latest()->filter(request(['search','kategori']))->paginate(6),
            "categories" => Category::all(),
            "title"=>"Katalog"
        ]);
    }

    public function show(Book_category $book_category){
        return view('book',[
            "active"=>"katalog",
            "title"=>"katalog",
            "books"=>Book::select('*')->where([
                ['book_category_id', $book_category->id],
            ])->paginate(6),
            // 'books'=>$book_category->books->load('book_category')->paginate(6),
        ]);

    }

    // public function show(Post $post){
    //     return view('post',[
    //         "title"=>"Single Post",
    //         "active"=>"kegiatan",
    //         "post"=> $post
    //     ]);
    // }
}
