<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Note;
use Hashids\Hashids;

class NoteController extends BaseController
{
    public function showNote($note_hash)
    {
        $hashids = new Hashids('Clear Note', 6);
        $id = $hashids->decode($note_hash);
        $note = Note::find($id)->first();

        if ($note->is_public) {

        } elseif (flase) {

        } else {
            abort(404);
        }

        return view('note')->with('note', $note);
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
        $request = Request::all();
        $note_id = $request['id'];

        $note = Note::find($note_id);

        if ($request['content']) {
            $note->content = $request['content'];
        }
        $note->save();

        return Response::json(['msg' => "OK"]);
    }

    public function deleteNote()
    {

    }
}