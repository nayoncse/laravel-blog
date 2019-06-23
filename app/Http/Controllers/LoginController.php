<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginform(){
        return view('login');
    }

    public function login(request $request)
    {
      $request->validate([
        'email'=>'required',
        'password'=>'required'
      ]);

      $credentials =$request->only('email','password');

      if(Auth::attempt($credentials)) {
          return redirect()->intended('dashboard');
      }
      return redirect()->back()->with(['massage'=>'Emailor pass invalid']);
    }
}
