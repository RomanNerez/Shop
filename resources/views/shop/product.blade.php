@extends('index')

@section('content')
<section class="item">
    <div class="container">
        <div class="item__wrapper">
            <div class="item__gallery">
                <div class="item__slider">
                    <div class="item__slide">
                        <a>
                            <img src="{{asset('img/product-1.png')}}" alt="" />
                        </a>
                    </div>
                    <div class="item__slide">
                        <a>
                            <img src="{{asset('img/product-1.png')}}" alt="" />
                        </a>
                    </div>
                    <div class="item__slide">
                        <a>
                            <img src="{{asset('img/product-1.png')}}" alt="" />
                        </a>
                    </div>

                    <div class="item__slide">
                        <a>
                            <img src="{{asset('img/product-1.png')}}" alt="" />
                        </a>
                    </div>

                    <div class="item__slide">
                        <a>
                            <img src="{{asset('img/product-1.png')}}" alt="" />
                        </a>
                    </div>
                </div>

                <div class="item__thumbnails">
                    <div class="item__slide">
                        <a>
                            <img src="{{asset('img/product-1.png')}}" alt="" />
                        </a>
                    </div>
                    <div class="item__slide">
                        <a>
                            <img src="{{asset('img/product-1.png')}}" alt="" />
                        </a>
                    </div>
                    <div class="item__slide">
                        <a>
                            <img src="{{asset('img/product-1.png')}}" alt="" />
                        </a>
                    </div>

                    <div class="item__slide">
                        <a>
                            <img src="{{asset('img/product-1.png')}}" alt="" />
                        </a>
                    </div>

                    <div class="item__slide">
                        <a>
                            <img src="{{asset('img/product-1.png')}}" alt="" />
                        </a>
                    </div>
                </div>
            </div>

            <div class="item__info">
                <h2 class="item__name">{{$product->title}}</h2>
                <p class="item__description">{{$product->description}}</p>
                <ul class="item__features">
                    <li>Матерiaл:<span>{{$product->material}}</span></li>
                    <li>Виробник:<span>{{$product->manufacturer}}</span></li>
                    <li>Бренд:<span>{{$product->material}}</span></li>
                </ul>
                <div class="item__price">
                    <p>Цiна: <span>{{$product->price}}</span>грн.</p>
                </div>
                <div class="item__quantity">
                    <button class="item__delete">-</button>
                        <span class="item__number">1</span>
                    <button class="item__add">+</button>
                </div>
                <div class="item__buttons">
                    <button type="button" class="item__cart btn"
                        v-if="existsCart({{$product->id}})"
                    >Добавленно в корзину</button>
                    <button type="button" class="item__cart btn"
                        v-else
                        v-on:click="addToCart({{$product->id}})"
                    >В кошик</button>
                    <a type="button" class="item__purchase btn">Купити</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="up-sell">
    <div class="container">
        <div class="section__title">
            <h3>Також вам можуть сподобатись</h3>
            <p>Ми пiдiбрали для вас найкористнiшi товари</p>
        </div>
        <div class="up-sell__wrapper">
            <div class="products__item product">
                <div class="product__img">
                    <img src="{{asset('img/product-1.png')}}" alt="1" />
                </div>
                <h3 class="product__name">Product name</h3>
                <span class="product__price">99.00</span>
                <a class="btn product__btn" href="product.html"
                    >Купити</a
                >
            </div>
            <div class="products__item product">
                <div class="product__img">
                    <img src="{{asset('img/product-1.png')}}" alt="1" />
                </div>
                <h3 class="product__name">Product name</h3>
                <span class="product__price">99.00</span>
                <a class="btn product__btn" href="product.html"
                    >Купити</a
                >
            </div>
            <div class="products__item product">
                <div class="product__img">
                    <img src="{{asset('img/product-1.png')}}" alt="1" />
                </div>
                <h3 class="product__name">Product name</h3>
                <span class="product__price">99.00</span>
                <a class="btn product__btn" href="product.html"
                    >Купити</a
                >
            </div>
            <div class="products__item product">
                <div class="product__img">
                    <img src="{{asset('img/product-1.png')}}" alt="1" />
                </div>
                <h3 class="product__name">Product name</h3>
                <span class="product__price">99.00</span>
                <a class="btn product__btn" href="product.html"
                    >Купити</a
                >
            </div>
        </div>
    </div>
</section>
@endsection