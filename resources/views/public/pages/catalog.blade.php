@extends('public.index') 

@section('content')
<main class="products">
    <div class="container">
        <div class="products__title">
            <h1>Lorem ipsum dolor sit amet.</h1>
            <p class="search-result">Найдено <span>10</span> товаров</p>
        </div>
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
                    <a href="#"
                    >Test</a>
                </li>
                <li class="breadcrumbs__item">
                    <a>Test</a>
                </li>
            </ul>
        </div>
        <div class="products__wrapper">
            <!-- <filter-top
                        :data="filters.selected"
                        :selected="items.filters.selected"
                        :counter="counter.list"
                        :sortable.sync="sortable"
                    >
                    </filter-top> -->
            <aside class="products__filter filter">
                <filter-base
                    :data="items.filters"
                ></filter-base>
                <!--<div class="aside__heading">
                    <span>Фiльтр:</span>
                </div>-->
                <!-- <form action="#" class="products__form">
                    <fieldset class="manufacturer">
                        <legend>Виробник:</legend>
                        <label for="manufacturer-1">
                            <input
                                type="checkbox"
                                name="manufacturer-1"
                                id="manufacturer-1"
                            />
                            <i></i>
                            iPhone 6
                        </label>
                    </fieldset>
                </form> -->
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
                    <template v-if="items.list.length">
                        <product-card
                            v-for="item in items.list"
                            :key="item.id"
                            :data="item"
                        ></product-card>
                    </template>
                    <template v-else>
                        <div class="null-content">
                            <p class="null-content__title">{{ __('Ничего не найдено') }}</p>
                            <p class="null-content__subtitle">{{ __('Поиск по заданным параметрам не дал результатов') }}</p>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection