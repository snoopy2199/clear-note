<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function login()
    {
        $request = Request::all();

        $email = $request['email'];
        $password = $request['password'];
        $remember_me = true;

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember_me)) {
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}