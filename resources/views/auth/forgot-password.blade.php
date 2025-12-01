@extends('layouts.app')

@section('content')
    <div class="forgot-password-wrapper">


    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <label for="email" >
                Email
            </label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
            >

            @error('email')
            <span>{{ $message }}</span>
            @enderror
            <p>Get a new password by clicking on the link<p>
        </div>

        <div>
            <button type="submit">
                Email Password Reset Link
            </button>
        </div>
    </form>
    </div>
@endsection
