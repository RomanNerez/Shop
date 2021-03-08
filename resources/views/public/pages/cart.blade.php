@extends('public.index')

@section('content')
<section class="cart-page">
{{--    <div class="wrapper">--}}
{{--        <cart-layout></cart-layout>--}}
{{--    </div>--}}

    <div class="container-fluid">
        <div class="cart-page__header designator"></div>
        <div class="cart-page__wrapper">
            <div class="purchase">
                <section class="purchase__items">
                    <div class="purchase__title">
                        <h4>Кошик</h4>
                    </div>
                    <ul class="purchase__list">
                    <li class="purchase__item">
                        <div class="purchase__icon">
                            <img
                                src="img/product-2.jpg"
                                alt="brand-1"
                                height="70"
                            />
                        </div>
                        <div class="purchase__name">
                            <p>
                                test
                            </p>
                        </div>
                        <div class="purchase__price">
                            <div class="purchase__counter">
                                <button class="purchase__btn">
                                    -
                                </button>
                                <span class="purchase__summ">1</span
                                >
                                <button class="purchase__btn">
                                    +
                                </button>
                            </div>
                            <p>100.0<span> грн.</span></p>
                            <button
                                class="purchase__remove"
                                type="button"
                                id="purchase__remove"
                                title="Видалити товар"
                            ></button>
                        </div>
                    </li>
                    </ul>
                    <div>Корзина пуста</div>
                </section>
            </div>


            <div class="payment">
                <div class="payment__wrapper">
                    <div class="payment__summary">
                        <p class="payment__title">До сплати:<b>₴<span></span>5555</b></p>
                    </div>
                    <div class="payment__info">
                        <p>Кількість товарів<span>1</span></p>
                        <p>Знижка<span>0</span></p>
                        <p>Вартість доставки<span>0</span></p>
                    </div>
                    <div class="payment__output output">
                        <h3>Інформація про доставку</h3>
                        <p class="output__name">Yurii Kapustin</p>
                        <p class="output__email">yuriy.zieit@gmail.com</p>
                        <p class="output__phone">+971523788719</p>
                        <p class="output__address">00000, Україна, Dubai, Dubai, Al Barsha 1 Al Thani residence</p>
                    </div>
                    <ul class="payment__agreement">
                        <li>
                            <input name="adalt__check" id="adalt__check" type="checkbox">
                            <label for="adalt__check">Для оформлення замовлення, будь ласка, підтвердіть, що вам 18 років або більше</label>
                        </li>
                        <li>
                            <input name="adalt__check" id="adalt__check" type="checkbox">
                            <label for="adalt__check">Я згоден з правилами користування торговельною мережею і прочитав правила продажу товарів</label>
                        </li>
                    </ul>
                    <a class="payment__btn" href="#">Продовжити</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
