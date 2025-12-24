@extends('layouts.admin')

@section('admin-content')
    <h1 style="font-size: 30px; display: flex; justify-content: center; margin-top: 40px;">Edit theme</h1>

    <div style="display: flex; justify-content: center; margin-top: 30px;">
        <form action="{{ route('themes.update', $theme) }}" method="POST" style="width: 50%;">
            @csrf
            @method('PATCH')

            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Theme name:</label>
                <input type="text" name="name" id="name" value="{{ $theme->name }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="display: flex; justify-content: center;">
                <button type="submit" style="padding: 10px; font-size: 16px; border-radius: 5px; border: 2px solid #F7E6A9; background-color: #F7E6A9FF; color: #8A6674;">Save</button>
            </div>
    </form>
    </div>

@endsection
