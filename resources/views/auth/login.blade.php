@extends('layouts.app')

@section('content')
    <!-- Session Status -->
    @if (session('status'))
        <div class="session-status">
            {{ session('status') }}
        </div>
    @endif

    <div class="login-wrapper">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">Email</label> <br>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
            <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label> <br>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            @error('password')
            <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-group">
            <label for="remember_me" cl>
                <input id="remember_me" type="checkbox" name="remember">
                <span>Remember me</span>
            </label>
        </div>

        <div class="form-actions">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"><u>Forgot your password?</u></a>
            @endif
        <br>
        </div>

        <button type="submit" id="login">Log in</button>

        <p class="register-link">
            Nog geen account? <a href="{{ route('register') }}"><u>Registreer hier</u></a>
        </p>
    </form>
    </div>
@endsection
