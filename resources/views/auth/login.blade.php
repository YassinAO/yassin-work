@extends('layouts.admin')

@section('content')
<div class="login-background">
<div class="container">
    <div class="login-container">
    <div class="login-block">
        <h2>Login</h2>
    </div>
    <div class="login-block">
        <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-field">
            <label for="name">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
           </div>

        <div class="login-field">
            <label for="name">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        </div>

        <button type="submit" class="btn-custom btn-login">
            <i class="fas fa-sign-in-alt"></i>
        </button>
        @error('email')
        <span class="error" role="alert">
            {{ $message }}
        </span>
        @enderror
        
        {{-- @if (Route::has('password.request'))
        <a class="btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif --}}
        </form>
        <div class="login-block">
        <h3>“To live with <span class="mark">passion</span> &amp; <span class="mark">integrity</span> 
            and bring out the best in me while striving for my <span class="mark">goals</span>. ”</h3>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
