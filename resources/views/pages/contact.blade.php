@extends('layouts.app')

@section('content')

    <div class="contact-wrapper">
    <div>
        <h1 style="font-size: 60px">
            @if(session('submitted'))
                Thank you for your message!
            @else
                Have a question?
        </h1>
        <p>Send us a message, we will reply as soon as possible.</p>
            @endif
    </div>

        <div class="line"></div>

    <div class="contact-form">

        <form method="POST" action="{{route('contact.store')}}">
            @csrf

            <div>
                <label for="name"><u>Name</u></label> <br>
                <input type="text" id="name" name="name" required> <br>
            </div>

            <div>
                <label for="email"><u>Email</u></label> <br>
                <input type="email" id="email" name="email" required> <br>
            </div>

            <div>
                <label for="subject"><u>Subject</u></label> <br>
                <input type="text" id="subject" name="subject" required><br>
            </div>

            <div>
                <label for="message"><u>Message</u></label> <br>
                <textarea id="message" name="message" rows=5" required></textarea>
            </div>

            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
    </div>
@endsection
