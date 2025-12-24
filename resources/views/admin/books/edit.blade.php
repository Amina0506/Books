@extends('layouts.admin')

@section('admin-content')
    <h1 style="font-size: 30px; margin-bottom: 20px;">Edit Book</h1>

    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data" style="max-width: 600px;">
        @csrf
        @method('PUT')

        <label for="title" style="display: block; font-weight: bold; margin-bottom: 5px;">Title:</label>
        <input type="text" name="title" id="title" value="{{ $book->title }}" required style="width:100%; padding:8px; margin-bottom:12px;">

        <label for="author" style="display: block; font-weight: bold; margin-bottom: 5px;">Author:</label>
        <input type="text" name="author" id="author" value="{{ $book->author }}" required style="width:100%; padding:8px; margin-bottom:12px;">

        <label for="cover_image" style="display: block; font-weight: bold; margin-bottom: 5px;">Cover Image:</label>
        <input type="file" name="cover_image" id="cover_image" style="margin-bottom:12px;">
        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" style="width:150px; height:200px; object-fit:cover; display:block; margin-bottom:12px;">

        <label for="description" style="display: block; font-weight: bold; margin-bottom: 5px;">Description:</label>
        <textarea name="description" id="description" rows="4" required style="width:100%; padding:8px; margin-bottom:12px;">{{ $book->description }}</textarea>

        <label for="for_you_reason" style="display: block; font-weight: bold; margin-bottom: 5px;">Why "For You":</label>
        <textarea name="for_you_reason" id="for_you_reason" rows="2" required style="width:100%; padding:8px; margin-bottom:12px;">{{ $book->for_you_reason }}</textarea>

        <label for="themes" style="display: block; font-weight: bold; margin-bottom: 5px;">Themes:</label>
        @foreach ($themes as $theme)
            <div style=" width:100%; padding:8px; color: #53161d; margin-bottom: 20px">
                <input type="checkbox" name="themes[]" value="{{ $theme->id }}"
                    {{ in_array($theme->id, old('themes', $selectedThemes ?? [])) ? 'checked' : '' }}>
                {{ $theme->name }}
            </div>
        @endforeach

        <button type="submit" style="padding:10px 20px; background-color:#F7E6A9FF; color:#8A6674; border:none; border-radius:5px;">
            Update Book
        </button>
    </form>
@endsection
