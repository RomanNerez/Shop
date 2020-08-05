@extends('index')

@section('content')
<section class="about">
    <div class="container">
        <div class="section__title">
            <h3>FreeZ e-commerce</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetuer
                adipiscing elit, sed diam nonummy nibh euismod
                tincidunt ut laoreet dolore magna aliquam erat
                volutpat.
            </p>
        </div>
        <div class="about__wrapper">
            <div class="about__image ibg">
                <img src="{{asset('img/about.jpg')}}" alt="Photo" />
            </div>
            <div class="about__text">
                <b
                    >Nam liber tempor cum soluta nobis eleifend
                    option congue nihil imperdiet doming id quod
                    mazim placerat facer possim assum. Claritas
                    est etiam processus dynamicus, qui
                    sequitur.</b
                >
                <p>
                    Lorem ipsum dolor sit amet, consectetuer
                    adipiscing elit, sed diam nonummy nibh
                    euismod tincidunt ut laoreet dolore magna
                    aliquam erat volutpat. Ut wisi enim ad minim
                    veniam, quis nostrud exerci tation
                    ullamcorper suscipit lobortis nisl ut
                    aliquip ex ea commodo consequat. Duis autem
                    vel eum iriure dolor in hendrerit in
                    vulputate velit esse molestie consequat, vel
                    illum dolore eu feugiat nulla facilisis at
                    vero eros et accumsan et iusto odio
                    dignissim qui blandit praesent luptatum
                    zzril delenit augue. Mirum est notare quam
                    littera gothica, quam nunc putamus parum
                    claram, anteposuerit litterarum formas
                    humanitatis per seacula quarta decima et
                    quinta decima.
                </p>
            </div>
        </div>
        <div class="advantages">
            <div class="advantages__info">
                <h4>Чому обирати нас</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetuer
                    adipiscing elit, sed diam nonummy nibh
                    euismod. Claritas est etiam processus
                    dynamicus, qui sequitur mutationem.
                </p>
                <ul class="advantages__list">
                    <li>
                        Dolor sit amet, consectetuer adipiscing
                        elit.
                    </li>
                    <li>Claritas etiam processus dynamicus.</li>
                    <li>
                        Mirum notare quam littera gothica quam.
                    </li>
                    <li>Eodem modo typi.</li>
                    <li>Nam liber tempor cum soluta.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection