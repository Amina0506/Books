@extends('layouts.admin')

@section('admin-content')
    <h1 style="font-size: 30px; margin-bottom: 20px;">Add new theme</h1>

    <form action="{{ route('themes.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="name" style="display:block; font-weight:bold; margin-bottom:5px;">Theme name:</label>
            <input type="text" name="name" id="name" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;" required>
        </div>

        <button type="submit" style="padding:10px 20px; border-radius:5px; background-color:#F7E6A9FF; color:#8A6674; border:none; cursor:pointer;">Add</button>
    </form>
@endsection
