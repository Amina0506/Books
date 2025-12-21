@extends('layouts.app')

@section('content')
    <h1 style="font-size: 30px; display: flex; justify-content: center; margin-top: 40px;">Edit News</h1>

    <div style="display: flex; justify-content: center; margin-top: 20px;">
        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" style="width: 400px;" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div style="margin-bottom: 15px;">
                <label for="title" style="font-weight: bold;">Title:</label>
                <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" style="width: 100%; padding: 5px; border-radius: 5px">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="content" style="font-weight: bold;">Content:</label>
                <textarea name="content" id="content" rows="5" style="width: 100%; padding: 5px;">{{ old('content', $news->content) }}</textarea>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="image" style="font-weight: bold;">Image:</label>
                <input type="file" name="image" id="image" style="width: 100%; padding: 5px;">
                @if($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" style="width: 100%; margin-top: 10px; border-radius: 5px;">
                @endif
            </div>

            <div style="margin-bottom: 15px;">
                <label for="genre" style="font-weight: bold;">Genre:</label>
                <textarea name="genre" id="genre" rows="5" style="width: 100%; padding: 5px;">{{ old('genre', $news->genre) }}</textarea>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="author" style="font-weight: bold;">Author:</label>
                <textarea name="author" id="author" rows="5" style="width: 100%; padding: 5px;">{{ old('author', $news->author) }}</textarea>
            </div>

            <div style="display: flex; justify-content: space-between;">
                <a href="{{ route('admin.news.index') }}">
                    <button type="button" style="padding: 5px 10px; border-radius: 5px; background-color: #808080FF; color: white; border: none;">Cancel</button>
                </a>
                <button type="submit" style="padding: 5px 10px; border-radius: 5px; background-color: #5a424c; color: white; border: none;">Update</button>
            </div>
        </form>
    </div>
@endsection
