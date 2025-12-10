<!--file blijft hier staan als backup-->
<section>
    <header>
        <h2>Delete Account</h2>
        <p>Warning! Once the account is deleted, all data will be erased and lost.</p>
    </header>

    <button type="button" onclick="document.getElementById('confirm-deletion-modal').style.display='block'" style="border: darkred solid 2px; background-color: darkred; border-radius: 5px; padding: 4px">
        Delete Account
    </button>

    <div id="confirm-deletion-modal" style="display:none;">
        <form method="post" action="/profile/destroy">
            @csrf
            <input type="hidden" name="_method" value="delete">

            <p>Are you sure you want to delete your account?
            Once the account is deleted, all data will be erased and lost.</p>

            <div>
                <label for="password">Password</label>
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
    </div>
</section>
