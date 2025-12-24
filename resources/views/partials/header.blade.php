<header>
    <h1>MyBooks</h1>

    <nav>
        <ul>
            <li>
                @if(Auth::check() && Auth::user()->is_admin)
                    <a href="{{ route('admin.home') }}">Home</a>
                @elseif(Auth::check())
                    <a href="{{ route('dashboard') }}">Home</a>
                @else
                    <a href="{{ url('/') }}">Home</a>
                @endif
            </li>
            <li>
                <a href="{{ auth()->check() && auth()->user()->is_admin
                    ? route('admin.news.index')
                    : url('/nieuws') }}">
                    News
                </a>
            </li>
            @auth
                <li>
                    <a href="{{ route('for-you.index') }}">For You</a>
                </li>
            @endauth
            <li>
                <a href="{{ auth()->check() && auth()->user()->is_admin
                    ? route('admin.faq.index')
                    : route('faq.index') }}">
                    FAQ
                </a>
            </li>
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
