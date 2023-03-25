<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function review()
    {
        return view('admin.katalogue.review', [
            'title' => 'Books Review',
            'active' => 'data-book',
            'books' => Book::all(),
            'reviews' => Review::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_book)
    {
        $book = Book::select('*')->where('id', $id_book)->get();
        return view(
            'member.review.create',
            [
                'title' => 'Create',
                'active' => 'create-review',
                'book' => $book,
                'reviews' => Review::first()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'body' => 'required',
            'book_id' => 'required'
        ]);


        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50);

        Review::create($validatedData);

        $id_book =  $validatedData['book_id'];

        Borrow::where('member_id', auth()->user()->id)
            ->where('book_id', $id_book)
            ->update(['reviews' => 1]);

        return redirect('/member/historyborrow')->with('success', 'Thanks for your review!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.review.index', [
            'title' => 'History Reviews',
            'active' => 'history-review',
            'reviews' => Review::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit($id_review)
    {
        $review = Review::select('*')->where('id', $id_review)->get();

        return view(
            'member.review.edit',
            [
                'title' => 'Edit Review',
                'active' => 'history-review',
                'review' => $review
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_review)
    {
        $validatedData = $request->validate([
            'body' => 'required',
            'book_id' => 'required'
        ]);


        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

        Review::where('id', $id_review)
        ->update($validatedData);

        return redirect('/member/review')->with('success', 'Your Review Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function hapusreview($id_review)
    {
        $review = Review::select('*')->where('id', $id_review)->get();
        foreach ($review as $review)
        Borrow::where('member_id', $review->user_id)
            ->where('book_id', $review->book_id)
            ->update(['reviews' => 0]);

        Review::where('id', $id_review)->delete();
        return redirect('/admin/katalogue/review')->with('success', 'You Delete One Review!');
    }

    public function hapusmyre($id_review)
    {
        $review = Review::select('*')->where('id', $id_review)->get();

        foreach ($review as $review)
            Borrow::where('member_id', auth()->user()->id)
                ->where('book_id', $review->book_id)
                ->update(['reviews' => 0]);

        Review::where('id', $id_review)->delete();
        return redirect('/member/review')->with('success', 'You Delete Your Review!');
    }
}
