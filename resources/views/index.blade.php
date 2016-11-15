@extends('layouts.master')

@section('title', 'Clear Note')

@section('script')
    <script src="{{ URL::asset('js/index.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}">
@endsection

@section('main')
    <img id="index_banner" src="{{ asset('img/image_banner.jpg') }}">
    <div id="index_cornell_note" class="index-section row">
        <img class="col-md-5 col-md-offset-2" src="{{ asset('img/image_cornell_note.jpg') }}">
        <div class="col-md-3">
            <div id="cornell_note_title">康乃爾筆記法</div>
            <div id="cornell_note_part">
                <ol>
                    <li>筆記</li>
                    <li>關鍵字</li>
                    <li>摘要</li>
                </ol>
            </div>
        </div>
    </div>
    <div id="index_feature" class="index-section row">
        <div class="col-md-3 col-md-offset-2">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i> 簡單上手
        </div>
        <div class="col-md-3">
            <i class="fa fa-pencil" aria-hidden="true"></i> 快速筆記
        </div>
        <div class="col-md-3">
            <i class="fa fa-eye" aria-hidden="true"></i> 清楚明瞭
        </div>
    </div>
    <div id="index_sign_up" class="index-section">
        <div id="index_sign_up_title">馬上體驗</div>
        <form id="index_regist_form" class="form-horizontal" role="form">
            <div id="index_regist_group" class="form-group">
                <div class="col-sm-5">
                    <input id="index_regist_inputEmail" type="email" name="email"
                           class="form-control"  placeholder="電子郵件" required>
                </div>
                <button id="index_regist_button" type="submit" class="btn btn-default col-sm-1">
                    註冊
                </button>
            </div>
        </form>
    </div>
@endsection