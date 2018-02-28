<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="theme-color" content="#039be5" />
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    {{--<meta content="width=device-width, initial-scale=1" name="viewport">--}}
    <meta content="{{ Auth::check() }}" name="login-status">
    <!-- CSRF Token -->
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <meta name="description" content="Modno.az - Dəbli qeyim, ayaqqabı və aksessuarların onlayn alış-veriş platformasıdır.">
    <title>
        Modno.az - Dəbli qeyim, ayaqqabı və aksessuarların onlayn alış-veriş platformasıdır.
    </title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
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
<script src="{{ mix('js/app.js') }}"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5a51f0174b401e45400be54d/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
