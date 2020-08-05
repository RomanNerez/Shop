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
                            Виробник-1
                        </label>
                        <label for="manufacturer-2">
                            <input type="checkbox" name="manufacturer-2" id="manufacturer-2"/>
                            Виробник-2
                        </label>
                        <label for="manufacturer-3">
                            <input type="checkbox" name="manufacturer-3" id="manufacturer-3"/>
                            Виробник-3
                        </label>
                    </fieldset>
                </form>
            </aside>
            <div class="products__list">
            @foreach($subcategories as $items)
                {{$items->title}}
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