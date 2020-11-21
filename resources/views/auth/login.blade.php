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
                        >{{__('On the head')}}</a
                    >
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input
                        type="email"
                        placeholder="{{__('Email')}}"
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
                        placeholder="{{__('Password')}}"
                        class="login__phone @error('password') is-invalid @enderror"
                        required
                    />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="checkbox" id="login__memory" type="checkbox" name="remember"
                        {{ old('remember') ? 'checked' : '' }}
                    />
                    <label for="login__memory">{{__('Remember me')}}</label><br>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <button
                        type="submit"
                        class="btn login__btn"
                    >
                        Вхiд
                    </button>
                </form>
                <p class="login__or">{{__('Or')}}</p>
                
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn login__register">{{__('Register')}}</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
