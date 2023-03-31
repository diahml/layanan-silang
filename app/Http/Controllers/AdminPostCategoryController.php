<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Post_category;

class AdminPostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.kategori.index', [
            "title" => "Post Categories",
            "active" => "admin/kegiatan",
            "post_categories" => Post_category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.kategori.create', [
            "title" => "Post Categories",
            "active" => 'admin/kegiatan',
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
            'name' => 'required',
        ]);


        Post_category::create($validatedData);

        return redirect('/admin/post/kategori')->with('success', 'Success Add New Post Category!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post_category  $post_category
     * @return \Illuminate\Http\Response
     */
    public function show(Post_category $post_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post_category  $post_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Post_category $kategori)
    {
        return view('admin.post.kategori.edit', [
            "title" => "Post Categories",
            "active" => "admin/kegiatan",
            "post_category" => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post_category  $post_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post_category $kategori)
    {
        $rules = [
            'name' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Post_category::where('id', $kategori->id)
            ->update($validatedData);

        return redirect('/admin/post/kategori')->with('success', 'Success Edit a Post Category!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post_category  $post_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post_category $kategori)
    {
        $post = Post::select('*')->where('post_category_id', $kategori->id)->get();
        if ($post->count()) {
            return redirect('/admin/post/kategori')->with('unsuccess', 'You Cannot Delete This One Because This Category Still Has A Post');
        } else {
            Post_category::destroy($kategori->id);
            return redirect('/admin/post/kategori')->with('success', 'Success Delete a Post Category!');
        }
    }
}
