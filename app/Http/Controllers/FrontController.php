<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect('/dashboard');
        }
        $data['title'] = 'Login or Signup';
        return view('frontpages.home', $data);
    }
}
