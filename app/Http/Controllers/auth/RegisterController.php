<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        User::create($validatedData);
        UserData::create([
            'user_id' => User::latest()->first()->id
        ]);
        return redirect('login')->with('success', 'Registration Successfull, Please Login!');
    }
}
