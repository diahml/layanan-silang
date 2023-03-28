<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\Presence;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
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
        return view('admin.category.create', [
            'title' => 'Add Category',
            'active' => 'add-category',
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
            'name'=> 'required|max:255|unique:categories',
        ]);

        Category::create($validatedData);
        return redirect('/admin/dashboard')->with('success', "New Book's Category are here!");

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id_category)
    {
        $category = Category::select('*')->where('id', $id_category)->get();
        return view('admin.category.edit', [
            'title' => 'Edit Category',
            'active' => 'edit-category',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_category)
    {
        $rules = [
            'name'=> 'required|max:255|unique:categories',
        ];

        $validatedData = $request->validate($rules);


        Category::where('id', $id_category)
        ->update($validatedData);

        return redirect('/admin/dashboard')->with('successUpdated', 'One Category Has Been Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function hapus($id_category)
    {
        $category= Book::select('*')->where('category_id', $id_category)->get();
        if($category->count()){
            return redirect('/admin/dashboard')->with('unsuccess', 'You Cannot Delete This One Because This Category Still Has A Book');
        }else{
            Category::where('id', $id_category)->delete();
            return redirect('/admin/dashboard')->with('success', 'You Delete One Category');
        }
    }

}
