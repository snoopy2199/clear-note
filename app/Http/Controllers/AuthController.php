<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('$remember');

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect()->intended('/bookshelf');
        }

        return view('index', ['error' => '登入失敗']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}