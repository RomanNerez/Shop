@extends('layouts.app')

@section('content')
<section class="login">
    <div class="login__wrapper">
        <div class="container">
            <div class="login__form">
                <div class="login__logo">
                    <a class="login__" href="index.html">
                        <b class="logo__red">free</b
                        ><span>Z</span>
                    </a>
                    <a class="login__exit" href="{{ url('/') }}"
                        >На головну</a
                    >
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input
                        type="text"
                        placeholder="Имя"
                        class="login__email @error('name') is-invalid @enderror"
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
                <p class="login__or">{{__('Or')}}</p>
                
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn login__register">{{__('Log in')}}</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
