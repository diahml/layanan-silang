<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.katalogue.index', [
            'title' => 'Data Book',
            'active' => 'data-book',
            'books' => Book::all(),
        ]);
    }
    public function frontcatalogue()
    {
        return view('front.catalogue', [
            'title' => 'Catalogue',
            'active' => 'data-book',
            'books' => Book::all(),
            'categories' => Category::all()
        ]);
    }

    public function pdfcatalogue()
    {
        return view('admin.katalogue.pdfcatalogue', [
            'title' => 'PDF Report',
            'active' => 'data-book',
            'books' => Book::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.katalogue.create', [
            'title' => 'Add Book',
            'active' => 'data-book',
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
            'slug' => 'required|unique:books',
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
        return redirect('/admin/katalogue')->with('success', 'You Create A New Book!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
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
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id_book)
    {
        $book = Book::select('*')->where('id', $id_book)->get();
        return view(
            'admin.katalogue.edit',
            [
                'title' => 'Edit',
                'active' => 'data-book',
                'book' => $book,
                'categories' => Category::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_book)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:10024',
            'author' => 'required',
            'bookyear' => 'required',
            'slug' => 'required|max:255',
            'booknum' => 'required|max:255',
            'backnum' => 'required|max:255',
        ];


        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Book::where('id', $id_book)
            ->update($validatedData);

        return redirect('/admin/katalogue')->with('success', 'One Book Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {

        $borrow = Borrow::select('*')->where([['book_id', $book->id], ['status', 'borrowed'] ])->get();

        if ($borrow->count()) {
            return redirect('/admin/katalogue')->with('unsuccess', 'You Cannot Delete This One Because Someone Still Borrow This Book');
        } else{
            Book::destroy($book->id);
            return redirect('/admin/katalogue')->with('success', 'You Delete One Katalogue');
        }
        
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Book::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
