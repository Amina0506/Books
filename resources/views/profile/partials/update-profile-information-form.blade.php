<!--file blijft hier staan als backup-->
<section>
    <header>
        <h2>Profile Information</h2>
        <p>Update your account.</p>
    </header>

    <form method="post" action="/profile" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus>
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div>
            <label for="username">Username</label>
            <input id="username" name="username" type="text" value="{{ old('username', $user->username) }}">
        </div>

        <div>
            <label for="birthday">Birthday</label>
            <input id="birthday" name="birthday" type="date" value="{{ old('birthday', $user->birthday) }}">
        </div>

        <div>
            <label for="profile_photo">Profile Picture</label>
            <input id="profile_photo" name="profile_photo" type="file" accept="image/*">
        </div>

        <div>
            <label for="bio">Bio</label>
            <textarea id="bio" name="bio">{{ old('bio', $user->bio) }}</textarea>
        </div>

        <div>
            <button type="submit">Save</button>
        </div>
    </form>
</section>
