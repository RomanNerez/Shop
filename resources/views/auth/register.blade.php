@extends('layouts.app')

@section('content')
<section class="login">
    <div class="login__wrapper">
        <div class="container">
            <div class="login__form">
                <div class="login__logo">
                    
                    <a class="login__exit" href="{{ url('/') }}"
                        ><span></span></a>
                    <a class="login__image" href="index.html">
                        <img src="{{asset('img/Header-logo.png')}}" alt="Slider-background" width="90px" />
                    </a>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input
                        type="text"
                        placeholder="Имя"
                        class="login__name @error('name') is-invalid @enderror"
                        required
                        name="name" 
                        value="{{ old('name') }}"
                    />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input
                        type="email"
                        placeholder="email"
                        class="login__email @error('email') is-invalid @enderror"
                        required
                        name="email" 
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input
                        class="login__password"
                        type="password"
                        name="password"
                        placeholder="Пароль"
                        class="login__phone @error('password') is-invalid @enderror"
                        required
                    />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input
                        class="login__password"
                        type="password"
                        name="password_confirmation"
                        placeholder="Повторить пароль"
                        class="login__phone"
                        required
                    />
                    <button
                        type="submit"
                        class="btn login__btn"
                    >
                        Реєстрація
                    </button>
                </form>
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="login__register">{{__('Log in')}}</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
