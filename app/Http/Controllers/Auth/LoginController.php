<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Request;
use Auth;

class LoginController extends Controller
{
    public function login()
    {
        $email = Request::get('email');
        $password = Request::get('password');
        $remember_me = true;

        $user = User::where('email', $email)->first();
        if (is_null($user)) {
            return; //沒有這個人
        }

        if (password_verify($password, $user->password)) {
            Session::put('user_id', $user->id);
            return View('book'); //登入成功
        }

        return; //密碼錯誤
    }

    public function logout()
    {
        Session::flush();
    }
}