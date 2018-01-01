<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    {{--<meta content="width=device-width, initial-scale=1" name="viewport">--}}
    <meta content="{{ Auth::check() }}" name="login-status">
    <!-- CSRF Token -->
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <title>
        {{ config('app.name', 'BirBrand') }}
    </title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <top-banner>
    </top-banner>
    <flashmessage>
    </flashmessage>
    @include('layouts.nav.main')
    @yield('content')
</div>
<!-- Scripts -->
<script src="{{ mix('js/app.js') }}">
</script>
</body>
</html>
