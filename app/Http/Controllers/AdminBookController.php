<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_category;
use App\Models\User;
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
            "active"=>'admin/buku',
            "book_categories"=>Book_category::all(),
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
            'judul'=>'required|max:255',
            'book_category_id'=> 'required',
            'pengarang'=>'required',
            'cover'=>'image',
            'npb'=>'required|unique:books',
            'no_buku'=>'required',
            'stok'=>'required',
            'tahun_terbit'=>'required'
         ]);

         if($request->file('cover')){
            $validatedData['cover']=$request->file('cover')->store('cover-buku');
        }

         Book::create($validatedData);
 
         return redirect('/admin/buku/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            "active"=>"admin/buku",
            "book_categories"=>Book_category::all(),
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
            'judul'=>'required',
            'pengarang'=>'required',
            'book_category_id'=>'required',
            'tahun_terbit'=>'required',
            'no_buku'=>'required',
            'stok'=>'required',
         ];

         if($request->npb != $buku->npb){
            $rules['npb']='required|unique:books';
         }

         $validatedData=$request->validate($rules);

         if($request->file('cover')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['cover']=$request->file('cover')->store('cover-buku');
        }

        Book::where('id', $buku->id)
            ->update($validatedData);

        return redirect('/admin/buku/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $buku)
    {
        Book::destroy($buku->id);

        return redirect('/admin/buku');
    }
}
