<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;

class AdminSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sekolah.index', [
            "title" => "School",
            "active" => "admin/sekolah",
            "sekolah" => User::select('*')->where('is_school', 1)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sekolah.create', [
            "title" => "School",
            "active" => 'admin/sekolah',
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

        //  $rules1['username']=$request['username'];
        //  $rules1['email']=$request['email'];
        //  $rules1['instansi']= $request['nama_sekolah'];
        //  $rules1['password']=bcrypt($request['password']);
        //  $rules1['role']='sekolah';

        //  User::create($rules1);

        //  $id = User::select('*')->where('username', $request['username'])->get();

        //  $user_id = User::table('users')
        //  ->select('id')
        //  ->where('username'== $request['username'])
        //  ->get();

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request['password']);
        $validatedData['commissariat'] = $validatedData['name'];
        $validatedData['is_admin'] = false;
        $validatedData['is_member'] = false;
        $validatedData['is_school'] = true;

        User::create($validatedData);

        return redirect('/admin/sekolah')->with('success', 'Success Add New Member!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show(User $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(User $sekolah)
    {
        return view('admin.sekolah.edit', [
            "title" => "School",
            "active" => "admin/sekolah",
            "sekolah" => $sekolah,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $sekolah)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ];

        $rules['commissariat'] = $request['name'];

        $validatedData = $request->validate($rules);
        if ($request['password']) {
            $validatedData['password'] = bcrypt($request['password']);
        }
        User::where('id', $sekolah->id)
            ->update($validatedData);

        return redirect('/admin/sekolah/')->with('success', "Success Edit School's Data !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $sekolah)
    {
        User::destroy($sekolah->id);

        return redirect('/admin/sekolah');
    }
}
