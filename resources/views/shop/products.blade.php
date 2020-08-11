@extends('index')

@section('content')
<main class="products">
    <div class="container">
        <div class="products__wrapper">
            <aside class="products__filter filter">
                <form action="#" class="products__form">
                    <fieldset class="manufacturer">
                        <legend>Виробник:</legend>
                        <label for="manufacturer-1">
                            <input type="checkbox" name="manufacturer-1" id="manufacturer-1"/>
                            <i></i>
                            iPhone 6
                        </label>
                    </fieldset>
                </form>
            </aside>
            <div class="products__list">
                @foreach($products as $item)
                    <div class="products__item product">
                        <div class="product__img">
                            <img src="{{asset('img/cover-1.jpg')}}" alt="1" />
                        </div>
                        <h3 class="product__name">{{$item->title}}</h3>
                        <span class="product__price">{{$item->price}}</span>
                        <a class="btn product__btn" 
                            href="
                                {{
                                    route('producting', 
                                        [
                                            'slug' => $item->slug
                                        ]
                                    )
                                }}"
                        >Купити</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection