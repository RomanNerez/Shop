@extends('index') @section('content')
<main class="products">
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
                    <a href="{{
                        route('product-list', 
                            ['category' => $category->slug])
                        }}"
                    >{{$category->title}}</a>
                </li>
                <li class="breadcrumbs__item">
                    <a>{{$sub_category->title}}</a>
                </li>
            </ul>
        </div>
        <div class="products__wrapper">
            <aside class="products__filter filter">
                <!--<div class="aside__heading">
                    <span>Фiльтр:</span>
                </div>-->
                <form action="#" class="products__form">

                    <fieldset class="category">
                        <legend>Категорія</legend>
                        <label for="category-1">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="category-1"
                            />
                            <i></i>
                            iPhone 6
                        </label>
                        <label for="category-2">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="category-2"
                            />
                            <i></i>
                            Sone other phone
                        </label>
                        <label for=category-3">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="category-3"
                            />
                            <i></i>
                            iPhone 99
                        </label>
                        <label for="category-4">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="category-4"
                            />
                            <i></i>
                            Kurwa mat'
                        </label>
                        <label for="category-5">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="category-5"
                            />
                            <i></i>
                            Chuk Norris
                        </label>
                    </fieldset>

                    <fieldset class="manufacturer">
                        <legend>Виробник</legend>
                        <label for="manufacturer-1">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="manufacturer-1"
                            />
                            <i></i>
                            iPhone 6
                        </label>
                        <label for="manufacturer-2">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="manufacturer-2"
                            />
                            <i></i>
                            Sone other phone
                        </label>
                        <label for="manufacturer-3">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="manufacturer-3"
                            />
                            <i></i>
                            iPhone 99
                        </label>
                        <label for="manufacturer-4">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="manufacturer-4"
                            />
                            <i></i>
                            Kurwa mat'
                        </label>
                        <label for="manufacturer-5">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="manufacturer-5"
                            />
                            <i></i>
                            Chuk Norris
                        </label>
                    </fieldset>

                    <fieldset class="rating-stars">
                        <legend>Рейтинг</legend>
                        <label for="stars-5">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="stars-5"
                            />
                            <i></i>
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
                        </label>
                        <label for="stars-4">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="stars-4"
                            />
                            <i></i>
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
                            </div>
                        </label>
                        <label for="stars-3">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="stars-3"
                            />
                            <i></i>
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
                            </div>
                        </label>
                        <label for="stars-2">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="stars-2"
                            />
                            <i></i>
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
                            </div>
                        </label>
                        <label for="stars-1">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="stars-1"
                            />
                            <i></i>
                            <div class="product__stars">
                                <button class="star" disabled>
                                    <svg width="12px" height="10px">
                                        <use href="#star"></use>
                                    </svg>
                                </button>
                            </div>
                        </label>
                    </fieldset>
                    <fieldset class="filter-price">
                        <legend>Ціна</legend>
                            <div class="price-range">
                                <label for="stars-5">
                                    <input
                                        type="text"
                                        name="min-price"
                                        id="min-price"
                                        placeholder="0"
                                    />
                                    <i>Min</i>
                                </label>
                                <span>-</span>
                                <label for="stars-5">
                                    <input
                                        type="text"
                                        name="min-price"
                                        id="min-price"
                                        placeholder="000"
                                    />
                                    <i>Max</i>
                                </label>
                            </div>
                    </fieldset>
                    <button type="submit" class="btn">Готово</button>

                </form>
            </aside>

            <div class="products__list">
                <!--<div class="filter__heading sort">
                    <span>Сортувати:</span>
                    <a type="btn" class="sort__link">
                        <span>За цiною:</span>
                        <div class="sort__arrows">
                            <button
                                type="button"
                                class="arrow arrow__up"
                            ></button>
                            <button
                                type="button"
                                class="arrow arrow__down"
                            ></button>
                        </div>
                    </a>
                    <a type="btn" class="sort__link">
                        <span>За популягнiстю:</span>
                        <div class="sort__arrows">
                            <button
                                type="button"
                                class="arrow arrow__up"
                            ></button>
                            <button
                                type="button"
                                class="arrow arrow__down"
                            ></button>
                        </div>
                    </a>
                </div>-->
                <div class="products__list-wrapper">
                    @foreach($products as $item)
                    <div class="products__item product">
                        <div class="product__img">
                            <img  src="{{ asset('img/cover-1.jpg') }}" alt="1" />
                        </div>
                        <h3 class="product__name">{{$item->title}}</h3>
                        <p class="product__description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, sed.
                        </p>
                        <div class="product__rate">
                            <div class="product__stars">
                                <button class="star">
                                    <svg width="12px" height="10px">
                                        <use href="#star"></use>
                                    </svg>
                                </button>
                                <button class="star">
                                    <svg width="12px" height="10px">
                                        <use href="#star"></use>
                                    </svg>
                                </button>
                                <button class="star">
                                    <svg width="12px" height="10px">
                                        <use href="#star"></use>
                                    </svg>
                                </button>
                                <button class="star">
                                    <svg width="12px" height="10px">
                                        <use href="#star"></use>
                                    </svg>
                                </button>
                                <button class="star">
                                    <svg width="12px" height="10px">
                                        <use href="#star"></use>
                                    </svg>
                                </button>
                            </div>
                            <button id="heart-rate">
                                <svg width="20px" height="15px">
                                    <use href="#heart"></use>
                                </svg> 
                            </button>
                            <button id="bookmark-rate">
                                <svg width="20px" height="15px">
                                    <use href="#bookmark"></use>
                                </svg> 
                            </button>
                        </div>
                        <div class="product__total">
                            <span class="product__price">{{$item->price}} грн.</span>
                            <button class="add-cart">
                                <svg width="30px" height="20px">
                                    <use href="#cart"></use>
                                </svg>
                            </button>
                            <a
                                class="btn product__btn"
                                href="
                                        {{
                                            route('producting', 
                                                [
                                                    'slug' => $item->slug
                                                ]
                                            )
                                        }}"
                                >Купити
                                </a
                            >
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
