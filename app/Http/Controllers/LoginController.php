<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if (Auth::user()->email == $request->email) {
                return redirect('/dashboard');
            }else{
                return back()->with('fail','Invalid email or Password ');
            }
        }else{
            return back()->with('fail','No account found for this email');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
