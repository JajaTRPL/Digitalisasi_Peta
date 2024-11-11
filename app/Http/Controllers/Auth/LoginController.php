<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        return view('register');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard');
        }

        return redirect()->back()->withInput()->withErrors(['email' => 'Mohon masukkan data yang benar']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
