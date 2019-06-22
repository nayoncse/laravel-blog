<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $data['title'] = 'user profile';
        return view('admin/user.profile',$data);
    }
}
