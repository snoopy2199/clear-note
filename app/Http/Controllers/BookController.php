<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class BookController extends BaseController
{
    public function showBook()
    {
        $user = Session::get('user_id');


        return View('book')->with('user', $user);
    }
}