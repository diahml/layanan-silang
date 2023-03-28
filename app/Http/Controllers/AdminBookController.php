<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.book.index',[
            'title' => 'Data Book',
            "active"=>"admin/buku",
            "books"=>Book::latest()->paginate(20),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create',[
            'title' => 'Add Book',
            "active"=>'admin/buku',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:10024',
            'author' => 'required',
            'booknum' => 'required|unique:books',
            'backnum' => 'required|unique:books',
            'bookyear' => 'required'
         ]);

         if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Book::create($validatedData);
        return redirect('/admin/buku')->with('success', 'You Create A New Book!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_book)
    {
        $book = Book::select('*')->where('id', $id_book)->get();
        return view(
            'admin.katalogue.show',
            [
                'title' => 'show',
                'active' => 'data-book',
                'book' => $book
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $buku)
    {
        return view('admin.book.edit',[
            'title' => 'Edit',
            "active"=>"admin/buku",
            "categories"=>Category::all(),
            "book"=>$buku,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $buku)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:10024',
            'author' => 'required',
            'bookyear' => 'required',
            'booknum' => 'required|max:255',
            'backnum' => 'required|max:255',
         ];

         

         $validatedData=$request->validate($rules);

         if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('cover-buku');
        }

        Book::where('id', $buku->id)
            ->update($validatedData);

        return redirect('/admin/buku')->with('success', 'One Book Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $buku)
    {

        $borrow = Borrow::select('*')->where([['book_id', $buku->id], ['status', 'borrowed'] ])->get();

        if ($borrow->count()) {
            return redirect('/admin/buku')->with('unsuccess', 'You Cannot Delete This One Because Someone Still Borrow This Book');
        } else{
            Book::destroy($buku->id);
            return redirect('/admin/buku')->with('success', 'You Delete One Katalogue');
        }

        return redirect('/admin/buku');
    }
}