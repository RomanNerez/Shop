@extends('layouts.app')

@section('content')
<section class="login">
    <div class="login__wrapper">
        <div class="container">
            <div class="login__form">
                <div class="login__logo">
<<<<<<< HEAD
                    <a class="login__image" href="index.html">
                        <img src="{{asset('img/Header-logo.png')}}" alt="Cite Logo" width="90px" />
                    </a>
                    <a class="login__exit" href="{{ url('/') }}"
                        ><span></span></a>
=======
                    <a class="login__" href="index.html">
                        <b class="logo__red">free</b
                        ><span>Z</span>
                    </a>
                    <a class="login__exit" href="{{ url('/') }}"
                        >На головну</a
                    >
>>>>>>> 5abcedd2a6523e4d7bfe9471d1d71e16602eef05
                </div>
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
            </div>
        </div>
<<<<<<< HEAD
=======
    </div>
>>>>>>> 5abcedd2a6523e4d7bfe9471d1d71e16602eef05
</section>
@endsection
