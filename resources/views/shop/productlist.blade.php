@extends('index') @section('content')
<main class="products">
    <div class="container">
        <div class="breadcrumbs">
            <ul class="breadcrumbs__wrapper">
                <li class="breadcrumbs__item">
                    <a>
                        <svg>
                            <use xlink:href="#home"></use>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumbs__item">
                    <a>Захисники екранiв</a>
                </li>
            </ul>
        </div>
        <div class="products__wrapper">
            <aside class="products__filter filter">
                <div class="aside__heading">
                    <span>Фiльтр:</span>
                </div>
                <form action="#" class="products__form">
                    <fieldset class="manufacturer">
                        <legend>Виробник:</legend>
                        @foreach($subcategories as $items)
                        <label for="{{$items->title}}">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="{{$items->title}}"
                            />
                            <i></i>
                            {{$items->title}}
                        </label>
                        @endforeach
                    </fieldset>
                </form>
            </aside>
            <div class="products__list">
                <div class="filter__heading sort">
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
                </div>
                <div class="products__list-wrapper">
                    @foreach($subcategories as $items) @foreach($items->products
                    as $item)
                    <div class="products__item product">
                        <div class="product__img">
                            <img src="{{ asset('img/cover-1.jpg') }}" alt="1" />
                        </div>
                        <h3 class="product__name">{{$item->title}}</h3>
                        <span class="product__price">{{$item->price}}</span>
                        <a
                            class="btn product__btn"
                            href="{{route('producting',
                                        [
                                            'slug' => $item->slug
                                        ]
                                    )}}"
                            >Купити</a
                        >
                    </div>
                    @endforeach @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
