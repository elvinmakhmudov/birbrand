<footer class="page-footer footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <a href="#/">
                    <h5 class="white-text">
                        GoShop.az
                    </h5>
                </a>
                <p class="grey-text text-lighten-4">
                    Whatsapp: +994 (51) 855 01 05
                </p>
            </div>
            <div class="col l4 offset-l2 s12" v-show="$t('main')" style="display: none">
                <ul>
                    <li>
                        <a href="#/about" class="grey-text text-lighten-3">
                            @{{ $t("main.about") }}
                        </a>
                    </li>
                    @if (Auth::guest())
                        <li><a class="grey-text text-lighten-3" href="#/login">@{{ $t("main.login") }}</a></li>
                        <li><a class="grey-text text-lighten-3" href="#/register">@{{ $t("main.signUp") }}</a></li>
                    @else
                        <li>
                            <a class="grey-text text-lighten-3" href="#/profile">
                                @{{ $t("main.profile") }} ({{ Auth::user()->name }})
                            </a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="#/order">
                                @{{ $t("main.orders") }}
                            </a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                @{{ $t("main.logout") }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2018 GoShop.az Bütün Hüquqlar Qorunur
        </div>
    </div>
</footer>
