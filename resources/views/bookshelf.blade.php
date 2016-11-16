@extends('layouts.master')

@section('title', 'Clear Note')

@section('script')
    <script src="{{ URL::asset('js/bookshelf.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/bookshelf.css') }}">
@endsection

@section('main')
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <ul id="list_book" class="list-group">
                @foreach ($books as $book)
                    <li id="book_{{ $loop->index }}" class="list-group-item book_item"
                        onclick="openBook({{ $book->id }}, 'book_{{ $loop->index }}')">
                        {{ $book->title }}
                    </li>
                @endforeach
                <li class="list-group-item book_item book_add" onclick="showCreateBook({{ Auth::user()->id }})">
                    <i class="fa fa-plus" aria-hidden="true"></i> 新增筆記本
                </li>
            </ul>
            <div id="book_btn_group" style="display: none;">
                <button type="button" class="btn btn-default book-btn">修改</button>
                <button type="button" class="btn btn-default book-btn">刪除</button>
            </div>
        </div>
        <div id="book_content_field" class="col-md-6">
            @foreach ($books as $book)
                <div id="book_{{ $loop->index }}_content" style="display: none;">
                    @foreach ($book->notes as $note)
                        <div id="note_{{ $loop->parent->index}}_{{ $loop->index }}" class="note_item"
                             data-note-hashid="{{ $note->hashId() }}"
                             onclick="selectNote({{ $note->id }}, 'note_{{ $loop->parent->index}}_{{ $loop->index }}')">
                            <div class="note_icon">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                            </div>
                            <div class="note_title">
                                {{$note->title}}
                            </div>
                        </div>
                    @endforeach
                    <div class="note_item note_add" onclick="showCreateNote({{ $book->id }})">
                        <div class="note_icon">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </div>
                        <div class="note_title">
                            新增筆記
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-1">
            <div id="note_btn_group" style="display: none;">
                <button type="button" class="btn btn-warning note-btn" onclick="startNote()">開啟</button>
                <button type="button" class="btn btn-default note-btn">修改</button>
                <button type="button" class="btn btn-default note-btn">刪除</button>
            </div>
        </div>
    </div>

    <!-- Create Book Modal -->
    <div class="modal fade" id="createBookModal" tabindex="-1" role="dialog"
         aria-labelledby="createBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">關閉</span>
                    </button>
                    <h4 class="modal-title" id="createBookModalLabel">新增筆記本</h4>
                </div>
                <div class="modal-body">
                    <form id="create_book_form" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="book_inputTitle" class="col-sm-2 control-label">
                                標題
                            </label>
                            <div class="col-sm-9">
                                <input id="book_inputTitle" type="text" name="title"
                                       class="form-control"  placeholder="標題" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-2">
                                <button id="book_button" type="submit" class="btn btn-default">
                                    新增
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Note Modal -->
    <div class="modal fade" id="createNoteModal" tabindex="-1" role="dialog"
         aria-labelledby="createNoteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">關閉</span>
                    </button>
                    <h4 class="modal-title" id="createNoteModalLabel">新增筆記</h4>
                </div>
                <div class="modal-body">
                    <form id="create_note_form" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="note_inputTitle" class="col-sm-2 control-label">
                                標題
                            </label>
                            <div class="col-sm-9">
                                <input id="note_inputTitle" type="text" name="title"
                                       class="form-control"  placeholder="標題" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-2">
                                <button id="note_button" type="submit" class="btn btn-default">
                                    新增
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection