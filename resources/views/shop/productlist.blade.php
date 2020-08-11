@extends('index')

@section('content')
<main class="products">
    <div class="container">
        <div class="products__wrapper">
            <aside class="products__filter filter">
                <form action="#" class="products__form">
                    <fieldset class="manufacturer">
                        <legend>Виробник:</legend>
                        @foreach($subcategories as $items)
                            <label for="{{$items->title}}">
                                <input type="checkbox" name="manufacturer-1" id="{{$items->title}}"/>
                                <i></i>
                                {{$items->title}}
                            </label>
                        @endforeach
                    </fieldset>
                </form>
            </aside>
            <div class="products__list">
            @foreach($subcategories as $items)
                <!--<div class="brand__name">
                    <h4>{{$items->title}}</h4>
                </div>-->
                    @foreach($items->products as $item)   
                        <div class="products__item product">
                            <div class="product__img">
                                <img src="{{asset('img/cover-1.jpg')}}" alt="1" />
                            </div>
                            <h3 class="product__name">{{$item->title}}</h3>
                            <span class="product__price">{{$item->price}}</span>
                            <a class="btn product__btn" 
                                href="{{route('producting',
                                    [
                                        'slug' => $item->slug
                                    ]
                                )}}">Купити</a>
                        </div>
                    @endforeach
                
            @endforeach
        </div>
        </div>
    </div>
</main>
@endsection