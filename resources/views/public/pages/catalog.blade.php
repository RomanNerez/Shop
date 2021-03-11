@extends('public.index') 

@section('content')
<main class="products">
    <div class="container">
        <div class="products__title">
            <h1>Lorem ipsum dolor sit amet.</h1>
            <p class="search-result">Найдено <span>10</span> товаров</p>
        </div>
        <div class="breadcrumbs">
        <div class="breadcrumbs__wrapper">
            @foreach($response['data']['content']['breadcrumbs'] as $item)
                <a href="{{ $item['link'] }}" class="breadcrumbs__item {{ $loop->last ? 'active' : '' }}">{{ $item['name'] }}</a>

                @if (!$loop->last)
                    <p class="breadcrumbs__separator">/</p>
                @endif
            @endforeach
        </div>
    
</div>
        <div class="products__wrapper">
            <aside class="products__filter filter">
                <filter-base
                    :data="items.filters"
                ></filter-base>
            </aside>

            <div class="products__list">
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