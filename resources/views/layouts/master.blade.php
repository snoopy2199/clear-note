<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    @include('layouts.partials.script')
    @yield('script')

    @include('layouts.partials.css')
    @yield('css')
</head>
<body>
    @include('layouts.partials.header')
    <div id="container">
        @yield('content')
    </div>
    @include('layouts.partials.footer')
</body>
</html>