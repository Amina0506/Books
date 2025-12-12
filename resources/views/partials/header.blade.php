<header>
    <h1>MyBooks</h1>

    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/nieuws') }}">Nieuws</a></li>
            <li><a href="{{ url('/faq') }}">FAQ</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
            <li><a href="{{ url('/profile') }}">Profiel</a></li>

            <!--voor niet ingelogde gebruiker-->
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
            @endguest

            <!--voor ingelogde gebruikers-->
            @auth
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>
