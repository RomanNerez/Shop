@extends('index')

@section('content')
<section class="cart-page">
    <div class="container">
        <div class="cart-page__header designator"></div>
        <div class="cart-page__wrapper">
            <div class="purchase">
                <div class="purchase__title">
                    <h4>Корзина</h4>
                </div>
                <ul class="purchase__list"
                    v-if="carts.length"
                >
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
                            <h4>
                                @{{item.title}}
                            </h4>
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
                            <button
                                class="purchase__remove"
                                type="button"
                                id="purchase__remove"
                                v-on:click="removeCart(item.id)"
                                title="Видалити товар"
                            ></button>
                            <p>@{{item.price}} <span>грн.</span></p>
                        </div>
                    </li>
                </ul>
                <div v-else>Корзина пуста</div>
                <div class="purchase__total">
                    <a class="backtomain" href="#"
                        >Продовжити шопiнг</a
                    >
                    <p>Всього: <span>@{{summeryCart.allPrice}}</span>грн.</p>
                </div>
            </div>
            <div class="checkout">
                <div class="checkout__info">
                    <h4 class="checkout__title">Iнформацiя</h4>
                    <form action="#" class="checkout__form">
                        <input
                            type="text"
                            class="checkout__name"
                            placeholder="Ваше iм'я"
                        />
                        <input
                            type="email"
                            class="checkout__email"
                            placeholder="example@gmail.com"
                        />
                    </form>
                    <p>або</p>
                    <a
                        href="login.html"
                        class="btn checkout__login"
                        >Вхiд</a
                    >
                    <a href="#" class="btn checkout__register"
                        >Реєстрація</a
                    >
                </div>
                <div class="checkout__mathod payment">
                    <h4 class="payment__title">
                        Способи оплати
                    </h4>
                    <form action="#" class="payment__form">
                        <div class="payment__item">
                            <label for="visa"
                                ><input
                                    type="checkbox"
                                    id="visa"
                                    name="visa"
                                    class="visa"
                                />
                                <i></i>
                            </label>
                            <img
                                src="img/visa-logo.png"
                                alt="visa-logo"
                                width="40px"
                            />
                            <img
                                src="img/master-logo.png"
                                alt="visa-logo"
                                width="40px"
                            />
                            <img
                                src="img/amex-logo.png"
                                alt="visa-logo"
                                width="40px"
                            />
                        </div>
                    </form>
                    <a href="#" class="btn payment__btn"
                        >Сплатити</a
                    >
                </div>
            </div>
        </div>
    </div>
</section>
@endsection