@extends('layouts.app')

@section('content')
    <h1 style="font-size: 30px; display: flex; justify-content: center; margin-top: 40px;">Add New FAQ Category</h1>

    <div style="display: flex; justify-content: center; margin-top: 20px;">
        <a href="{{ route('faq-category.index') }}" style="padding: 10px; font-size: 16px; border-radius: 5px; border: #F7E6A9 2px solid;">Back to Category List</a>
    </div>

    <div style="display: flex; justify-content: center; margin-top: 30px;">
        <form action="{{ route('faq-category.store') }}" method="POST" style="width: 50%;">
            @csrf

            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Category Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                @error('name')
                <div style="color: red; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="display: flex; justify-content: center;">
                <button type="submit" style="padding: 10px; font-size: 16px; border-radius: 5px; border: #F7E6A9 2px solid;">
                    Save Category
                </button>
            </div>
        </form>
    </div>
@endsection
