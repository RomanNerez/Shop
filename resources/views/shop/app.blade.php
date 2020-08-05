@extends('index')

@section('content')
    <section class="hero">
        <section class="hero__categories">
            <h2 class="">
                <svg>
                    <use xlink:href="#arrow-down"></use>
                </svg>
                Категорii
            </h2>
            <ul class="categories">
                @foreach($categories as $category)
                <li class="categories__item">
                    <a class="categories__link" 
                        href="{{
                            route('product-list', ['category' => $category->slug])
                        }}"
                    >
                        {{$category->title}}
                    </a>
                    <ul class="categories__inner">
                        @foreach($category->sub_categories as $sub_category)
                        <li>
                            <a class="categories__link product__link" 
                                href="{{
                                    route('products', 
                                        [
                                            'category' => $category->slug, 
                                            'subcategory' => $sub_category->slug
                                        ]   
                                    )
                                }}"
                            >
                                {{$sub_category->title}}
                                (<span class="poduct__quantity">
                                    {{$sub_category->products->count()}}
                                </span>)
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </section>
        <div class="hero__slider">
            <div class="slide ibg">
                <img src="{{asset('img/slider-bg.jpg')}}" alt="Slider-background" />
            </div>
            <div class="slide ibg">
                <img src="{{asset('img/slider-bg-20.jpg')}}" alt="Slider-background" />
            </div>
            <div class="slide ibg">
                <img src="{{asset('img/slider-bg-30.jpg')}}" alt="Slider-background" />
            </div>
        </div>
    </section>

    <section class="portfolio">
        <div class="container">
            <div class="portfolio__title section__title">
                <h3>Популярнi товари</h3>
                <p>добірка кращих товарів за категоріями</p>
            </div>
            <div class="portfolio__cagtegories">
                <ul class="portfolio__list">
                    <li><a href="#" class="categorie">Всi</a></li>
                    <li>
                        <a href="#" class="categorie">Чехли</a>
                    </li>
                    <li>
                        <a href="#" class="categorie"
                            >Технiчнi аксесуари</a
                        >
                    </li>
                    <li>
                        <a href="#" class="categorie">Музика</a>
                    </li>
                    <li>
                        <a href="#" class="categorie"
                            >Носимi аксесуари</a
                        >
                    </li>
                    <li><a href="#" class="categorie">Iнше</a></li>
                </ul>
            </div>
            <div class="portfolio__wrapper">
                <div class="product">
                    <div class="product__img">
                        <img src="img/cover-1.jpg" alt="1" />
                    </div>
                    <h3 class="product__name">
                        Product name Lorem ipsum dolor sit.
                    </h3>
                    <span class="product__price">99.00</span>
                    <a class="btn product__btn" href="product.html"
                        >Купити</a
                    >
                </div>
                <div class="product">
                    <div class="product__img">
                        <img src="img/cover-1.jpg" alt="1" />
                    </div>
                    <h3 class="product__name">Product name</h3>
                    <span class="product__price">99.00</span>
                    <a class="btn product__btn" href="product.html"
                        >Купити</a
                    >
                </div>
                <div class="product">
                    <div class="product__img">
                        <img src="img/cover-1.jpg" alt="1" />
                    </div>
                    <h3 class="product__name">Product name</h3>
                    <span class="product__price">99.00</span>
                    <a class="btn product__btn" href="product.html"
                        >Купити</a
                    >
                </div>
                <div class="product">
                    <div class="product__img">
                        <img src="img/cover-1.jpg" alt="1" />
                    </div>
                    <h3 class="product__name">Product name</h3>
                    <span class="product__price">99.00</span>
                    <a class="btn product__btn" href="product.html"
                        >Купити</a
                    >
                </div>
                <div class="product">
                    <div class="product__img">
                        <img src="img/cover-1.jpg" alt="1" />
                    </div>
                    <h3 class="product__name">Product name</h3>
                    <span class="product__price">99.00</span>
                    <a class="btn product__btn" href="product.html"
                        >Купити</a
                    >
                </div>
                <div class="product">
                    <div class="product__img">
                        <img src="img/cover-1.jpg" alt="1" />
                    </div>
                    <h3 class="product__name">Product name</h3>
                    <span class="product__price">99.00</span>
                    <a class="btn product__btn" href="product.html"
                        >Купити</a
                    >
                </div>
            </div>
        </div>

        <button class="btn portfolio__btn">Бiльше товарiв</button>
    </section>

    <section class="brands">
        <div class="container">
            <div class="brands__slider">
                <div class="brands__slide">
                    <img src="img/brand-1.png" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="img/brand-2.png" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="img/brand-3.png" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="img/brand-4.png" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="img/brand-5.png" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="img/brand-1.png" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="img/brand-2.png" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="img/brand-3.png" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="img/brand-4.png" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="img/brand-5.png" alt="brand-image" />
                </div>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="features__title section__title">
                <h3 class="promo__title">
                    Чому вигідно купувати з Freeze
                </h3>
                <p class="promo__text">
                    Qualitative PSD Template With Unlimited
                    Possibilities
                </p>
            </div>
            <div class="features__wrapper">
                <div class="feature">
                    <span class="feature__icon">
                        <svg>
                            <use xlink:href="#leaf"></use>
                        </svg>
                    </span>
                    <h3 class="feature__title">якість</h3>
                    <p class="feature__text">
                        Lorem ipsum dolor sit amet, consectetuer
                        adipiscing elit, sed diam nonummy nibh
                        euismod tincidunyt dolore.
                    </p>
                </div>
                <div class="feature">
                    <span class="feature__icon">
                        <svg>
                            <use xlink:href="#sun"></use>
                        </svg>
                    </span>
                    <h3 class="feature__title">швидка доставка</h3>
                    <p class="feature__text">
                        Lorem ipsum dolor sit amet, consectetuer
                        adipiscing elit, sed diam nonummy nibh
                        euismod tincidunyt dolore.
                    </p>
                </div>
                <div class="feature">
                    <span class="feature__icon">
                        <svg>
                            <use xlink:href="#gear"></use>
                        </svg>
                    </span>
                    <h3 class="feature__title">гарантія</h3>
                    <p class="feature__text">
                        Lorem ipsum dolor sit amet, consectetuer
                        adipiscing elit, sed diam nonummy nibh
                        euismod tincidunyt dolore.
                    </p>
                </div>
                <div class="feature">
                    <span class="feature__icon">
                        <svg>
                            <use xlink:href="#tablet"></use>
                        </svg>
                    </span>
                    <h3 class="feature__title">найкращі бренди</h3>
                    <p class="feature__text">
                        Lorem ipsum dolor sit amet, consectetuer
                        adipiscing elit, sed diam nonummy nibh
                        euismod tincidunyt dolore.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="stuff">
        <div class="container">
            <div class="section__title">
                <h3>Цікаві факти про нас</h3>
            </div>

            <div class="stuff__wrapper">
                <div class="stuff__item">
                    <div class="stuff__stat">
                        <span>6587</span>
                    </div>
                    <h4>Задоволені клієнти</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer
                        adipiscing elit sed diam.
                    </p>
                </div>
                <div class="stuff__item">
                    <div class="stuff__stat">
                        <span>6587</span>
                    </div>
                    <h4>проданий товар</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer
                        adipiscing elit sed diam.
                    </p>
                </div>
                <div class="stuff__item">
                    <div class="stuff__stat">
                        <span>6587</span>
                    </div>
                    <h4>Подобається в instagram</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer
                        adipiscing elit sed diam.
                    </p>
                </div>
                <div class="stuff__item">
                    <div class="stuff__stat">
                        <span>6587</span>
                    </div>
                    <h4>We launched</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer
                        adipiscing elit sed diam.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection