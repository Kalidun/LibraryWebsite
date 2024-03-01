<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{
    public function index(){
        return view('pages.auth.register');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'username' => 'required|max:255|unique:users',
            'email' => 'required|max:255|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        // dd($validatedData);
        User::create($validatedData);
        return redirect('login')->with('success', 'Registration Successfull, Please Login!');
    }
}
