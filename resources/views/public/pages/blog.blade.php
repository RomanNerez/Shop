@extends('index')

@section('content')
<section class="blog">
    <div class="container">
        <div class="blog__wrapper">
            <div class="blog__posts">
                <div class="post ibg">
                    <img src="img/slider-bg-3.jpg" alt="" />
                    <a href="#" class="post__link">
                        <h3>Article name</h3>
                        <p>
                            <time>31.07.2020</time> / posted by
                            <span>Admin</span> / коментарiв
                            <span>99</span>
                        </p>
                    </a>
                </div>
                <div class="post ibg">
                    <img src="img/slider-bg-3.jpg" alt="" />
                    <a href="#" class="post__link">
                        <h3>Article name</h3>
                        <p>
                            <time>31.07.2020</time> / posted by
                            <span>Admin</span> / коментарiв
                            <span>99</span>
                        </p>
                    </a>
                </div>
                <div class="post ibg">
                    <img src="img/slider-bg-3.jpg" alt="" />
                    <a href="#" class="post__link">
                        <h3>Article name</h3>
                        <p>
                            <time>31.07.2020</time> / posted by
                            <span>Admin</span> / коментарiв
                            <span>99</span>
                        </p>
                    </a>
                </div>
                <div class="post ibg">
                    <img src="img/slider-bg-3.jpg" alt="" />
                    <a href="#" class="post__link">
                        <h3>Article name</h3>
                        <p>
                            <time>31.07.2020</time> / posted by
                            <span>Admin</span> / коментарiв
                            <span>99</span>
                        </p>
                    </a>
                </div>
            </div>
            <div class="blog__filter filter">
                <form action="#" class="filter__search">
                    <input type="text" placeholder="пошук" />
                </form>
                <h4 class="filter__title">Категорii</h4>
                <ul class="filter__list">
                    <li class="filter__item">
                        <a class="filter__link" href="#"
                            >Всi статтi <span>99</span>
                        </a>
                    </li>
                    <li class="filter__item">
                        <a class="filter__link" href="#"
                            >Технологii <span>99</span>
                        </a>
                    </li>
                    <li class="filter__item">
                        <a class="filter__link" href="#"
                            >Аксесуари <span>99</span></a
                        >
                    </li>
                    <li class="filter__item">
                        <a class="filter__link" href="#"
                            >IT <span>99</span></a
                        >
                    </li>
                    <li class="filter__item">
                        <a class="filter__link" href="#"
                            >Мобiльнi пристроi
                            <span>99</span></a
                        >
                    </li>
                    <li class="filter__item">
                        <a class="filter__link" href="#"
                            >Iнше <span>99</span></a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection