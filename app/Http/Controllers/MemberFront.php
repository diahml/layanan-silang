<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;

class MemberFront extends Controller
{
    public function index()
    {
        return view('member.frontpage.index', [
            'title' => 'FrontPage',
            'active' => 'frontpage',
            'books' => Book::all(),
            'book' =>  Book::first(),
            'borrows' => Borrow::select('book_id')->selectRaw('count(book_id) as sum')->orderBy('sum', 'desc')->groupBy('book_id')->take(1)->get()
            // Borrow::orderBy('book_id', 'desc')->take(1)->get()
        ]);
    }

    public function show($id_member)
    {
        $member = User::select('*')->where('id', $id_member)->get();
        return view(
            'member.frontpage.show',
            [
                'title' => 'show',
                'active' => 'data-member',
                'user' => $member
            ]
        );
    }
}
