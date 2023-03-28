<?php

namespace App\Http\Controllers;

use App\Models\Suggest;
use App\Models\Category;
use Illuminate\Http\Request;

class SuggestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.suggest.index', [
            'title' => 'Preorder Book',
            'active' => 'data-book',
            'suggests' => Suggest::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.suggest.index', [
            'title' => 'Preoder Books',
            'active' => 'suggest',
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
            'author' => 'required',
            
        ]);

        Suggest::create($validatedData);
        return redirect('/member/frontpage')->with('success', 'Thanks for suggest book for us!');
    }

    public function approve($id_suggest)
    {
        Suggest::where('id', $id_suggest)->delete();
        return redirect('/admin/buku/create')->with('success', 'Please input this book to the catalogue');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suggest  $suggest
     * @return \Illuminate\Http\Response
     */
    public function show(Suggest $suggest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suggest  $suggest
     * @return \Illuminate\Http\Response
     */
    public function edit(Suggest $suggest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suggest  $suggest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suggest $suggest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suggest  $suggest
     * @return \Illuminate\Http\Response
     */
    public function delete($id_suggest)
    {
        Suggest::where('id', $id_suggest)->delete();
        return redirect('/admin/suggest')->with('success', 'You Delete One Book Suggestion');
    }
}
