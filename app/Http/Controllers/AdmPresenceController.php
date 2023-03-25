<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Post;
use App\Models\User;
use App\Models\Suggest;
use App\Models\Category;
use App\Models\Presence;
use Illuminate\Http\Request;

class AdmPresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.visitor.index', [
            'title' => 'Data Visitor',
            'active' => 'data-visitor',
            'presence' =>  Presence::orderByDesc('created_at')->get()
        ]);
    }

    public function pdfvisitor()
    {
        return view('admin.visitor.pdfvisitor', [
            'title' => 'PDF Report',
            'active' => 'data-visitor',
            'presence' =>  Presence::all(),
        ]);
    }

    public function dashboard()
    {
        $presence = Presence::count();
        $suggest = Suggest::count();
        $category = Category::count();
        $member = User::where('is_member', 1)->count();
        $today = Presence::whereDate('created_at', Carbon::today())->count();
        $book = Book::where('stock', 1)->count();
        $school = User::where('is_school', 1)->count();
        $post = Post::count();
        return view('admin.dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'presence' =>  $presence,
            'today' => $today,
            'member' => $member,
            'suggest' => $suggest,
            'book' => $book,
            'school' => $school,
            'post' => $post,
            'category' => $category,
            'categories' => Category::all()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function show(Presence $presence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function edit(Presence $presence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presence $presence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presence $presence)
    {
        //
    }
}
