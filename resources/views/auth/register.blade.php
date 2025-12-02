@extends('layouts.app')

@section('content')

<div class="register-wrapper">

<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">

        @error('name')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <!-- Email Address -->
    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">

        @error('email')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <!-- Password -->
    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="new-password">

        @error('password')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <!-- Confirm Password -->
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">

        @error('password_confirmation')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <a href="{{ route('login') }}">Already registered?</a>

        <button type="submit">
            Register
        </button>
    </div>
</form>
</div>

@endsection
