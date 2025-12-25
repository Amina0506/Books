@extends('layouts.app')

@section('content')
    <section class="profile-info">
        <header>
            <h2>Profile Information</h2>
        </header>

        <div style="display: flex; gap: 100px">
        <div class="info-block">
            <strong>Profile Picture:</strong><br> <br>
            @if($user->profile_photo)
                <img alt="" src="{{ asset('storage/' . $user->profile_photo) }}"  style="border-radius: 50%; object-fit: cover; width: 120px; height: 120px;">
            @else
                <p>No picture uploaded.</p>
            @endif
        </div>


        <div>
        <div class="info-block">
            <strong>Username:</strong>
            <p>{{ $user->username }}</p>
        </div>

        <div class="info-block">
            <strong>Name:</strong>
            <p>{{ $user->name }}</p>
        </div>

        <div class="info-block">
            <strong>Birthday:</strong>
            <p>{{ $user->birthday ?? 'Birthday not set' }}</p>
        </div>

        <div class="info-block">
            <strong>Bio:</strong>
            <p>{{ $user->bio ?? 'Sorry... User has no bio yet :(' }}</p>
        </div>
        </div>
        </div>
        <br>
        @if(auth()->check() && auth()->id() === $user->id)
            <a href="{{ route('profile.edit') }}" style="border: #F7E6A9 solid 2px; border-radius: 5px; padding: 5px">Modify</a>
        @endif

        @if($favorites->isEmpty())
            <p style="margin-top: 30px; font-size: 18px;">No favorite books yet.</p>
        @else
            <div style="display: flex; flex-direction: column; gap: 20px; margin-top: 20px;">
                @foreach($favorites as $favorite)
                    <div style="display: flex; border: 2px solid #F7E6A9; border-radius: 8px; padding: 16px; background-color: #F7E6A9; box-shadow: 2px 2px 6px rgba(0,0,0,0.1); gap: 16px; color: #8A6674FF">

                        @if($favorite->book->cover_image)
                            <img src="{{ asset('storage/' . $favorite->book->cover_image) }}"
                                 alt="{{ $favorite->book->title }}"
                                 style="width: 120px; height: 180px; object-fit: cover; border-radius: 4px;">
                        @endif

                        <div style="flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                            <div>
                                <h3 style="font-size: 20px; font-weight: bold; margin-bottom: 8px;">{{ $favorite->book->title }}</h3>
                                <p style="margin-bottom: 6px;"><strong>Author:</strong> <br> {{ $favorite->book->author }}</p>
                                <p style="font-size: 14px; color: #555; text-align: justify;">{{ $favorite->book->description }}</p>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('favorite.destroy', $favorite->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="padding:6px 12px; border:2px solid #F7E6A9; border-radius:4px; background-color:#F7E6A9; color: #8A6674FF">
                            Remove
                        </button>
                    </form>
                @endforeach
            </div>
        @endif

    </section>
@endsection
