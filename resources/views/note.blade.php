@extends('layouts.master')

@section('title', 'Clear Note')

@section('script')
    <script src="{{ URL::asset('js/note.js') }}"></script>
    <script>var NOTE_ID = {{ $note->id }};</script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/note.css') }}">
@endsection

@section('main')
    <div id="note_tool" class="row">
        <div class="col-md-2 col-md-offset-1">
            <button type="button" class="btn btn-default book-btn">＋</button>
            <button type="button" class="btn btn-default book-btn">－</button>

        </div>
        <div id="note_title" class="col-md-6">
            {{ $note->title }}
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-default book-btn">儲存</button>
        </div>
        <div class="col-md-2">
            <label class="switch">
                <input id="note_status" class="switch-input" type="checkbox"
                       onchange="updateStatus()">
                <span class="switch-label" data-on="公開" data-off="私人"></span>
                <span class="switch-handle"></span>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
        @foreach ($note->cues as $cue)
            <div class="row">
                <input type="text" class="note_text col-md-12" value="{{ $cue->title }}">
            </div>
            <div class="row">
                <textarea class="note_text col-md-12">{{ $cue->content }}</textarea>
            </div>
        @endforeach
        </div>
        <textarea id="note_content" class="note_text col-md-7"
                  rows="10">{{ $note->content }}</textarea>
    </div>
    <div class="row">
        <textarea id="note_summary" class="note_text col-md-10 col-md-offset-1"
                  rows="4">{{ $note->summary }}</textarea>
    </div>
@endsection