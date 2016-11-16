<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Note;

class NoteController extends BaseController
{
    public function showNote()
    {

    }

    public function createNote()
    {
        $request = Request::all();
        $book_id = $request['book_id'];
        $title = $request['title'];

        if ($book_id && $title) {
            Note::create([
                'book_id' => $book_id,
                'title' => $title
            ]);
            return Response::json(['msg' => "OK"]);
        } else {
            return Response::json(['msg' => "格式不符"], 403);
        }
    }

    public function updateNote()
    {

    }

    public function deleteNote()
    {

    }
}