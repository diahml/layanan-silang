<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index(){
        return view('front.presence', [
            'title' => 'Presence',
            'active' => 'presence',
        ]);
    }
    
    

    public function store(Request $request){
        $validatedData = $request->validate([
            'status'=> 'required|max:255',
            'name' => 'required',
            'institution' => 'required',
            'phone' => 'required'
        ]);
        Presence::create($validatedData);
        // $request->session()->flash('success', 'Registration successfull!');
        return redirect('/')->with('success', 'Thanks for Coming');
    }
}
