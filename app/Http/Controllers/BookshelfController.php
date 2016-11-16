<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class BookshelfController extends BaseController
{
    public function showBookshelf()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $books = $user->books;
            return view('bookshelf')->with('books', $books);
        } else {
            return view('index');
        }
    }

    public function createBook()
    {
        $request = Request::all();
        $user_id = $request['user_id'];
        $title = $request['title'];

        if ($user_id && $title) {
            Book::create([
                'user_id' => $user_id,
                'title' => $title
            ]);
            return Response::json(['msg' => "OK"]);
        } else {
            return Response::json(['msg' => "格式不符"], 403);
        }
    }

    public function updateBook()
    {

    }

    public function deleteBook()
    {

    }
}