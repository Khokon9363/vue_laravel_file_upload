<!DOCTYPE html>
<html lang="eng">
<head>
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div id="app">
    <header-component></header-component>
    <hr>
    <router-view></router-view>
    <hr>
    <footer-component></footer-component>
</div>

</body>
</html>
