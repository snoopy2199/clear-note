@extends('layouts.master')

@section('title', 'Clear Note')

@section('script')
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/finish_registration.css') }}">
@endsection

@section('main')
    <div id="finish_regist_title" class="finish_regist_text">
        只差一步
    </div>
    <div id="finish_regist_content" class="finish_regist_text">
        輸入你喜歡的稱呼，設定好密碼，馬上就可以開始
    </div>
    <form action="/register/profile" method="post" class="form-horizontal" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $user['id'] }}">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 col-md-offset-2 control-label">電子郵件</label>
            <div id="finish_regist_email" class="col-sm-4">
                {{ $user['email'] }}
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-sm-2 col-md-offset-2 control-label">稱呼</label>
            <div class="col-sm-4">
                <input type="name" name="name"
                       class="form-control" id="inputName" placeholder="稱呼">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-sm-2 col-md-offset-2 control-label">密碼</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="inputPassword" placeholder="密碼">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPasswordAgain" class="col-sm-2 col-md-offset-2 control-label">驗證密碼</label>
            <div class="col-sm-4">
                <input type="password" name="password"
                       class="form-control" id="inputPasswordAgain" placeholder="驗證密碼">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-2">
                <button id="finish_regist_submit" type="submit" class="btn btn-default">完成</button>
            </div>
        </div>
    </form>
@endsection