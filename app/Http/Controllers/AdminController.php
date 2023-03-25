<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        //
        return view ('admin.index',[
            "active"=>"admin",
            "sekolah"=>User::select('*')->where('role', 'sekolah')->count(),
            "book"=>Book::all()->count(),
            "peminjaman"=>Peminjaman::all(),
        ]);
    }
}
