@extends('layouts.app')

@section('content')
    <div style="margin: 0 auto; padding: 50px;">
        <h1 style="font-size: 32px; font-weight: bold; margin-bottom: 20px;">For You</h1>

        <form method="GET" action="{{ route('for-you.index') }}" style="margin-bottom: 30px;">
            <label for="theme" style="font-weight: bold; display: block; margin-bottom: 8px; font-size: 25px">Filter by theme:</label>
            <select name="theme" id="theme" onchange="this.form.submit()" style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 4px; width: 50%; font-size: 20px; color: #53161d">
                <option value="">All themes</option>
                @foreach ($themes as $theme)
                    <option value="{{ $theme->id }}" {{ request('theme') == $theme->id ? 'selected' : '' }}>
                        {{ $theme->name }}
                    </option>
                @endforeach
            </select>
        </form>

        <div style="display: flex; flex-wrap: wrap; gap: 20px;">
            @forelse ($books as $book)
                <div style="border: 2px outset #F7E6A9FF; border-radius: 6px; padding: 16px; width: calc(33% - 20px); box-sizing: border-box;">
                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" style="width: 100%; height: 300px; object-fit: cover; border-radius: 4px; margin-bottom: 12px;">
                    <h3 style="font-size: 20px; font-weight: bold; margin-bottom: 8px;">{{ $book->title }}</h3>
                    <p style="margin-bottom: 6px;"><strong>Author:</strong> {{ $book->author }}</p>
                    <p style="margin-bottom: 6px; text-align: justify; padding-top: 10px; padding-bottom: 10px">{{  $book->description }}</p>
                    <p style="font-style: italic; color: #555; text-align: justify; border-top: #F7E6A9 2px solid; padding-top: 10px">{{ $book->for_you_reason }}</p>
                </div>
            @empty
                <p style="font-size: 18px">No books found.</p>
            @endforelse
        </div>
    </div>
@endsection
