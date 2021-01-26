@extends('index') @section('content')
<main class="user">
    <div class="container">
        <div class="breadcrumbs">
            <ul class="breadcrumbs__wrapper">
                <li class="breadcrumbs__item">
                    <a href="{{route('index')}}">
                        <svg>
                            <use xlink:href="#home"></use>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="#"
                    ></a>
                </li>
                <li class="breadcrumbs__item">
                    <a></a>
                </li>
            </ul>
        </div>
        <div class="section__title">
            <h3>Інформація про клієнта</h3>
        </div>
        <div class="user__wrapper">
            <aside class="user__menu">
                <ul class="user__list">
                    <li >
                        <a class="user__link" href="#">Загальна інформація</a>
                    </li>
                    <li>
                        <a class="user__link" href="#">Мої замовлення</a>
                    </li>
                    <li>
                        <a class="user__link" href="#">Коментарі</a>
                    </li>
                </ul>
            </aside>
            <section class="user__main profile">
                <h2 class="profile__title">Загальна інформація</h2>
                <div class="profile__wrapper">
                    <div class="edit">
                        <form class="edit__form" action="#">
                            <dl>
                                <dt>Прізвище:</dt>
                                <dd>
                                    <input class="" name="first-name" type="text" placeholder="Володимир" readonly="readonly">
                                    <button type="button">Змінити</button>
                                </dd>
                            </dl>
                        </form>
                    </div>
                    <div class="edit">
                        <form class="edit__form" action="#">
                            <dl>
                                <dt>Ім'я:</dt>
                                <dd>
                                    <input class="" name="first-name" type="text" placeholder="Володимир" readonly="readonly">
                                    <button class="edit__btn" type="button">Змінити
                                    </button>
                                </dd>
                            </dl>
                        </form>
                    </div>
                    <div class="edit">
                        <form class="edit__form" action="#">
                            <dl>
                                <dt>По батькові</dt>
                                <dd>
                                    <input class="" name="first-name" type="text" placeholder="Володимир" readonly="readonly">
                                    <button class="edit__btn" type="button">Змінити
                                    </button>
                                </dd>
                            </dl>
                        </form>
                    </div>
                    <div class="edit">
                        <form class="edit__form" action="#">
                            <dl>
                                <dt>Адреса:</dt>
                                <dd>
                                    <input class="" name="first-name" type="text" placeholder="Володимир" readonly="readonly">
                                    
                                    <button class="edit__btn" type="button">Змінити
                                    </button>
                                </dd>
                            </dl>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        
    </div>
</main>
@endsection
