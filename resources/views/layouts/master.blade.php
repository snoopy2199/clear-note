<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @include('layouts.partials.script')
    <script src="{{ URL::asset('js/layout.js') }}"></script>
    @yield('script')

    @include('layouts.partials.css')
    <link rel="stylesheet" href="{{ URL::asset('css/layout.css') }}">
    @yield('css')
</head>
<body>
    <div id="content">
        @include('layouts.partials.header')
        <div id="main">
            @yield('main')
        </div>
        <div id="blank"></div>
    </div>
    @include('layouts.partials.footer')
</body>
</html>