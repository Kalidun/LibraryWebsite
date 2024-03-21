<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('pages.auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|max:255|email:dns',
            'password' => 'required|min:5|max:255',
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Login Successfull!');
        }
        return back()->with('loginError', 'Email/Password is incorrect!');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout Successfull!');
    }
}
