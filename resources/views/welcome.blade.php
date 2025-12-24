@extends('layouts.app')

@section('content')
    <section style="background-image: url('{{ asset('build/assets/books-cover.jpg') }}'); background-position: center; width:99% ;height: 500px; display: flex; align-items: center; justify-content: center; text-align: center; color: #fff; border-radius: 15px; margin-top: 10px">
        <div>
            <h1 style="font-size: 48px; font-weight: bold; color: #F7E6A9">MyBooks</h1>
            <p style="font-size: 28px; margin-top: 10px; color: #F7E6A9; margin-bottom: 50px">The perfect place for book lovers</p>
            <a href="{{ route('for-you.index') }}" style="padding: 12px 30px; background-color: #8A6674; color: #F7E6A9; border-radius: 5px; text-decoration: none; font-weight: bold; margin-top: 20px">Explore Books</a>
        </div>
    </section>

    <section style="display: flex; justify-content: center; gap: 200px;">
        <a href="{{ route('pages.nieuws') }}" style="padding: 20px 40px; background-color: #F7E6A9FF; color: #8A6674; border-radius: 5px; font-size: 28px">News</a>
        <a href="{{ route('faq.index') }}" style="padding: 20px 40px; background-color: #F7E6A9FF; color: #8A6674; border-radius: 5px; font-size: 28px">FAQ</a>
        <a href="{{ route('contact.show') }}" style="padding: 20px 40px; background-color: #F7E6A9FF; color: #8A6674; border-radius: 5px; font-size: 28px">Contact</a>
    </section>

    <section style="text-align: center; margin-bottom: 20px; margin-top: 100px">
        <h2 style="font-size: 24px; color: #F7E6A9FF; font-weight: bold;">Discover New People</h2>
        <p style="margin-top: 15px; font-size: 20px">Search for a person's account using their username</p>
    </section>

    <div style="display: flex; justify-content: center; margin-top: 30px;">
        <form action="{{ route('user.search') }}" method="GET">
            <input
                type="text"
                name="username"
                placeholder="Search a username..."
                required
                autofocus
                style="padding: 10px 15px; width: 400px; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 100px"
            >
            <button
                type="submit"
                style="padding: 5px 20px; border-radius: 5px; background-color: #5a424c; color: white; border: none; margin-left: 20px"
            >
                Search
            </button>
        </form>
    </div>

    @if (session('error'))
        <div style="text-align: center; color: #5A424CFF; margin-top: -40px">
            {{ session('error') }}
        </div>
    @endif

    <section style="display: flex; align-items: center; gap: 20px; padding: 50px 50px; background-color: #dddad5; margin-bottom: 40px; border-radius: 20px; width: 80%; color: #8A6674FF">
        <div style="flex:1;">
            <h2 style="font-size: 28px; margin-bottom: 15px;">Our Story</h2>
            <p style="font-size: 20px">We started with a simple idea: to bring people together through stories and inspiration. Our journey is driven by curiosity, creativity, and a passion for making a positive impact.</p>
        </div>
        <div style="flex:1;">
            <img src="{{ asset('build/assets/our-story.jpg') }}" alt="Our Story" style="width:100%; border-radius: 8px;">
        </div>
    </section>

    <section style="display: flex; align-items: center; gap: 20px; padding: 50px 50px; background-color: #dddad5; margin-bottom: 40px; border-radius: 20px; width: 80%; color: #8A6674FF">
        <div style="flex:1;">
            <img src="{{ asset('build/assets/guest.jpg') }}" alt="Guests" style="width:100%; border-radius: 8px;">
        </div>
        <div style="flex:1;">
            <h2 style="font-size: 28px; margin-bottom: 15px;">Perfect for Every Guest</h2>
            <p style="font-size: 20px">Stay updated with the latest news, get answers to your questions in our FAQ, and enjoy exclusive benefits by signing up. Register now to make the most of your experience!</p>
        </div>
    </section>

    <section style="text-align: center; padding: 60px 50px; background-color: #dddad5; border-radius: 20px; width: 80%; color: #8A6674FF">
        <h2 style="font-size: 32px; margin-bottom: 20px;">Join Us Today</h2>
        <a href="{{ route('register') }}" style="padding: 12px 30px; background-color: #F7E6A9FF; color: #8A6674; border-radius: 5px; text-decoration: none; font-weight: bold; margin-right: 15px;">Sign Up</a>
        <a href="{{ route('login') }}" style="padding: 12px 30px; background-color: #8A6674; color: #fff; border-radius: 5px; text-decoration: none; font-weight: bold;">Log In</a>
    </section>
@endsection
