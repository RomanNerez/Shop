@extends('index')

@section('content')
<section class="item">
    <div class="container">
        <div class="item__wrapper">
            <div class="item__gallery">
                <div class="item__slider">
                    @foreach(json_decode($product->photos) as $photo)
                    <div class="item__slide">
                        <a>
                            <img src="{{url('/storage/'.$photo)}}" alt="{{$photo}}" />
                        </a>
                    </div>
                    @endforeach
                </div>

                <div class="item__thumbnails">
                    @foreach(json_decode($product->photos) as $photo)
                    <div class="item__slide">
                        <a>
                            <img src="{{url('/storage/'.$photo)}}" alt="{{$photo}}" />
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="item__info">
                <h2 class="item__name">{{$product->title}}</h2>
                <div class="product__stars">
                    <button class="star" disabled>
                        <svg width="12px" height="10px">
                            <use href="#star"></use>
                        </svg>
                    </button>
                    <button class="star" disabled>
                        <svg width="12px" height="10px">
                            <use href="#star"></use>
                        </svg>
                    </button>
                    <button class="star" disabled>
                        <svg width="12px" height="10px">
                            <use href="#star"></use>
                        </svg>
                    </button>
                    <button class="star" disabled>
                        <svg width="12px" height="10px">
                            <use href="#star"></use>
                        </svg>
                    </button>
                    <button class="star" disabled>
                        <svg width="12px" height="10px">
                            <use href="#star"></use>
                        </svg>
                    </button>
                </div>
                <p class="item__description">{{$product->description}}</p>
                <div class="item__features">
                    <ul class="item__feature">
                        <li>Матерiaл:<span>{{$product->material}}</span></li>
                        <li>Виробник:<span>{{$product->manufacturer}}</span></li>
                        <li>Бренд:<span>{{$product->material}}</span></li>
                    </ul>
                    <ul class="item__feature">
                        <li>Матерiaл:<span>{{$product->material}}</span></li>
                        <li>Виробник:<span>{{$product->manufacturer}}</span></li>
                        <li>Бренд:<span>{{$product->material}}</span></li>
                    </ul>
                </div>
                <div class="item__price">
                    <span>{{$product->price}} грн.</span> 
                    
                    <div class="item__buttons">
                        <button type="button" class="item__cart btn"
                            v-if="existsCart({{$product->id}})"
                        >
                            <a href="{{route('cart')}}">Добавленно в корзину</a>
                        </button>
                        <button type="button" class="item__cart btn"
                            v-else
                            v-on:click="addToCart({{$product->id}}, countCart)"
                        >
                        <svg width="25px" height="15px" fill="#fff"> 
                            <use href="#cart"></use>
                        </svg>
                        Додати
                        </button>
                    </div>
                </div>
                <div class="item__tabs">
                    <div class="tab-links">
                        <a href="#" v-for="(tab, index) in tabs" v-on:click.prevent="selectedTab = tab.id" :key = "index" class="current-tab">@{{tab.title}}</a>
                    </div>
                    <div class="tab-content" id="tab1" v-if="selectedTab == 1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio hic, amet voluptatum aut tempora quibusdam pariatur accusamus asperiores voluptate laudantium eveniet mollitia commodi delectus exercitationem architecto nostrum ratione eos eligendi aperiam dolorum saepe quos rem? Modi sequi voluptatum voluptatibus sit!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio hic, amet voluptatum aut tempora quibusdam pariatur accusamus asperiores voluptate laudantium eveniet mollitia commodi delectus exercitationem architecto nostrum ratione eos eligendi aperiam dolorum saepe quos rem? Modi sequi voluptatum voluptatibus sit!</p>
                    </div>
                    <div class="tab-content" id="tab2" v-if = "selectedTab == 2">
                        
                        <div class="feedbacks">
                            <div class="feedbacks__wrapper">
                                <div class="feedbacks__item">
                                    <blockquote class="feedbacks__text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, iusto.
                                    </blockquote>
                                    <cite class="feedbacks__author">
                                        <i>John Smith</i> <time datetime="20/10/2020">20 Жовтня 2020</time>
                                    </cite>
                                </div>
                                <div class="feedbacks__item">
                                    <blockquote class="feedbacks__text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, iusto.
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, optio?
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis iure quam, rerum aut, ratione numquam beatae voluptates, vitae porro ex dolore itaque. Numquam animi repellat possimus et quae magnam. Perspiciatis?
                                    </blockquote>
                                    <cite class="feedbacks__author">
                                        <i>John Lennon</i> <time datetime="21/10/2020">21 Жовтня 2020</time>
                                    </cite>
                                </div>
                                <div class="feedbacks__item">
                                    <blockquote class="feedbacks__text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, iusto.
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, optio?
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis iure quam, rerum aut, ratione numquam beatae voluptates, vitae porro ex dolore itaque. Numquam animi repellat possimus et quae magnam. Perspiciatis?
                                    </blockquote>
                                    <cite class="feedbacks__author">
                                        <i>John Lennon</i> <time datetime="21/10/2020">21 Жовтня 2020</time>
                                    </cite>
                                </div>
                            </div>
                            <div class="feedbacks__form">
                                <form method="#">
                                    <label for="feedback">Напишіть ваш відгук</label>
                                    <textarea name="feedback" id="feedback" cols="76" rows="10"></textarea>
                                    <button class="btn" type="submit">Відправити</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
            <div class="products__item product aditional__product">
                <div class="product__img">
                    <img src="{{asset('img/product-1.png')}}" alt="1" />
                </div>
                <h3 class="product__name">Product name</h3>
                <span class="product__price">99.00</span>
                <a class="btn product__btn" href="product.html"
                    >Купити</a
                >
            </div>
            <div class="products__item product aditional__product">
                <div class="product__img">
                    <img src="{{asset('img/product-1.png')}}" alt="1" />
                </div>
                <h3 class="product__name">Product name</h3>
                <span class="product__price">99.00</span>
                <a class="btn product__btn" href="product.html"
                    >Купити</a
                >
            </div>
            <div class="products__item product aditional__product">
                <div class="product__img">
                    <img src="{{asset('img/product-1.png')}}" alt="1" />
                </div>
                <h3 class="product__name">Product name</h3>
                <span class="product__price">99.00</span>
                <a class="btn product__btn" href="product.html"
                    >Купити</a
                >
            </div>
            <div class="products__item product aditional__product">
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
