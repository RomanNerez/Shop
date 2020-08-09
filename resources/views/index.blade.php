<!DOCTYPE html>
<html lang="en" class="page">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Iнтернет магазин FreeZ</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css?v='.time()) }}" />
    </head>
    <body class="page__body">
        <div id="app" class="page__wrapper">
            <header class="header">
                <div class="header__top top">
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
                                    <a href="#">
                                        <svg>
                                            <use xlink:href="#telegram"></use>
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
                                    <a class="wishlist" href="#">
                                    <svg>
                                        <use xlink:href="#heart"></use>
                                    </svg>
                                    Wishlist: <span>0</span> items</a>
                                </li>
                                <li>
                                    <ul class="top__socials">
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
                                                    <use xlink:href="#twitter"></use>
                                                </svg>
                                                Twitter
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg>
                                                    <use xlink:href="#tumbir"></use>
                                                </svg>
                                                Tumbir</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg>
                                                    <use xlink:href="#linkedin"></use>
                                                </svg>
                                                LinkedIn</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg>
                                                    <use xlink:href="#google"></use>
                                                </svg>
                                                Google+
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <svg>
                                                    <use xlink:href="#rss"></use>
                                                </svg>
                                                Rss
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
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Saepe, eius ipsa? Maiores nemo fuga hic suscipit placeat
                                    consequuntur reiciendis omnis?
                                </p>
                            </div>
                        </div>
                        <div class="footer__column">
                            <div class="column__title">
                                <h3>Останнi новини</h3>
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
                                            <use xlink:href="#facebook"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li class="socials__item">
                                    <a href="#" class="socials__link">
                                        <svg>
                                            <use xlink:href="#twitter"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li class="socials__item">
                                    <a href="#" class="socials__link">
                                        <svg>
                                            <use xlink:href="#linkedin"></use>
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
            <symbol id="rss" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M400 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zM112 416c-26.51 0-48-21.49-48-48s21.49-48 48-48 48 21.49 48 48-21.49 48-48 48zm157.533 0h-34.335c-6.011 0-11.051-4.636-11.442-10.634-5.214-80.05-69.243-143.92-149.123-149.123-5.997-.39-10.633-5.431-10.633-11.441v-34.335c0-6.535 5.468-11.777 11.994-11.425 110.546 5.974 198.997 94.536 204.964 204.964.352 6.526-4.89 11.994-11.425 11.994zm103.027 0h-34.334c-6.161 0-11.175-4.882-11.427-11.038-5.598-136.535-115.204-246.161-251.76-251.76C68.882 152.949 64 147.935 64 141.774V107.44c0-6.454 5.338-11.664 11.787-11.432 167.83 6.025 302.21 141.191 308.205 308.205.232 6.449-4.978 11.787-11.432 11.787z"
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
            <symbol id="tumbir" viewBox="0 0 448 512">
                <g>
                    <path
                        d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-82.3 364.2c-8.5 9.1-31.2 19.8-60.9 19.8-75.5 0-91.9-55.5-91.9-87.9v-90h-29.7c-3.4 0-6.2-2.8-6.2-6.2v-42.5c0-4.5 2.8-8.5 7.1-10 38.8-13.7 50.9-47.5 52.7-73.2.5-6.9 4.1-10.2 10-10.2h44.3c3.4 0 6.2 2.8 6.2 6.2v72h51.9c3.4 0 6.2 2.8 6.2 6.2v51.1c0 3.4-2.8 6.2-6.2 6.2h-52.1V321c0 21.4 14.8 33.5 42.5 22.4 3-1.2 5.6-2 8-1.4 2.2.5 3.6 2.1 4.6 4.9l13.8 40.2c1 3.2 2 6.7-.3 9.1z"
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
        </svg>
        <script src="{{asset('libs/jquery.min.js')}}"></script>
        <script src="{{asset('libs/slick.min.js')}}"></script>
        <script src="{{asset('js/main.js?v='.time())}}"></script>
    </body>
</html>
