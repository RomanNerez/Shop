@extends('index')

@section('content')
<section class="touch">
    <div class="container">
        <div class="section__title">
            <h3>Будь на зв'язку</h3>
            <p>Контактна iнформацiя</p>
        </div>
        <div class="touch__wrapper">
            <div class="touch__item">
                <div class="touch__img">
                    <svg>
                        <use xlink:href="#address"></use>
                    </svg>
                </div>
                <h4>Адреса</h4>
                <p>
                    Україна, Запорiжжя
                </p>
            </div>
            <div class="touch__item">
                <div class="touch__img">
                    <svg>
                        <use xlink:href="#phone"></use>
                    </svg>
                </div>
                <h4>Телефон</h4>
                <p>+38-099-036-80-44</p>
            </div>
            <div class="touch__item">
                <div class="touch__img">
                    <svg>
                        <use xlink:href="#mail"></use>
                    </svg>
                </div>
                <h4>Email</h4>
                <p>support@sitename.com</p>
                <p>info@sitename.com</p>
            </div>
            <div class="touch__item">
                <div class="touch__img">
                    <svg>
                        <use xlink:href="#heart"></use>
                    </svg>
                </div>
                <h4>Соц. мережi</h4>
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
                                            <use xlink:href="#telegram"></use>
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
                            </ul>
            </div>
        </div>
    </div>
</section>
<section class="questions">
    <div class="container">
        <div class="section__title">
            <h3>Задай запитання</h3>
            <p>
            Будь-які питання будуть розглядатися нашими співробітниками
            </p>
        </div>
        <div class="questions__form">
            <form action="#">
                <input
                    type="text"
                    name="name"
                    id="questions__name"
                    placeholder="Ваше iм'я"
                    required
                />
                <input
                    type="email"
                    name="email"
                    id="questions__id"
                    placeholder="Ваш email"
                    required
                />
                <input
                    type="phone"
                    name="phone"
                    id="questions__phone"
                    placeholder="Ваш телефон"
                    required
                />
                <textarea
                    name="text"
                    id="questions__text"
                    cols="30"
                    rows="10"
                    placeholder="Напишiть ваше запитання"
                    required
                ></textarea>
                <button
                    class="btn questions__btn"
                    type="submit"
                >
                    Надiслати
                </button>
            </form>
        </div>
    </div>
</section>

<!--<section class="map">
    <div class="map__wrapper"></div>
</section>-->
@endsection