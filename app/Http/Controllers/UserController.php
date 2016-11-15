<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use App\Models\User;

class UserController extends BaseController
{
    public function showSetting()
    {

    }

    public function updateUser()
    {
        $request = Request::all();

        $password_hash = password_hash($request['password'], PASSWORD_DEFAULT);
        $name = $request['name'];

        $user = User::find($request['id']);
        $user->password = $password_hash;
        $user->name = $name;
        $user->save();

        $user->verification->delete();

        return redirect('/');
    }

    public function deleteUser()
    {

    }
}