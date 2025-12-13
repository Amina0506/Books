@extends('layouts.app')

@section('content')
<section class="profile-info">
    <header>
        <h2>Profile Information</h2>
    </header>

    <form method="post" action="/profile" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <label for="email">Email</label> <br>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div>
            <label for="username">Username</label> <br>
            <input id="username" name="username" type="text" value="{{ old('username', $user->username) }}">

            <!--vanuit stackoverflow-->
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div> @endif

        </div>

        <div>
            <label for="birthday">Birthday</label> <br>
            <input id="birthday" name="birthday" type="date" value="{{ old('birthday', $user->birthday) }}">
        </div>

        <div>
            <label for="profile_picture">Profile Picture</label> <br>
            <input id="profile_picture" name="profile_picture" type="file" accept="image/*">
        </div>

        <div>
            <label for="bio">Bio</label> <br>
            <textarea id="bio" name="bio">{{ old('bio', $user->bio) }}</textarea>
        </div>

        <div>
            <button type="submit">Save</button>
        </div>
    </form>
</section>

<section class="update-password">
    <header>
        <h2>Update Password</h2>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password">Current Password</label> <br>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password">
            {{ $errors->updatePassword->first('current_password') }}
        </div>

        <div>
            <label for="update_password_password">New Password</label> <br>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password">
            {{ $errors->updatePassword->first('password') }}
        </div>

        <div>
            <label for="update_password_password_confirmation">Confirm Password</label> <br>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password">
            {{ $errors->updatePassword->first('password_confirmation') }}
        </div>

        <div>
            <button type="submit">Save password</button>

            @if (session('status') === 'password-updated')
                <p>Saved!</p>
            @endif
        </div>
    </form>
</section>

<section class="delete-account">
    <header>
        <h2>Delete Account</h2>
    </header>

    <form method="post" action="/profile/destroy">
        @csrf
        <input type="hidden" name="_method" value="delete">

        <p>Are you sure you want to delete your account?
            Once the account is deleted, all data will be erased and lost.</p>

        <div>
            <label for="password">Password</label> <br>
            <input id="password" name="password" type="password" required>
        </div>

        <div>
            <button type="button" onclick="document.getElementById('confirm-deletion-modal').style.display='none'">
                Cancel
            </button>

            <button type="submit" style="border: darkred solid 2px; background-color: darkred; border-radius: 5px; padding: 4px">
                Delete Account
            </button>
        </div>
    </form>
</section>
@endsection
