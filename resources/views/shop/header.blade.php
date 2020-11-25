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
                        <a href="#">
                            <svg>
                                <use xlink:href="#phone"></use>
                            </svg>
                            +(38)-099-036-80-44
                        </a>
                    </li>
                    <li>
                        <a href="mailto:yuriy.zieit@gmail.com">
                            <svg>
                                <use xlink:href="#mail"></use>
                            </svg>
                            yuriy.zieit@gmail.com
                        </a>
                    </li>
                </ul>
            </div>
            <div class="top__left">
                <ul>
                    <li>
                        @if(Auth::check())
                            <a 
                                href="{{route(Auth::user()->role)}}" 
                                class="sign"
                            >
                                {{Auth::user()->name }}
                            </a>
                        @endif
                    </li>
                    <li>
                        <ul class="top__socials">
                            <li>
                                <a href="#">
                                    <svg>
                                        <use xlink:href="#insta"></use>
                                    </svg>
                                    Instagram.com</a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg>
                                        <use xlink:href="#facebook"></use>
                                    </svg>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg>
                                        <use xlink:href="#telegram"></use>
                                    </svg>
                                    telegram
                                </a>
                            </li>
                            <li>
                                @guest
                                    <a href="{{route('login')}}" class="sign">
                                        <svg>
                                            <use xlink:href="#signin"></use>
                                        </svg>
                                        singin
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
                                        logout
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
            <a href="{{route('index')}}">
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
                    <a class="menu__link" href="{{route('index')}}">Головна</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="{{route('about')}}">Про нас</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="{{route('waranty')}}">Доставка та Гарантiя</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="{{route('blog')}}">Блог</a>
                </li>
                <li class="menu__item">
                    <a class="menu__link" href="{{route('contacts')}}">Контакти</a>
                </li>
            </ul>
        </div>
        <div class="search">
            <form action="#" class="search__form">
                <input type="text" placeholder="пошук" />
            </form>
        </div>
        <div class="cart">
            <a href="{{route('cart')}}" class="cart__link">
                <svg>
                    <use xlink:href="#cart"></use>
                </svg>
                <template>
                    <span v-if="carts.length >= 1">@{{summeryCart.allCount}}</span>
                </template>
            </a>
            <!--<div class="cart__popup">
                <p>
                    <span class="cart__popup-total">@{{carts.length}}</span> товар
                    на сумму
                    <span class="cart__popup-price">@{{summeryCart.allPrice}}</span
                    >грн.
                </p>
                <a href="{{route('cart')}}" class="btn cart__popup-btn"
                    >Оформити</a
                >
            </div>-->
        </div>
    </div>
</nav>