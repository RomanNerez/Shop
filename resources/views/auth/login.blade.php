@extends('layouts.app')

@section('content')
<section class="login">
    <div class="login__wrapper">
        <div class="container">
            <div class="login__form">
                <div class="login__logo">
                    <a class="login__image" href="{{ url('/') }}">
                        <img src="{{asset('img/Header-logo.png')}}" alt="Slider-background" width="90px" />
                    </a>
                    <a class="login__exit" href="{{ url('/') }}"
                        ><span></span>
                    </a>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label for="email">Ім'я користувача</label>
                    <input
                        id="email"
                        type="email"
                        placeholder="{{__('Username')}}"
                        class="login__name @error('email') is-invalid @enderror"
                        required
                        name="email" 
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="password">Пароль</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="{{__('Password')}}"
                        class="login__password @error('password') is-invalid @enderror"
                        required
                    />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="login__links">
                        <input type="checkbox" id="login__memory" type="checkbox" name="remember"
                        {{ old('remember') ? 'checked' : '' }}/>
                        <label for="login__memory">{{__('Remember me')}}</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    <button
                        type="submit"
                        class="btn login__btn"
                    >
                        Вхiд
                    </button>
                </form>
                
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="login__register">{{__('Register')}}</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
