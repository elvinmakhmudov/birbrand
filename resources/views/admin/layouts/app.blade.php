<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="login-status" content="{{ Auth::check() }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BirBrand') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body>
<div id="app">
    @include('layouts.nav.main')
    @include('admin.layouts.nav.categories')
    @yield('content')
</div>
<!-- Scripts -->
@include('layouts.footer')
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
