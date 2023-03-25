<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Post_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('admin.post.index',[
            "active"=>"admin/kegiatan",
            "posts"=>Post::all(),
        ]);
    }

    // public function kategori(){
    //     return view ('admin.post.kategori',[
    //         "active"=>"admin/kegiatan",
    //         "post_categories"=>Post_category::all(),
    //     ]);
    // }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create',[
            "active"=>'admin/kegiatan',
            "post_categories"=>Post_category::all(),
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
           'title'=>'required|max:255',
           'slug'=> 'required|unique:posts',
           'image'=>'image',
           'post_category_id'=>'required',
           'body'=>'required' 
        ]);

        if($request->file('image')){
            $validatedData['image']=$request->file('image')->store('post-imahges');
        }

        $validatedData['excerpt']= Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);

        return redirect('/admin/kegiatan/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $kegiatan)
    {
        
        return view('admin.post.show',[
            "active"=>"admin/kegiatan",
           "post"=>$kegiatan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $kegiatan)
    {
        return view('admin.post.edit',[
            "active"=>"admin/kegiatan",
            "post_categories"=>Post_category::all(),
            "post"=>$kegiatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $kegiatan) //request itu data baru, kegiatan data lama yg udh ada di database
    {
        $rules = [
            'title'=>'required|max:255',
            'post_category_id'=>'required',
            'image'=>'image',
            'body'=>'required' 
         ];  

         if($request->slug!= $kegiatan->slug){
            $rules['slug']='required|unique:posts';
         }

         $validatedData=$request->validate($rules);

         if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image']=$request->file('image')->store('post-imahges');
        }

         $validatedData['excerpt']= Str::limit(strip_tags($request->body), 200);

        Post::where('id', $kegiatan->id)
            ->update($validatedData);

        return redirect('/admin/kegiatan/');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $kegiatan)
    {

        if($kegiatan->image){
            Storage::delete($kegiatan->image);
        }
        Post::destroy($kegiatan->id);

        return redirect('/admin/kegiatan');
    }

    public function checkSlug(Request $request){
        

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }
}
