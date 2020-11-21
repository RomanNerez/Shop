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
                <div class="card-header">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <label 
                            for="email" 
                            class="col-md-4 col-form-label text-md-right"
                        >
                            {{ __('E-Mail Address') }}
                        </label>
                        <input 
                            id="email" 
                            type="email" 
                            class="login__email @error('email') is-invalid @enderror" name="email" 
                            value="{{ $email ?? old('email') }}" 
                            required 
                            autocomplete="email" 
                            autofocus
                        >
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="password" class="col-md-4 col-form-label text-md-right">    {{ __('Password') }}
                        </label>
                        <input 
                            id="password" 
                            type="password" 
                            class="login__phone @error('password') is-invalid @enderror"name="password" 
                            required 
                            autocomplete="new-password"
                        >
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label 
                            for="password-confirm" 
                            class="col-md-4 col-form-label text-md-right"
                        >
                            {{ __('Confirm Password') }}
                        </label>
                        <input 
                            id="password-confirm" 
                            type="password" 
                            class="login__phone" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                        >
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn login__btn">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</section>
@endsection
