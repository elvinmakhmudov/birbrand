<div class="header">
    <nav class="light-blue darken-1">
        <div class="container">
            <div class="nav-wrapper">
                <a href="{{ route('main') }}" class="brand-logo left">{{ config('app.name') }}</a>
                <a href="#" class="left nav-phone waves-effect hide-on-small-only">
                    <li class="valign-wrapper">
                        <span class="material-icons">local_phone</span><span> +994 (51) 855 01 05 </span>
                    </li>
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    @if (Auth::guest())
                    <li><a class="waves-effect waves-light" href="#/login" >@{{ $t("main.login") }}</a></li>
                    <li><a  class="waves-effect waves-light" href="#/register">@{{ $t("main.signUp") }}</a></li>
                    @else
                    <li><a class="dropdown-button" href="#!" data-activates="headerDropdown">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                    <ul id="headerDropdown" class="dropdown-content">
                        <li>
                            <a href="#/profile">
                                @{{ $t("main.profile") }}
                            </a>
                        </li>
                        <li>
                            <a href="#/order">
                                @{{ $t("main.orders") }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            @{{ $t("main.logout") }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <li class="divider"></li>
                        @if(\Illuminate\Support\Facades\Auth::user()->is_admin == true)
                        <li>
                            <a href="/admin665">
                                @{{ $t("main.adminPanel") }}
                            </a>
                        </li>
                        @endif
                    </ul>
                    @endif
                </ul>
                <ul id="mobileDropdown" class="dropdown-content">
                    @if (Auth::guest())
                    <li><a class="waves-effect waves-light" href="#/login" >@{{ $t("main.login") }}</a></li>
                    <li><a  class="waves-effect waves-light" href="#/register">@{{ $t("main.signUp") }}</a></li>
                    @else
                    <li>
                        <a href="#/profile">
                            @{{ $t("main.profile") }}
                        </a>
                    </li>
                    <li>
                        <a href="#/order">
                            @{{ $t("main.orders") }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        @{{ $t("main.logout") }}</a>
                    </li>
                    <li class="divider"></li>
                    @if(\Illuminate\Support\Facades\Auth::user()->is_admin == true)
                    <li>
                        <a href="/admin665">
                            @{{ $t("main.adminPanel") }}
                        </a>
                    </li>
                    @endif
                    @endif
                </ul>
                <ul id="languageDropdown" class="dropdown-content">
                    <li>
                        <a href="#" @click.prevent="setLocale('az')">
                            az
                        </a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="setLocale('ru')">
                            ru
                        </a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="setLocale('en')">
                            en
                        </a>
                    </li>
                </ul>
                <ul class="right hide-on-large-only">
                    <li><a href="#!" class="dropdown-button" data-activates="mobileDropdown"><i class="material-icons">more_vert</i></a></li>
                </ul>
                <ul class="right">
                    <li class="valign-wrapper">
                        <a href="#/cart" class="waves-effect"><span class="material-icons ">shopping_cart</span><span class="shopping-cart-badge">@{{Object.keys($store.state.cartItems).length || 0 }}</span></a>
                    </li>
                    <li><a href="#!" class="dropdown-button" data-activates="languageDropdown">@{{ $t("main.language") }}</a></li>
                </ul>
                <ul class="hide-on-med-and-down right">
                    <li><a href="#/about" class="waves-effect">
                        @{{ $t("main.about") }}
                    </a></li>
                </ul>
                <ul class="hide-on-med-and-up right">
                    <a href="tel:+994-51-855-01-05" class="waves-effect"><span class="material-icons">local_phone</span></a>
                </ul>
            </div>
        </div>
    </nav>
</div>
