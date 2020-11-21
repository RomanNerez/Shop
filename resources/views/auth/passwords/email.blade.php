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
                <div class="card-header">{{ __('Введите E-mail') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input 
                                    id="email" 
                                    type="email" 
                                    class="login__email @error('email') is-invalid @enderror" name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="email" 
                                    autofocus
                                    placeholder="email"
                                >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn login__btn">
                                    {{ __('Восстановить') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</section>
@endsection
