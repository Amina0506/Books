@extends('layouts.admin')

@section('admin-content')
    <h1 style="font-size: 30px; margin-bottom: 20px;">Add New Book</h1>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 600px;">
        @csrf

        <label for="title" style="display: block; font-weight: bold; margin-bottom: 5px;">Title:</label>
        <input type="text" name="title" id="title" required style="width:100%; padding:8px; margin-bottom:12px;">

        <label for="author" style="display: block; font-weight: bold; margin-bottom: 5px;">Author:</label>
        <input type="text" name="author" id="author" required style="width:100%; padding:8px; margin-bottom:12px;">

        <label for="cover_image" style="display: block; font-weight: bold; margin-bottom: 5px;">Cover Image:</label>
        <input type="file" name="cover_image" id="cover_image" required style="margin-bottom:12px;">

        <label for="description" style="display: block; font-weight: bold; margin-bottom: 5px;">Description:</label>
        <textarea name="description" id="description" rows="4" required style="width:100%; padding:8px; margin-bottom:12px;"></textarea>

        <label for="for_you_reason" style="display: block; font-weight: bold; margin-bottom: 5px;">Why "For You":</label>
        <textarea name="for_you_reason" id="for_you_reason" rows="2" required style="width:100%; padding:8px; margin-bottom:12px;"></textarea>

        <label for="themes" style="display: block; font-weight: bold; margin-bottom: 5px;">Themes:</label>

        @foreach ($themes as $theme)
            <div style=" width:100%; padding:8px; color: #53161d; margin-bottom: 20px">
                <input type="checkbox" name="themes[]" value="{{ $theme->id }}"
                    {{ in_array($theme->id, old('themes', $selectedThemes ?? [])) ? 'checked' : '' }}>
                {{ $theme->name }}
            </div>
        @endforeach

        <button type="submit" style="padding:10px 20px; background-color:#F7E6A9FF; color:#8A6674; border:none; border-radius:5px;">
            Add Book
        </button>
    </form>
@endsection
