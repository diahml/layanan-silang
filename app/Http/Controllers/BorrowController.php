<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.borrow.index', [
            'title' => 'List of Borrows Book',
            'active' => 'list-borrow',
            'borrows' => Borrow::select('*')->where('status', 'borrowed')->get(),
            'returns' =>  Borrow::select('*')->where('status', 'has return')->get()
        ]);
    }

    public function history()
    {
        return view('member.historyborrow.index', [
            'title' => 'Your List',
            'active' => 'history-page',
            'borrows' => Borrow::select('*')->where('member_id', auth()->user()->id)->get(),
        ]);
    }
    public function pdfborrow()
    {
        return view('admin.borrow.pdfborrow', [
            'title' => 'PDF Report',
            'active' => 'list-borrow',
            'borrows' => Borrow::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.borrow.create', [
            'title' => 'Add New borrower',
            'active' => 'list-borrow',
            'books' => Book::select('*')->where('stock', 1)->get(),
            'members' => User::all()
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
            'member_id' => 'required',
            'book_id' => 'required',
            'borrowAt' => 'required',
            'returnAt' => 'required',
        ]);

        $rules2 = [
            'member_id' => 'required',
            'borrowAt' => 'required',
            'returnAt' => 'required',
        ];
        $validatedData2 = $request->validate($rules2);
        $validatedData2['book_id'] = $request->input('book_id_2');


        $rules3 = [
            'member_id' => 'required',
            'borrowAt' => 'required',
            'returnAt' => 'required',
        ];
        $validatedData3 = $request->validate($rules3);
        $validatedData3['book_id'] = $request->input('book_id_3');

        Borrow::create($validatedData);

        if ($request->input('book_id_2')) {
            Borrow::create($validatedData2);
            Book::where('id', $request->input('book_id_2'))
                ->update(['stock' => 0]);

                if ($request->input('book_id_3')) {
                    Borrow::create($validatedData3);
                    Book::where('id', $request->input('book_id_3'))
                        ->update(['stock' => 0]);
                        
                }
        }

        Book::where('id', $request->input('book_id'))
            ->update(['stock' => 0]);
        return redirect('/admin/borrow')->with('success', 'Someone borrow book!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit($id_borrow)
    {
        $borrow = Borrow::select('*')->where('id', $id_borrow)->get();
        $borrow = Borrow::select('*')->where('id', $id_borrow)->get();
        return view(
            'admin.borrow.edit',
            [
                'title' => 'Edit',
                'active' => 'list-borrow',
                'borrow' => $borrow,
                'members' => User::all(),
                'books' => Book::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_borrow)
    {
        $rules = [
            'member_id' => 'required',
            'book_id' => 'required',
            'borrowAt' => 'required',
            'returnAt' => 'required',
        ];

        $validatedData = $request->validate($rules);


       Borrow::where('id', $id_borrow)
        ->update($validatedData);

        return redirect('/admin/borrow')->with('successUpdated', 'One Borrower Has Been Updated');

    }

    public function status($id_borrow)
    {
        $idbook = Borrow::select('*')->where('id', $id_borrow)->get();
        Borrow::where('id', $id_borrow)
            ->update(['status' => 'has return']);
        foreach ($idbook as $idbook)
            Book::where('id', $idbook->book_id)
                ->update(['stock' => 1]);
        return redirect('/admin/borrow');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function hapus($id_borrow)
    {
        $idbook = Borrow::select('*')->where('id', $id_borrow)->get();
        foreach ($idbook as $idbook)
            Book::where('id', $idbook->book_id)
                ->update(['stock' => 1]);
        Borrow::where('id', $id_borrow)->delete();
        return redirect('/admin/borrow')->with('success', 'You Delete One Member');
    }
}
