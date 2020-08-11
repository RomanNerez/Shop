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
                    795 South Park Avenue, Door 6 Wonderland, CA
                    94107, Australia
                </p>
            </div>
            <div class="touch__item">
                <div class="touch__img">
                    <svg>
                        <use xlink:href="#phone"></use>
                    </svg>
                </div>
                <h4>Телефон</h4>
                <p>+440 875369208 - Office</p>
                <p>+440 353363114 - Fax</p>
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
                <p>
                    795 South Park Avenue, Door 6 Wonderland, CA
                    94107, Australia
                </p>
            </div>
        </div>
    </div>
</section>
<section class="questions">
    <div class="container">
        <div class="section__title">
            <h3>Задай запитання</h3>
            <p>
                Lorem, ipsum dolor sit amet consectetur
                adipisicing elit. Autem, voluptatem!
            </p>
        </div>
        <div class="questions__form">
            <form action="#">
                <input
                    type="text"
                    name="name"
                    id="questions__name"
                    placeholder="Ваше iм'я"
                />
                <input
                    type="email"
                    name="email"
                    id="questions__id"
                    placeholder="Ваш email"
                />
                <input
                    type="phone"
                    name="phone"
                    id="questions__phone"
                    placeholder="Ваш телефон"
                />
                <textarea
                    name="text"
                    id="questions__text"
                    cols="30"
                    rows="10"
                    placeholder="Напишiть ваше запитання"
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

<section class="map">
    <div class="map__wrapper"></div>
</section>
@endsection