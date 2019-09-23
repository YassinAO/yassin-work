@extends('layouts.admin')

@section('content')
<div class="login-background">
<div class="container">
    <div class="login-container">
    <div class="login-block">
        <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1>Login</h1>
        <div class="login-field">
            <input id="email" placeholder="{{ __('E-Mail Address') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="login-field">
            <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="login-field">
            <button type="submit" class="btn-custom btn-login">
                {{ __('Login') }}
            </button>
            
            @if (Route::has('password.request'))
            <a class="btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </form>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
