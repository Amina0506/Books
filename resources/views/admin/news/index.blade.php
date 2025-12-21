@extends('layouts.app')

@section('content')

    <h1 style="font-size: 30px; display: flex; justify-content: center; margin-top: 40px;">News</h1>

    <div style="display: flex; justify-content: center;">
        <a href="{{ route('admin.news.create') }}">
            <button style="padding: 10px; font-size: 16px; border-radius: 5px; border: #F7E6A9 2px solid; margin-top: 15px">Create news</button>
        </a>
    </div>

    <div class="nieuws-item-wrapper">
    @foreach($news as $item)
        <div class="nieuws-item">
            <h3><span style="font-size: 25px; display: flex; justify-content: center; color: #5a424c">Title:</span>
                <span style="font-size: 20px; display: flex; justify-content: center">{{ $item->title }}</span></h3>

            <p><span style="font-size: 25px; display: flex; justify-content: center; color: #5a424c">Content:</span>
                <span style="font-size: 20px; text-align: justify; display: block;">{{ $item->content }}</span></p>

            <p><u>{{ $item->published_at }}</u></p>

            @if ($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" width="400" style="border-radius: 5px">
            @endif

            <div style="display: flex; gap: 40px">
            <a href="{{ route('admin.news.edit', $item->id) }}">
                <button style="margin-top: 10px; background-color: #5a424c; color: white; padding: 5px 10px; border-radius: 5px; border: none;">
                    Edit
                </button>
            </a>

            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" style="margin-top: 10px; background-color: red; color: white; padding: 5px 10px; border-radius: 5px; border: none;">Delete</button>
            </form></div>
        </div>
    @endforeach
    </div>

@endsection
