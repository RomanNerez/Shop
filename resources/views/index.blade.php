<!DOCTYPE html>
<html lang="en" class="page">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Iнтернет магазин FreeZ</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('asset/css/normalize.css') }}" />
        <link rel="stylesheet" href="{{ asset('asset/css/style.css?v='.time()) }}" />
    </head>
    <body class="page__body">
        <div id="app" class="page__wrapper">
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
                                        Русский
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
                                    @guest
                                        <a href="{{route('login')}}" class="sign">
                                        <svg>
                                            <use xlink:href="#signin"></use>
                                        </svg>
                                        Вхiд / <span> Реєстрація</span></a>
                                    @else
                                        <a href="{{route(Auth::user()->role.'-home')}}" class="sign">{{ Auth::user()->name }}</a>
                                    @endguest
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
                            <b class="logo__red">free</b>
                            <span>Z</span>
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
                                <a class="menu__link current__page" href="{{route('index')}}">Головна</a>
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
                        <div class="cart__popup">
                            <p>
                                <span class="cart__popup-total">@{{carts.length}}</span> товар
                                на сумму
                                <span class="cart__popup-price">@{{summeryCart.allPrice}}</span
                                >грн.
                            </p>
                            <a href="{{route('cart')}}" class="btn cart__popup-btn"
                                >Оформити</a
                            >
                        </div>
                    </div>
                </div>
            </nav>
            <main class="main">
                @yield('content')
            </main>
            <footer class="footer">
                <div class="container">
                    <div class="footer__wrapper">
                        <div class="footer__column">
                            <div class="column__title">
                                <h2 class="footer__logo">
                                    <span class="logo__red">free</span>Z
                                </h2>
                                <p>
                                    Найзручнiший online-магазин аксесуарiв та електронiки в Україні
                                </p>
                            </div>
                        </div>
                        <div class="footer__column">
                            <div class="column__title">
                                <h3>Останнi статтi</h3>
                            </div>
                            <ul class="footer__news news">
                                <li class="news__item">
                                    <a href="#" class="news__link">
                                        <div class="news__img ibg">
                                            <img src="{{asset('img/brand-1.png')}}" alt="new-1" />
                                        </div>
                                        <div class="news__title">
                                            <p>
                                                Corem ipsum dolor sit amet, consectetuer adipiscing...
                                            </p>
                                            <time datetime="04/02/2015">04 February 2015</time>
                                        </div>
                                    </a>
                                </li>
                                <li class="news__item">
                                    <a href="#" class="news__link">
                                        <div class="news__img ibg">
                                            <img src="{{asset('img/brand-1.png')}}" alt="new-1" />
                                        </div>
                                        <div class="news__title">
                                            <p>
                                                Corem ipsum dolor sit amet, consectetuer adipiscing...
                                            </p>
                                            <time datetime="04/02/2015">04 February 2015</time>
                                        </div>
                                    </a>
                                </li>
                                <li class="news__item">
                                    <a href="#" class="news__link">
                                        <div class="news__img ibg">
                                            <img src="{{asset('img/brand-1.png')}}" alt="new-1" />
                                        </div>
                                        <div class="news__title">
                                            <p>
                                                Corem ipsum dolor sit amet, consectetuer adipiscing...
                                            </p>
                                            <time datetime="04/02/2015">04 February 2015</time>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="footer__column">
                            <div class="column__title">
                                <h3>Контакти</h3>
                                <ul class="footer__contacts contacts">
                                    <li class="contacts__item">
                                        <a href="#" class="contacts__link">
                                            <span class="contacts__name">Address</span>
                                            <p class="contacts__text">
                                                795 South Park Avenue, Door 6 Wonderland, CA 94107,Australia
                                            </p>
                                        </a>
                                    </li>
                                    <li class="contacts__item">
                                        <a href="#" class="contacts__link">
                                            <span class="contacts__name">Phone</span>
                                            <p class="contacts__text">
                                                +38(099)036-80-44
                                            </p>
                                        </a>
                                    </li>
                                    <li class="contacts__item">
                                        <a href="#" class="contacts__link">
                                            <span class="contacts__name">Email</span>
                                            <p class="contacts__text">
                                                yuriy.zieit@gmail.com
                                            </p>
                                        </a>
                                    </li>
                                    <li class="contacts__item">
                                        <a href="#" class="contacts__link">
                                            <span class="contacts__name">Address</span>
                                            <p class="contacts__text">
                                                795 South Park Avenue, Door 6 Wonderland, CA 94107,Australia
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer__column">
                            <div class="column__title">
                                <h3>Соц. мережi</h3>
                            </div>
                            <ul class="socials">
                                <li class="socials__item">
                                    <a href="#" class="socials__link">
                                        <svg>
                                            <use xlink:href="#insta"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li class="socials__item">
                                    <a href="#" class="socials__link">
                                        <svg>
                                            <use xlink:href="#facebook"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li class="socials__item">
                                    <a href="#" class="socials__link">
                                        <svg>
                                            <use xlink:href="#telegram"></use>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <svg class="svg-sprite" xmlns="http://www.w3.org/2000/svg" display="none">
            <symbol id="home" viewBox="0 0 448 512">
                <g>
                    <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z">
                    </path>
                </g>
            </symbol>
            <symbol id="twitter" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"
                    ></path>
                </g>
            </symbol>
            <symbol id="facebook" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"
                    ></path>
                </g>
            </symbol>
            <symbol id="globe" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M336.5 160C322 70.7 287.8 8 248 8s-74 62.7-88.5 152h177zM152 256c0 22.2 1.2 43.5 3.3 64h185.3c2.1-20.5 3.3-41.8 3.3-64s-1.2-43.5-3.3-64H155.3c-2.1 20.5-3.3 41.8-3.3 64zm324.7-96c-28.6-67.9-86.5-120.4-158-141.6 24.4 33.8 41.2 84.7 50 141.6h108zM177.2 18.4C105.8 39.6 47.8 92.1 19.3 160h108c8.7-56.9 25.5-107.8 49.9-141.6zM487.4 192H372.7c2.1 21 3.3 42.5 3.3 64s-1.2 43-3.3 64h114.6c5.5-20.5 8.6-41.8 8.6-64s-3.1-43.5-8.5-64zM120 256c0-21.5 1.2-43 3.3-64H8.6C3.2 212.5 0 233.8 0 256s3.2 43.5 8.6 64h114.6c-2-21-3.2-42.5-3.2-64zm39.5 96c14.5 89.3 48.7 152 88.5 152s74-62.7 88.5-152h-177zm159.3 141.6c71.4-21.2 129.4-73.7 158-141.6h-108c-8.8 56.9-25.6 107.8-50 141.6zM19.3 352c28.6 67.9 86.5 120.4 158 141.6-24.4-33.8-41.2-84.7-50-141.6h-108z"
                    ></path>
                </g>
            </symbol>
            <symbol id="google" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM164 356c-55.3 0-100-44.7-100-100s44.7-100 100-100c27 0 49.5 9.8 67 26.2l-27.1 26.1c-7.4-7.1-20.3-15.4-39.8-15.4-34.1 0-61.9 28.2-61.9 63.2 0 34.9 27.8 63.2 61.9 63.2 39.6 0 54.4-28.5 56.8-43.1H164v-34.4h94.4c1 5 1.6 10.1 1.6 16.6 0 57.1-38.3 97.6-96 97.6zm220-81.8h-29v29h-29.2v-29h-29V245h29v-29H355v29h29v29.2z"
                    ></path>
                </g>
            </symbol>
            <symbol id="heart" viewBox="0 0 512 512">
                <g>
                    <path
                        d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"
                    ></path>
                </g>
            </symbol>
            <symbol id="linkedin" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"
                    ></path>
                </g>
            </symbol>
            <symbol id="phone" viewBox="0 0 320 512">
                <g>
                    <path
                        d="M272 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM160 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"
                    ></path>
                </g>
            </symbol>
            <symbol id="signin" viewBox="0 0 512 512">
                <g>
                    <path
                        d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"
                    ></path>
                </g>
            </symbol>
            <symbol id="telegram" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"
                    ></path>
                </g>
            </symbol>
            <symbol id="cart" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"
                    ></path>
                </g>
            </symbol>
            <symbol id="search" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"
                    ></path>
                </g>
            </symbol>
            <symbol id="leaf" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M546.2 9.7c-5.6-12.5-21.6-13-28.3-1.2C486.9 62.4 431.4 96 368 96h-80C182 96 96 182 96 288c0 7 .8 13.7 1.5 20.5C161.3 262.8 253.4 224 384 224c8.8 0 16 7.2 16 16s-7.2 16-16 16C132.6 256 26 410.1 2.4 468c-6.6 16.3 1.2 34.9 17.5 41.6 16.4 6.8 35-1.1 41.8-17.3 1.5-3.6 20.9-47.9 71.9-90.6 32.4 43.9 94 85.8 174.9 77.2C465.5 467.5 576 326.7 576 154.3c0-50.2-10.8-102.2-29.8-144.6z"
                    ></path>
                </g>
            </symbol>
            <symbol id="sun" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z"
                    ></path>
                </g>
            </symbol>
            <symbol id="tablet" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M400 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM224 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"
                    ></path>
                </g>
            </symbol>
            <symbol id="gear" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M487.4 315.7l-42.6-24.6c4.3-23.2 4.3-47 0-70.2l42.6-24.6c4.9-2.8 7.1-8.6 5.5-14-11.1-35.6-30-67.8-54.7-94.6-3.8-4.1-10-5.1-14.8-2.3L380.8 110c-17.9-15.4-38.5-27.3-60.8-35.1V25.8c0-5.6-3.9-10.5-9.4-11.7-36.7-8.2-74.3-7.8-109.2 0-5.5 1.2-9.4 6.1-9.4 11.7V75c-22.2 7.9-42.8 19.8-60.8 35.1L88.7 85.5c-4.9-2.8-11-1.9-14.8 2.3-24.7 26.7-43.6 58.9-54.7 94.6-1.7 5.4.6 11.2 5.5 14L67.3 221c-4.3 23.2-4.3 47 0 70.2l-42.6 24.6c-4.9 2.8-7.1 8.6-5.5 14 11.1 35.6 30 67.8 54.7 94.6 3.8 4.1 10 5.1 14.8 2.3l42.6-24.6c17.9 15.4 38.5 27.3 60.8 35.1v49.2c0 5.6 3.9 10.5 9.4 11.7 36.7 8.2 74.3 7.8 109.2 0 5.5-1.2 9.4-6.1 9.4-11.7v-49.2c22.2-7.9 42.8-19.8 60.8-35.1l42.6 24.6c4.9 2.8 11 1.9 14.8-2.3 24.7-26.7 43.6-58.9 54.7-94.6 1.5-5.5-.7-11.3-5.6-14.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z"
                    ></path>
                </g>
            </symbol>
            <symbol id="link" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M326.612 185.391c59.747 59.809 58.927 155.698.36 214.59-.11.12-.24.25-.36.37l-67.2 67.2c-59.27 59.27-155.699 59.262-214.96 0-59.27-59.26-59.27-155.7 0-214.96l37.106-37.106c9.84-9.84 26.786-3.3 27.294 10.606.648 17.722 3.826 35.527 9.69 52.721 1.986 5.822.567 12.262-3.783 16.612l-13.087 13.087c-28.026 28.026-28.905 73.66-1.155 101.96 28.024 28.579 74.086 28.749 102.325.51l67.2-67.19c28.191-28.191 28.073-73.757 0-101.83-3.701-3.694-7.429-6.564-10.341-8.569a16.037 16.037 0 0 1-6.947-12.606c-.396-10.567 3.348-21.456 11.698-29.806l21.054-21.055c5.521-5.521 14.182-6.199 20.584-1.731a152.482 152.482 0 0 1 20.522 17.197zM467.547 44.449c-59.261-59.262-155.69-59.27-214.96 0l-67.2 67.2c-.12.12-.25.25-.36.37-58.566 58.892-59.387 154.781.36 214.59a152.454 152.454 0 0 0 20.521 17.196c6.402 4.468 15.064 3.789 20.584-1.731l21.054-21.055c8.35-8.35 12.094-19.239 11.698-29.806a16.037 16.037 0 0 0-6.947-12.606c-2.912-2.005-6.64-4.875-10.341-8.569-28.073-28.073-28.191-73.639 0-101.83l67.2-67.19c28.239-28.239 74.3-28.069 102.325.51 27.75 28.3 26.872 73.934-1.155 101.96l-13.087 13.087c-4.35 4.35-5.769 10.79-3.783 16.612 5.864 17.194 9.042 34.999 9.69 52.721.509 13.906 17.454 20.446 27.294 10.606l37.106-37.106c59.271-59.259 59.271-155.699.001-214.959z"
                    ></path>
                </g>
            </symbol>
            <symbol id="arrow-down" viewBox="0 0 448 512">
                <path
                    d="M504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zM273 369.9l135.5-135.5c9.4-9.4 9.4-24.6 0-33.9l-17-17c-9.4-9.4-24.6-9.4-33.9 0L256 285.1 154.4 183.5c-9.4-9.4-24.6-9.4-33.9 0l-17 17c-9.4 9.4-9.4 24.6 0 33.9L239 369.9c9.4 9.4 24.6 9.4 34 0z"
                ></path>
            </symbol>
            <symbol id="insta" viewBox="0 0 448 512">
                <path d="M224,202.66A53.34,53.34,0,1,0,277.36,256,53.38,53.38,0,0,0,224,202.66Zm124.71-41a54,54,0,0,0-30.41-30.41c-21-8.29-71-6.43-94.3-6.43s-73.25-1.93-94.31,6.43a54,54,0,0,0-30.41,30.41c-8.28,21-6.43,71.05-6.43,94.33S91,329.26,99.32,350.33a54,54,0,0,0,30.41,30.41c21,8.29,71,6.43,94.31,6.43s73.24,1.93,94.3-6.43a54,54,0,0,0,30.41-30.41c8.35-21,6.43-71.05,6.43-94.33S357.1,182.74,348.75,161.67ZM224,338a82,82,0,1,1,82-82A81.9,81.9,0,0,1,224,338Zm85.38-148.3a19.14,19.14,0,1,1,19.13-19.14A19.1,19.1,0,0,1,309.42,189.74ZM400,32H48A48,48,0,0,0,0,80V432a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V80A48,48,0,0,0,400,32ZM382.88,322c-1.29,25.63-7.14,48.34-25.85,67s-41.4,24.63-67,25.85c-26.41,1.49-105.59,1.49-132,0-25.63-1.29-48.26-7.15-67-25.85s-24.63-41.42-25.85-67c-1.49-26.42-1.49-105.61,0-132,1.29-25.63,7.07-48.34,25.85-67s41.47-24.56,67-25.78c26.41-1.49,105.59-1.49,132,0,25.63,1.29,48.33,7.15,67,25.85s24.63,41.42,25.85,67.05C384.37,216.44,384.37,295.56,382.88,322Z"></path>
            </symbol>
            <symbol id="mail" viewBox="0 0 448 512">
                <path d="M256 8C118.941 8 8 118.919 8 256c0 137.059 110.919 248 248 248 48.154 0 95.342-14.14 135.408-40.223 12.005-7.815 14.625-24.288 5.552-35.372l-10.177-12.433c-7.671-9.371-21.179-11.667-31.373-5.129C325.92 429.757 291.314 440 256 440c-101.458 0-184-82.542-184-184S154.542 72 256 72c100.139 0 184 57.619 184 160 0 38.786-21.093 79.742-58.17 83.693-17.349-.454-16.91-12.857-13.476-30.024l23.433-121.11C394.653 149.75 383.308 136 368.225 136h-44.981a13.518 13.518 0 0 0-13.432 11.993l-.01.092c-14.697-17.901-40.448-21.775-59.971-21.775-74.58 0-137.831 62.234-137.831 151.46 0 65.303 36.785 105.87 96 105.87 26.984 0 57.369-15.637 74.991-38.333 9.522 34.104 40.613 34.103 70.71 34.103C462.609 379.41 504 307.798 504 232 504 95.653 394.023 8 256 8zm-21.68 304.43c-22.249 0-36.07-15.623-36.07-40.771 0-44.993 30.779-72.729 58.63-72.729 22.292 0 35.601 15.241 35.601 40.77 0 45.061-33.875 72.73-58.161 72.73z"></path>
            </symbol>
            <symbol id="address" viewBox="0 0 448 512">
                <path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
            </symbol>
            <symbol id="cover" viewBox="0 0 448 512">
                <g id="svgg"><path d="M132.067 19.527 C 120.126 20.815,109.219 29.155,104.800 40.378 C 102.357 46.581,102.381 45.773,102.381 121.729 L 102.381 192.381 98.690 192.388 C 65.643 192.454,40.211 205.103,23.771 229.650 C -11.462 282.259,22.295 352.850,85.646 359.042 C 88.499 359.321,106.209 359.524,127.670 359.524 L 164.762 359.524 164.762 373.595 C 164.762 390.182,165.047 391.265,170.100 393.856 C 176.368 397.070,177.209 396.474,203.194 370.408 C 229.107 344.412,229.049 344.495,226.152 338.095 C 224.895 335.319,181.281 291.869,178.333 290.457 C 174.316 288.533,168.837 290.086,166.340 293.856 L 165.000 295.880 164.762 310.440 L 164.524 325.000 129.048 325.143 C 84.332 325.323,81.498 325.062,71.059 319.813 C 37.358 302.866,34.598 255.973,66.070 235.077 C 74.449 229.514,81.275 227.565,93.434 227.262 L 102.344 227.041 102.483 265.544 C 102.601 298.380,102.727 304.328,103.337 305.952 L 104.052 307.857 125.597 307.981 C 137.447 308.049,147.156 307.942,147.172 307.743 C 147.189 307.544,147.272 304.702,147.358 301.429 C 147.952 278.832,167.237 266.018,186.667 275.310 C 190.718 277.248,237.821 323.850,240.554 328.625 L 242.143 331.400 255.519 331.414 C 277.940 331.438,286.676 327.290,293.846 313.213 C 297.458 306.122,297.308 308.080,297.495 265.357 L 297.661 227.143 305.140 227.149 C 332.686 227.172,353.164 245.162,355.722 271.586 C 358.418 299.429,338.426 322.241,308.939 324.970 C 296.385 326.132,290.478 331.286,290.078 341.429 C 289.585 353.950,298.442 360.528,313.842 359.077 C 386.240 352.253,416.587 264.040,363.476 214.800 C 347.775 200.243,330.501 193.554,306.082 192.577 L 297.640 192.239 297.506 119.572 C 297.357 38.583,297.632 45.136,294.067 37.857 C 289.890 29.327,281.736 22.674,272.381 20.161 C 269.038 19.263,139.926 18.680,132.067 19.527 M168.333 41.122 C 185.326 45.650,187.403 69.004,171.504 76.782 L 168.333 78.333 152.143 78.333 L 135.952 78.333 132.742 76.813 C 116.555 69.145,118.792 45.065,136.069 40.993 C 139.093 40.281,165.572 40.386,168.333 41.122 M137.857 50.287 C 125.874 56.814,134.321 74.396,146.519 68.318 C 153.236 64.971,153.874 55.567,147.681 51.205 C 145.189 49.450,140.243 48.988,137.857 50.287 M163.990 54.475 C 161.878 55.421,160.952 56.980,160.952 59.593 C 160.952 65.665,169.775 66.960,171.386 61.126 C 172.634 56.606,168.178 52.600,163.990 54.475 " stroke="none" fill="#000000" fill-rule="evenodd"></path>
            </symbol>
        </svg>
        <script src="{{asset('libs/jquery.min.js')}}"></script>
        <script src="{{asset('libs/slick.min.js')}}"></script>
        <script src="{{asset('asset/js/main.js?v='.time())}}"></script>
    </body>
</html>
