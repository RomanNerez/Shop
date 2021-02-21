@extends('public.index')

@section('content')
    <section class="hero">
        <section class="hero__categories">
            <h2 class="">
                <svg>
                    <use xlink:href="#notebook"></use>
                </svg>
                Каталог продукції
            </h2>
            <ul class="categories">
                @foreach ($response['header']['menu']['base'] as $category)
                    <li class="categories__item">
                        <a class="categories__link"
                            href="{{$category->url}}"
                        >
                            {{$category->content->title}}
                        </a>
                        @if ( count($category->collection) )
                            <ul class="categories__inner">
                                @foreach ($category->collection as $collection)
                                <li>
                                    <a class="categories__link product__link"
                                        href="{{ $collection->url }}"
                                    >
                                        {{ $collection->content->title }}
                                        <!-- (<span class="poduct__quantity">
                                        </span>) -->
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </section>
        <div class="hero__slider">
            <div class="slide ibg">
                <img src="{{asset('img/powerbank.jpeg')}}" alt="Slider-background" />
            </div>
            <div class="slide ibg">
                <img src="{{asset('img/cable.jpg')}}" alt="Slider-background" />
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
                <div class="product product__pop">
                    <div class="product__img">
                        <img src="/storage/product-1.png" alt="1" />
                    </div>
                    <h3 class="product__name">
                        test
                    </h3>
                    <span class="product__price">test</span>
                    <a class="btn product__btn" href="#">Купити</a>
                </div>
            </div>
        </div>

        <button class="btn portfolio__btn">Бiльше товарiв</button>
    </section>

    <section class="brands">
        <div class="container">
            <div class="brands__slider">
                <div class="brands__slide">
                    <img src="{{asset('img/brand-1.png')}}" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="{{asset('img/brand-2.png')}}" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="{{asset('img/brand-3.png')}}" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="{{asset('img/brand-4.png')}}" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="{{asset('img/brand-5.png')}}" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="{{asset('img/brand-1.png')}}" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="{{asset('img/brand-2.png')}}" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="{{asset('img/brand-3.png')}}" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="{{asset('img/brand-4.png')}}" alt="brand-image" />
                </div>
                <div class="brands__slide">
                    <img src="{{asset('img/brand-5.png')}}" alt="brand-image" />
                </div>
            </div>
        </div>
    </section>
@endsection
