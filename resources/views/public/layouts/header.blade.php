<header class="header">
    <div class="header__top top">
        <div class="loader active"></div>
        <div class="container">
            <div class="top__right">
                <ul>
                    <li>
                        <a href="#">
                            <svg>
                                <use xlink:href="#globe"></use>
                            </svg>
                            RU
                        </a>
                    </li>
                    <li>
                        <a href="mailto:yuriy.zieit@gmail.com">
                            <svg>
                                <use xlink:href="#mail"></use>
                            </svg>
                            support@freez.com.ua
                        </a>
                    </li>
                </ul>
            </div>
            <div class="top__left">
                <ul>
                    <li>
                        @if(Auth::check())
                            <a
                                href="{{route(Auth::user()->role . '-cabinet')}}"
                                class="sign"
                            >
                                {{Auth::user()->name }}
                            </a>
                        @endif
                    </li>
                    <li>
                        <ul class="top__socials">
                            <li class="top__insta">
                                <a href="#usd">
                                    <svg width="20" height="20">
                                        <use xlink:href="#insta"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="top__facebook">
                                <a href="#">
                                    <svg>
                                        <use xlink:href="#facebook"></use>
                                    </svg>
                                    Facebook
                                </a>
                            </li>
                            <li class="top__facebook">
                                <a href="#">
                                    <svg>
                                        <use xlink:href="#telegram"></use>
                                    </svg>
                                    Facebook
                                </a>
                            </li>
                            <li class="top__login">
                                @guest
                                    <a href="{{route('login')}}" class="sign">
                                        <svg>
                                            <use xlink:href="#signin"></use>
                                        </svg>
                                        Вхід
                                    </a>
                                @else
                                    <a href="#" onclick="
                                            event.preventDefault()
                                            document.getElementById('logout-form').submit();
                                        "
                                    >
                                        <svg>
                                            <use xlink:href="#logout"></use>
                                        </svg>
                                        Вийти
                                    </a>
                                @endguest
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<nav class="header__bottom bottom">
    <div class="container">
        <div class="bottom__logo">
            <a href="{{url('/')}}">
                <!--<b class="logo__red">free</b>
                <span>Z</span>-->
                <img src="{{asset('img/Header-logo.png')}}" alt="Slider-background" width="90px" />
            </a>
        </div>
        <button type="button" class="burger">
            <span></span>
        </button>
        <div class="menu">
            <button type="button" class="menu__close">
                <span></span>
            </button>
            <ul class="menu__list">
                <li class="menu__item">
                    <a class="menu__link" href="{{url('/')}}">Головна</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="#">Про нас</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="#">Доставка та Гарантiя</a>
                </li>
                <!--<li class="menu__item">
                    <a class="menu__link" href="#">Блог</a>
                </li>-->
                <li class="menu__item">
                    <a class="menu__link" href="#">Контакти</a>
                </li>
            </ul>
        </div>
        <div class="search">
            <search-layout></search-layout>
        </div>
        <div class="comparison-btn">
            <a href="{{ url('compare') }}">
                <svg width="32" height="26" viewBox="0 0 32 26" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M26.6667 25V1H30.9333V25M18.1333 25V11.9091H22.4V25M9.6 25V7.54545H13.8667V25M1.06667 25V18.4545H5.33333V25M32 25H0"
                          stroke="#0A7CCD" stroke-width="2" stroke-miterlimit="10"/>
                </svg>
                <template>
                    <span class="info-circle--red" v-if="compare.count">@{{ compare.count }}</span>
                </template>
            </a>
        </div>
        <div class="bookmarks-btn">
            <a href="{{ url('favorites') }}">
                <svg width="22" height="28" viewBox="0 0 22 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 26L11 20.1667L1 26V1H21V26Z" stroke="#0A7CCD" stroke-width="2" stroke-miterlimit="10"/>
                </svg>
                <template>
                    <span class="info-circle--red" v-if="favorites.count">@{{ favorites.count }}</span>
                </template>
            </a>
        </div>
        <div class="cart">
            <a href="{{ url('cart') }}" class="cart__link">
                <svg>
                    <use xlink:href="#cart"></use>
                </svg>
                <template>
                    <span class="info-circle--red" v-if="cart.count >= 1">@{{ cart.count }}</span>
                </template>
            </a>
        </div>
    </div>
</nav>
