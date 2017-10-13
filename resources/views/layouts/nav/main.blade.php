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
                    <a class="navbar-brand" href="{{ route('main') }}">{{ config('app.name', 'BirBrand') }}</a>
                </div>
                <div class="navbar-collapse collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav navbar-right navbar-login">
                        @if (Auth::guest())
                            <li><a href="#/login" >@{{ $t("main.login") }}</a></li>
                            <li><a href="#/register">@{{ $t("main.signUp") }}</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#/profile">
                                            @{{ $t("main.profile") }}
                                        </a>
                                        @if(\Illuminate\Support\Facades\Auth::user()->is_admin == true)

                                        <a href="/admin665">
                                            @{{ $t("main.adminPanel") }}
                                        </a>
                                        @endif
                                        <a href="#/order">
                                            @{{ $t("main.orders") }}
                                        </a>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            @{{ $t("main.logout") }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    @{{ $t("main.language") }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#" @click.prevent="setLocale('az')">
                                            Azərbaycanca
                                        </a>
                                        <a href="#" @click.prevent="setLocale('ru')">
                                            На русском
                                        </a>
                                        <a href="#" @click.prevent="setLocale('en')">
                                           English
                                        </a>
                                    </li>
                                </ul>
                            </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="javascript:void(0)"><span class="glyphicon glyphicon-earphone"
                                                               aria-hidden="true"></span> +994 51 855 01 05</a>
                        </li>
                        <li><a href="#/cart"><span class="glyphicon glyphicon-shopping-cart"
                                                               aria-hidden="true"></span><span class="badge badge-light">@{{Object.keys($store.state.cartItems).length || 0 }}</span>
                        </li>
                        <li><a href="#/about">
                                @{{ $t("main.about") }}
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
