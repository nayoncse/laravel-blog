<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
      Session::flash('message','Email or password invalid');
      return redirect()->back()->withInput(['email'=>$request->email]);
    }
}
