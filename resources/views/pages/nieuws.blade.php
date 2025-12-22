@extends('layouts.app')

@section('content')

    <h1 style="font-size: 30px; display: flex; justify-content: center; margin-top: 40px;">News</h1>

    <div class="nieuws-item-wrapper">
        @foreach($news as $item)
            <div class="nieuws-item">
                <h3>
                    <span style="font-size: 25px; display: flex; justify-content: center; color: #5a424c">Title:</span>
                    <span style="font-size: 20px; display: flex; justify-content: center">{{ $item->title }}</span>
                </h3>

                <p>
                    <span style="font-size: 25px; display: flex; justify-content: center; color: #5a424c">Content:</span>
                    <span style="font-size: 20px; text-align: justify; display: flex; justify-content: center;">{{ $item->content }}</span>
                </p>

                <div id="extra-{{ $item->id }}" style="margin-top: 10px; text-align: center;" class="hidden">
                    <p><span style="font-size: 25px; display: flex; justify-content: center; color: #5a424c">Genre:</span>
                        <span style="font-size: 20px; display: flex; justify-content: center;">{{ $item->genre }}</span></p>
                    <p><span style="font-size: 25px; display: flex; justify-content: center; color: #5a424c">Author:</span>
                        <span style="font-size: 20px; display: flex; justify-content: center;">{{ $item->author }}</span></p>
                </div>

                @if ($item->published_at)
                    <p><u>{{ $item->published_at }}</u></p>
                @endif

                @if ($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="" width="400" style="border-radius: 5px; display: block; margin: 0 auto;">
                @endif

                <div style="text-align: center; margin-top: 10px;">
                    <button type="button" onclick="document.getElementById('extra-{{ $item->id }}').classList.toggle('hidden')"
                            style="padding: 5px 10px; border-radius: 5px; background-color: #5a424c; color: white; border: none;">
                        Show details
                    </button>
                </div>
            </div>
        @endforeach
    </div>

@endsection
