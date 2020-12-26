@extends('index')

@section('content')
<section class="cart-page">
    <div class="container-fluid">
        <div class="cart-page__header designator"></div>
        <div class="cart-page__wrapper">

            <div class="purchase">
                <section class="purchase__items">
                    <div class="purchase__title">
                        <h4>Кошик</h4>
                    </div>
                    <ul class="purchase__list"
                    v-if="carts.length">
                    <li class="purchase__item"
                        v-for="(item, index) in carts"
                    >
                        <div class="purchase__icon">
                            <img
                                src="img/product-2.jpg"
                                alt="brand-1"
                                height="70"
                            />
                        </div>
                        <div class="purchase__name">
                            <p>
                                @{{item.title}}
                            </p>
                        </div>
                        <div class="purchase__price">
                            <div class="purchase__counter">
                                <button class="purchase__btn"
                                    :disabled="item.count <= 1"
                                    v-on:click="addToCart(item.id, --item.count)"
                                >
                                    -
                                </button>
                                <span class="purchase__summ"
                                    >@{{item.count}}</span
                                >
                                <button class="purchase__btn"
                                    v-on:click="addToCart(item.id, ++item.count)"
                                >
                                    +
                                </button>
                            </div>
                            <p>@{{item.price}}</p>
                            <button
                                class="purchase__remove"
                                type="button"
                                id="purchase__remove"
                                v-on:click="removeCart(item.id)"
                                title="Видалити товар"
                            ></button>
                        </div>
                    </li>
                    </ul>
                    <div v-else>Корзина пуста</div>
                </section>

                <section class="purchase__form">
                    <div class="purchase__title">
                        <h4>Доставка</h4>
                    </div>
                    <form class="purchase__details" action="#">
                        <fieldset>
                            <legend>Особисті данні</legend>
                            <div class="form-row">
                                <div class="form-cell">
                                    <input class="form__input" name="first-name" id="first-name" type="text" required>
                                    <label class="form__label" for="first-name">Iм'я</label>
                                </div>
                                <div class="form-cell">
                                    <input name="last-name" id="last-name" type="text" required>
                                    <label for="last-name">Прізвище</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-cell">
                                    <input name="email" id="email" type="text" required>
                                    <label for="email">E-mail</label>
                                </div>
                                <div class="form-cell">
                                    <input name="phone" id="phone" type="text" required>
                                    <label for="phone">Телефон</label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Адреса</legend>
                            <div class="form-row">
                                <input name="address" id="address" type="text" required>
                                <label for="address">Вулиця, будинок, квартира тощо</label>
                            </div>
                            <div class="form-row">
                                <div class="form-cell">
                                    <input name="region" id="region" type="text" required>
                                    <label for="region">Регіон</label>
                                </div>
                                <div class="form-cell">
                                    <input name="city" id="city" type="text" required>
                                    <label for="city">Місто</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-cell">
                                    <input name="index" id="index" type="text" required>
                                    <label for="index">Індекс</label>
                                </div>
                                <div class="form-cell">
                                    <input name="country" id="country" type="text" required>
                                    <label for="city">Країна</label>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </section>
                <section class="purchase__equiring">
                    <div class="purchase__title">
                        <h4>Оплата</h4>
                        <div class="credit-card">
                            <div class="credit-card__front">
                                <div class="credit-card__logo">
                                    <img src="public/svg/mastercard.svg" alt="mastercard-logo" width="32px">
                                    <img src="public/svg/visa.svg" alt="visa-logo" width="45px">
                                </div>
                                <div class="credit-card__number">
                                    <input type="text" name="card-number" id="card-number">
                                    <label for="card-number">Номер платіжної картки</label>
                                </div>
                                <div class="credit-card__text">
                                    <label for="date">Діє до</label>
                                </div>
                                <div class="credit-card__date">
                                    <input type="text" id="date" name="date" placeholder="MM">
                                    <span>/</span>
                                    <input type="text" id="year" name="year" placeholder="PP">
                                    
                                </div>
                                <div class="credit-card__back">
                                    <input type="text" placeholder="kurwa">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </section>
            </div>
            

            <div class="payment">
                <div class="payment__wrapper">
                    <div class="payment__summary">
                        <p class="payment__title">До сплати:<b>₴<span></span>@{{summeryCart.allPrice}}</b></p>
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