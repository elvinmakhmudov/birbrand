<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <meta content="{{ Auth::check() }}" name="login-status">
                        <!-- CSRF Token -->
                        <meta content="{{ csrf_token() }}" name="csrf-token">
                            <title>
                                {{ config('app.name', 'BirBrand') }}
                            </title>
                            <!--Import Google Icon Font-->
                            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                                <!--Let browser know website is optimized for mobile-->
                                <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
                                <!-- Styles -->
                                <link href="{{ mix('css/app.css') }}" rel="stylesheet">
                                    {{--
                                    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                                        --}}
                                    </link>
                                </link>
                            </link>
                        </meta>
                    </meta>
                </meta>
            </meta>
        </meta>
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
        @include('layouts.footer')
    </body>
</html>
