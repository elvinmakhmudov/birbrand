<div class="header">
    <div class="nav-header">
        <div class="navbar navbar-default ">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    {{--<a class="navbar-brand" href="{{ route('main') }}">{{ config('app.name', 'BirBrand') }}</a>--}}
                    <a class="navbar-brand" href="#/">{{ config('app.name', 'BirBrand') }}</a>
                </div>
                <div class="navbar-collapse collapse navbar-responsive-collapse">
                    <form class="navbar-form navbar-left ">
                        <div class="search-bar">
                            <div class="form-group">
                                <input type="text" class="form-control col-sm-8" size="50"
                                       placeholder="Axtaran tapar...">
                            </div>
                        </div>
                    </form>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                            <li><a href="#/login">Login</a></li>
                            <li><a href="#/register">Register</a></li>
                            {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--<li><a href="javascript:void(0)"><span class="glyphicon glyphicon-earphone"--}}
                    {{--aria-hidden="true"></span> +994 51 855 01 05</a></li>--}}
                    {{--<li><a href="javascript:void(0)">Haqqimizda</a></li>--}}
                    {{--<li><a href="javascript:void(0)">Qeyd ol</a></li>--}}
                    {{--</ul>--}}
                </div>
            </div>
        </div>
    </div>
</div>
