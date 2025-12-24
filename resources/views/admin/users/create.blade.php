@extends('layouts.admin')

@section('admin-content')
    <h1 style="font-size: 30px; margin-bottom: 20px;">Create New User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" style="max-width: 500px;">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="name" style="display:block; font-weight:bold; margin-bottom:5px;">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;">
            @error('name')
            <div style="color:red; margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display:block; font-weight:bold; margin-bottom:5px;">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;">
            @error('email')
            <div style="color:red; margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="display:block; font-weight:bold; margin-bottom:5px;">Password</label>
            <input type="password" name="password" id="password" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;">
            @error('password')
            <div style="color:red; margin-top:5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password_confirmation" style="display:block; font-weight:bold; margin-bottom:5px;">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label>
                <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
                Admin privileges
            </label>
        </div>

        <button type="submit" style="padding:10px 20px; border-radius:5px; background-color:#F7E6A9FF; color:#8A6674; border:none; cursor:pointer;">
            Create User
        </button>
    </form>
@endsection
