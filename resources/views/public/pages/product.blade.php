@extends('public.index')

@section('content')
    <main class="main-border">
        <div class="wrapper">
            <section class="card container">
                @include('public.layouts.breadcrumbs')

                <div class="card__cont">
                    <div class="card__left card__colum">

                        <gallery-item
                            :items="images"
                            :status="status"
                        ></gallery-item>

                        <template>

                            <div class="card-compare__block">
                                <button type="button" class="card-compare__box"
                                        :disabled="data.compare_pending"
                                        :class="{'is-favorites': data.compare_check}"
                                        v-on:click="addToCompare"
                                >
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M25 29V1H29V29M17 29V13.7273H21V29M9 29V8.63636H13V29M1 29V21.3636H5V29M30 29H0" stroke-miterlimit="10"/>
                                    </svg>
                                    <span class="card-compare__box">@{{ __( compareBtn ) }}</span>
                                </button>

                                <button type="button" class="card-compare__box"
                                        :disabled="data.favorites_pending"
                                        :class="{'is-favorites': data.favorites_check}"
                                        v-on:click="addToFavorites"
                                >
                                    <svg width="26" height="31" viewBox="0 0 26 31" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M25 30L13 23.2333L1 30V1H25V30Z" stroke-miterlimit="10"/>
                                    </svg>
                                    <span class="card-compare__box">@{{ __( favoritesBtn ) }}</span>
                                </button>
                            </div>

                            <div class="card__desktop">
                                <button type="button" class="btn-border red text-upper big images"
                                        v-on:click="show.review = !show.review"
                                >
                                    <span class="btn-border__title">{{ __('Оставить отзыв') }}</span>
                                    <span class="btn-border__img">
                                    <svg width="38" height="35" viewBox="0 0 38 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M29.4501 14.9219C33.7251 15.8719 36.8126 19.0187 36.8126 22.7C36.7829 23.8278 36.4943 24.9338 35.9693 25.9324C35.4443 26.931 34.6967 27.7956 33.7845 28.4594L35.6251 33.0312L29.5095 30.4781C28.5934 30.6818 27.6572 30.7814 26.7188 30.775C21.8501 30.775 17.7532 27.9844 16.8032 24.3031M2.375 27.6875L11.5188 23.9469C12.8053 24.2319 14.1198 24.3713 15.4375 24.3625C23.3344 24.3625 29.6875 19.2563 29.6875 12.9625C29.6875 6.66875 23.3344 1.5625 15.4375 1.5625C7.54063 1.5625 1.1875 6.66875 1.1875 12.9625C1.1875 16.1688 2.85 19.0781 5.52187 21.1562L2.375 27.6875Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                </button>
                            </div>
                        </template>
                    </div>

                    <div class="card__right card__colum">
                        <span class="card__product-code">{{ __('Код товара') }}: {{ $response['data']['product']['id'] }}</span>
                        <span class="card__main-title">{{ $response['data']['product']['title'] }}</span>

                        <price-item
                            :data="price"
                        ></price-item>

                        <attr-item
                            :items="data.attr"
                        ></attr-item>

                        <div class="card__row card__order">
                            <template>
                                <div class="quantity">
                                    <div class="quantity__box">
                                        <button type="button" class="quantity__btn"
                                                :disabled="quantity <= data.draw"
                                                v-on:click="--quantity"
                                        >-</button>
                                        <input type="number" class="quantity__input"
                                               :disabled="!count.origin || (count.origin < data.draw && count.origin >= 0)"
                                               v-model.number="quantity"
                                        />
                                        <button type="button" class="quantity__btn"
                                                :disabled="quantity >= count.origin && count.origin >= 0"
                                                v-on:click="++quantity"
                                        >+</button>
                                    </div>
                                    <template v-if="count.origin >= 0">
                                        <span class="quantity__text">{{ __('В наличии') }}: @{{ count.view }} {{ __('шт.') }}</span>
                                    </template>
                                    <template v-if="data.draw > 1">
                                        <span class="quantity__text">{{ __('Мин. кол-во') }}: @{{ data.draw | numFormat(0, '.', ' ') }} {{ __('шт.') }}</span>
                                    </template>
                                </div>

                                <template v-if="data.related_to === 'services'">
                                    <button type="button" class="btn big"
                                            :disabled="validOrder"
                                            v-on:click="show.checkout = true"
                                    >
                                        <span class="btn__titlte">
                                            {{ __('Заказать') }}
                                        </span>
                                    </button>
                                </template>
                                <template v-else>
                                    <button type="button" class="btn big"
                                            :disabled="validOrder || data.cart_pending"
                                            :class="{'is-cart': checkCart}"
                                            v-on:click="addToCart"
                                    >
                                        <span class="btn__titlte">
                                            @{{ __( cartBtn ) }}
                                        </span>
                                    </button>
                                </template>
                            </template>
                        </div>

                        <template v-if="data.related_to !== 'services'">
                            <div class="card__row card__order-phone"
                                 :disabled="validOrder"
                            >
                                <vue-tel-input required
                                               :valid-characters-only="true"
                                               :placeholder="__('Номер телефона')"
                                               :preferred-countries="['UA', 'RU', 'BY', 'KZ']"
                                               wrapper-classes="phone-input"
                                               v-model="phone.input"
                                               v-on:validate="validateNumber"
                                ></vue-tel-input>

                                <button type="button" class="btn-border red text-upper big"
                                        v-on:click="fastOrder"
                                        :disabled="phone.pending"
                                >
                                    <span class="btn-border__title">@{{ __(phone.pending ? 'Обработка...' : 'Купить в один клик') }}</span>
                                </button>
                            </div>
                            <div class="card__row card__row--invalid" v-if="phone.invalid">
                                <span>@{{ __(phone.invalid) }}</span>
                            </div>
                        </template>

                        <template v-if="params[0].title">
                            <params-item
                                :items="params"
                            ></params-item>
                        </template>

                        <div class="card__mobile">
                            <button type="button" class="btn-border red text-upper big images">
                                <span class="btn-border__title">{{ __('Оставить отзыв') }}</span>
                                <span class="btn-border__img">
                                    <svg width="38" height="35" viewBox="0 0 38 35" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M29.4501 14.9219C33.7251 15.8719 36.8126 19.0187 36.8126 22.7C36.7829 23.8278 36.4943 24.9338 35.9693 25.9324C35.4443 26.931 34.6967 27.7956 33.7845 28.4594L35.6251 33.0312L29.5095 30.4781C28.5934 30.6818 27.6572 30.7814 26.7188 30.775C21.8501 30.775 17.7532 27.9844 16.8032 24.3031M2.375 27.6875L11.5188 23.9469C12.8053 24.2319 14.1198 24.3713 15.4375 24.3625C23.3344 24.3625 29.6875 19.2563 29.6875 12.9625C29.6875 6.66875 23.3344 1.5625 15.4375 1.5625C7.54063 1.5625 1.1875 6.66875 1.1875 12.9625C1.1875 16.1688 2.85 19.0781 5.52187 21.1562L2.375 27.6875Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

                <review-form
                    :product="data.id"
                    :show.sync="show.review"
                ></review-form>

                <div class="card__description">
                    <div class="editor-output" v-html="desc">
                        {!! $response['data']['content']['body']['desc'] !!}
                    </div>
                </div>
            </section>

            <review-list
                v-if="reviews.length"
                :items="reviews"
            ></review-list>

            <related-item
                :data="data.related"
                :id="data.id"
            ></related-item>

            <template v-if="data.related_to === 'services'">
                <checkout-service
                    :show.sync="show.checkout"
                ></checkout-service>
            </template>
        </div>
    </main>
{{--<section class="item">--}}
{{--    <div class="container">--}}
{{--        <div class="item__wrapper">--}}
{{--            <div class="item__gallery">--}}
{{--                <div class="item__slider">--}}
{{--                    @foreach(json_decode($product->photos) as $photo)--}}
{{--                    <div class="item__slide">--}}
{{--                        <a>--}}
{{--                            <img src="{{url('/storage/'.$photo)}}" alt="{{$photo}}" />--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}

{{--                <div class="item__thumbnails">--}}
{{--                    @foreach(json_decode($product->photos) as $photo)--}}
{{--                    <div class="item__slide">--}}
{{--                        <a>--}}
{{--                            <img src="{{url('/storage/'.$photo)}}" alt="{{$photo}}" />--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="item__info">--}}
{{--                <h2 class="item__name">{{$product->title}}</h2>--}}
{{--                <div class="product__stars">--}}
{{--                    <button class="star" disabled>--}}
{{--                        <svg width="12px" height="10px">--}}
{{--                            <use href="#star"></use>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <button class="star" disabled>--}}
{{--                        <svg width="12px" height="10px">--}}
{{--                            <use href="#star"></use>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <button class="star" disabled>--}}
{{--                        <svg width="12px" height="10px">--}}
{{--                            <use href="#star"></use>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <button class="star" disabled>--}}
{{--                        <svg width="12px" height="10px">--}}
{{--                            <use href="#star"></use>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <button class="star" disabled>--}}
{{--                        <svg width="12px" height="10px">--}}
{{--                            <use href="#star"></use>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <p class="item__description">{{$product->description}}</p>--}}
{{--                <div class="item__features">--}}
{{--                    <ul class="item__feature">--}}
{{--                        <li>Матерiaл:<span>{{$product->material}}</span></li>--}}
{{--                        <li>Виробник:<span>{{$product->manufacturer}}</span></li>--}}
{{--                        <li>Бренд:<span>{{$product->material}}</span></li>--}}
{{--                    </ul>--}}
{{--                    <ul class="item__feature">--}}
{{--                        <li>Матерiaл:<span>{{$product->material}}</span></li>--}}
{{--                        <li>Виробник:<span>{{$product->manufacturer}}</span></li>--}}
{{--                        <li>Бренд:<span>{{$product->material}}</span></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="item__price">--}}
{{--                    <span>{{$product->price}} грн.</span> --}}
{{--                    --}}
{{--                    <div class="item__buttons">--}}
{{--                        <button type="button" class="item__cart btn"--}}
{{--                            v-if="existsCart({{$product->id}})"--}}
{{--                        >--}}
{{--                            <a href="{{route('cart')}}">Добавленно в корзину</a>--}}
{{--                        </button>--}}
{{--                        <button type="button" class="item__cart btn"--}}
{{--                            v-else--}}
{{--                            v-on:click="addToCart({{$product->id}}, countCart)"--}}
{{--                        >--}}
{{--                        <svg width="25px" height="15px" fill="#fff"> --}}
{{--                            <use href="#cart"></use>--}}
{{--                        </svg>--}}
{{--                        Додати--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="item__tabs">--}}
{{--                    <div class="tab-links">--}}
{{--                        <a href="#" v-for="(tab, index) in tabs" v-on:click.prevent="selectedTab = tab.id" :key = "index" class="current-tab">@{{tab.title}}</a>--}}
{{--                    </div>--}}
{{--                    <div class="tab-content" id="tab1" v-if="selectedTab == 1">--}}
{{--                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio hic, amet voluptatum aut tempora quibusdam pariatur accusamus asperiores voluptate laudantium eveniet mollitia commodi delectus exercitationem architecto nostrum ratione eos eligendi aperiam dolorum saepe quos rem? Modi sequi voluptatum voluptatibus sit!</p>--}}
{{--                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio hic, amet voluptatum aut tempora quibusdam pariatur accusamus asperiores voluptate laudantium eveniet mollitia commodi delectus exercitationem architecto nostrum ratione eos eligendi aperiam dolorum saepe quos rem? Modi sequi voluptatum voluptatibus sit!</p>--}}
{{--                    </div>--}}
{{--                    <div class="tab-content" id="tab2" v-if = "selectedTab == 2">--}}
{{--                        --}}
{{--                        <div class="feedbacks">--}}
{{--                            <div class="feedbacks__wrapper">--}}
{{--                                <div class="feedbacks__item">--}}
{{--                                    <blockquote class="feedbacks__text">--}}
{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, iusto.--}}
{{--                                    </blockquote>--}}
{{--                                    <cite class="feedbacks__author">--}}
{{--                                        <i>John Smith</i> <time datetime="20/10/2020">20 Жовтня 2020</time>--}}
{{--                                    </cite>--}}
{{--                                </div>--}}
{{--                                <div class="feedbacks__item">--}}
{{--                                    <blockquote class="feedbacks__text">--}}
{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, iusto.--}}
{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, optio?--}}
{{--                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis iure quam, rerum aut, ratione numquam beatae voluptates, vitae porro ex dolore itaque. Numquam animi repellat possimus et quae magnam. Perspiciatis?--}}
{{--                                    </blockquote>--}}
{{--                                    <cite class="feedbacks__author">--}}
{{--                                        <i>John Lennon</i> <time datetime="21/10/2020">21 Жовтня 2020</time>--}}
{{--                                    </cite>--}}
{{--                                </div>--}}
{{--                                <div class="feedbacks__item">--}}
{{--                                    <blockquote class="feedbacks__text">--}}
{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, iusto.--}}
{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, optio?--}}
{{--                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis iure quam, rerum aut, ratione numquam beatae voluptates, vitae porro ex dolore itaque. Numquam animi repellat possimus et quae magnam. Perspiciatis?--}}
{{--                                    </blockquote>--}}
{{--                                    <cite class="feedbacks__author">--}}
{{--                                        <i>John Lennon</i> <time datetime="21/10/2020">21 Жовтня 2020</time>--}}
{{--                                    </cite>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="feedbacks__form">--}}
{{--                                <form method="#">--}}
{{--                                    <label for="feedback">Напишіть ваш відгук</label>--}}
{{--                                    <textarea name="feedback" id="feedback" cols="76" rows="10"></textarea>--}}
{{--                                    <button class="btn" type="submit">Відправити</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<section class="up-sell">--}}
{{--    <div class="container">--}}
{{--        <div class="section__title">--}}
{{--            <h3>Також вам можуть сподобатись</h3>--}}
{{--            <p>Ми пiдiбрали для вас найкористнiшi товари</p>--}}
{{--        </div>--}}
{{--        <div class="up-sell__wrapper">--}}
{{--            <div class="products__item product aditional__product">--}}
{{--                <div class="product__img">--}}
{{--                    <img src="{{asset('img/product-1.png')}}" alt="1" />--}}
{{--                </div>--}}
{{--                <h3 class="product__name">Product name</h3>--}}
{{--                <span class="product__price">99.00</span>--}}
{{--                <a class="btn product__btn" href="product.html"--}}
{{--                    >Купити</a--}}
{{--                >--}}
{{--            </div>--}}
{{--            <div class="products__item product aditional__product">--}}
{{--                <div class="product__img">--}}
{{--                    <img src="{{asset('img/product-1.png')}}" alt="1" />--}}
{{--                </div>--}}
{{--                <h3 class="product__name">Product name</h3>--}}
{{--                <span class="product__price">99.00</span>--}}
{{--                <a class="btn product__btn" href="product.html"--}}
{{--                    >Купити</a--}}
{{--                >--}}
{{--            </div>--}}
{{--            <div class="products__item product aditional__product">--}}
{{--                <div class="product__img">--}}
{{--                    <img src="{{asset('img/product-1.png')}}" alt="1" />--}}
{{--                </div>--}}
{{--                <h3 class="product__name">Product name</h3>--}}
{{--                <span class="product__price">99.00</span>--}}
{{--                <a class="btn product__btn" href="product.html"--}}
{{--                    >Купити</a--}}
{{--                >--}}
{{--            </div>--}}
{{--            <div class="products__item product aditional__product">--}}
{{--                <div class="product__img">--}}
{{--                    <img src="{{asset('img/product-1.png')}}" alt="1" />--}}
{{--                </div>--}}
{{--                <h3 class="product__name">Product name</h3>--}}
{{--                <span class="product__price">99.00</span>--}}
{{--                <a class="btn product__btn" href="product.html"--}}
{{--                    >Купити</a--}}
{{--                >--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
@endsection
