<!--file blijft hier staan als backup-->
<section>
    <header>
        <h2>Update Password</h2>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password">
            {{ $errors->updatePassword->first('current_password') }}
        </div>

        <div>
            <label for="update_password_password">New Password</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password">
            {{ $errors->updatePassword->first('password') }}
        </div>

        <div>
            <label for="update_password_password_confirmation">Confirm Password</label>
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
