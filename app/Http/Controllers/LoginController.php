<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('front.login', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(auth()->user()->is_admin==1){
                return redirect()->intended('/admin/dashboard');
            }elseif(auth()->user()->is_member==1){
                return redirect()->intended('/member/frontpage');
            }elseif(auth()->user()->is_school==1){
                return redirect()->intended('/');
            }
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
