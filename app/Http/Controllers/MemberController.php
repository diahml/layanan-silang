<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.membering.index', [
            'title' => 'Data Member',
            'active' => 'data-member',
            'members' =>  User::all()
        ]);
    }

    public function register()
    {
        return view('admin.membering.register', [
            'title' => 'Data Register',
            'active' => 'data-register',
            'registers' =>  Member::all()
        ]);
    }

    public function approve($id_register)
    {

        $id = Member::select('*')->where('id', $id_register)->get();

        foreach ($id as $id) {
            $name = $id->name;
            $email = $id->email;
            $address = $id->address;
            $commissariat = $id->commissariat;
            $phone = $id->phone;
            $password = $id->password;
        }
        $register = ([
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'commissariat' => $commissariat,
            'phone' => $phone,
            'password' => $password
        ]);

        User::create($register);
        Member::where('id', $id_register)->delete();
        return redirect('/admin/membering')->with('success', 'Success add one member!');
    }


    public function pdfmember()
    {
        return view('admin.membering.pdfmember', [
            'title' => 'PDF Report',
            'active' => 'data-member',
            'members' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.membering.create', [
            'title' => 'Add Member',
            'active' => 'data-member',
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
            'email' => 'required',
            'address' => 'required',
            'commissariat' => 'required',
            'phone' => 'required'
        ]);
        $validatedData['password'] = bcrypt($validatedData['phone']);
        $validatedData['is_admin'] = false;

        User::create($validatedData);
        // Member::create($validatedData);
        return redirect('/admin/membering')->with('success', 'Success Add New Member!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id_member)
    {
        $member = User::select('*')->where('id', $id_member)->get();
        return view(
            'admin.membering.show',
            [
                'title' => 'show',
                'active' => 'data-member',
                'user' => $member
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id_member)
    {
        $member = User::select('*')->where('id', $id_member)->get();
        return view(
            'admin.membering.edit',
            [
                'title' => 'Edit',
                'active' => 'data-member',
                'member' => $member
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_member)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'commissariat' => 'required',
            'phone' => 'required'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['password'] = bcrypt($validatedData['phone']);
        $validatedData['is_admin'] = false;

        if ($validatedData['commissariat'] == "Librarian") {
            $validatedData['is_admin'] = true;
            $validatedData['is_member'] = false;
        }

        User::where('id', $id_member)
            ->update($validatedData);

        return redirect('/admin/membering')->with('success', 'Member Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function hapus($id_member)
    {
        User::where('id', $id_member)->delete();
        return redirect('/admin/membering')->with('success', 'You Delete One Member');
    }

    public function delete($id_register)
    {
        Member::where('id', $id_register)->delete();
        return redirect('/admin/membering/register')->with('success', 'You Delete One Register');
    }
}
