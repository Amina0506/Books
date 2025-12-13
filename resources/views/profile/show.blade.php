@extends('layouts.app')

@section('content')
    <section class="profile-info">
        <header>
            <h2>Profile Information</h2>
            <p>Your account details</p>
        </header>

        <div class="info-block">
            <strong>Username:</strong>
            <p>{{ $user->username }}</p>
        </div>

        <div class="info-block">
            <strong>Birthday:</strong>
            <p>{{ $user->birthday ?? 'Birthday not set' }}</p>
        </div>

        <div class="info-block">
            <strong>Bio:</strong>
            <p>{{ $user->bio ?? 'Sorry... User has no bio yet :(' }}</p>
        </div>

        <div class="info-block">
            <strong>Profile Picture:</strong><br>
            @if($user->profile_picture)
                <img alt="" src="{{ asset('storage/' . $user->profile_picture) }}" width="120">
            @else
                <p>No picture uploaded.</p>
            @endif
        </div>

        <br>
        @if(auth()->check() && auth()->id() === $user->id)
            <a href="{{ route('profile.edit') }}" style="border: #F7E6A9 solid 2px; border-radius: 5px; padding: 5px">Modify</a>
        @endif
    </section>
@endsection
