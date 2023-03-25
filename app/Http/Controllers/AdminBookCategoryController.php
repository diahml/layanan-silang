<?php

namespace App\Http\Controllers;

use App\Models\Book_category;
use Illuminate\Http\Request;

class AdminBookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.book.kategori.index',[
            "active"=>"admin/buku",
            "book_categories"=>Book_category::all(),
        ]);
    }

    /**
     * Show the form for creating a new rpesource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.kategori.create',[
            "active"=>'admin/buku',
            
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
            'kelas'=>'required|max:255',
         ]);
 
 
         Book_category::create($validatedData);
 
         return redirect('/admin/buku/kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book_category  $book_category
     * @return \Illuminate\Http\Response
     */
    public function show(Book_category $book_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book_category  $book_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Book_category $kategori)
    {
        return view('admin.book.kategori.edit',[
            "active"=>"admin/buku",
            "book_category"=>$kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book_category  $book_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book_category $kategori)
    {
        $rules = [
            'kelas'=>'required',
         ];

         $validatedData=$request->validate($rules);

        Book_category::where('id', $kategori->id)
            ->update($validatedData);

        return redirect('/admin/buku/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book_category  $book_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book_category $kategori)
    {
        Book_category::destroy($kategori->id);

        return redirect('/admin/buku/kategori');
    }
}
