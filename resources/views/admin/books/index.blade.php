@extends('layouts.admin')

@section('admin-content')
    <h1 style="font-size: 30px; margin-bottom: 20px;">Books Management</h1>

    <a href="{{ route('books.create') }}" style="display:inline-block; padding: 10px 20px; background-color:#F7E6A9FF; color:#8A6674; border-radius:5px; margin-bottom:20px; text-decoration:none;">
        Add New Book
    </a>

    @if(session('success'))
        <p style="margin-bottom: 15px;">{{ session('success') }}</p>
    @endif

    <table style="width:100%; border-collapse: collapse;">
        <thead>
        <tr>
            <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: left;">Title</th>
            <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: left;">Author</th>
            <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: left;">Themes</th>
            <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: left;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($books as $book)
            <tr>
                <td style="padding: 10px;">{{ $book->title }}</td>
                <td style="padding: 10px;">{{ $book->author }}</td>
                <td style="padding: 10px;">
                    @foreach($book->themes as $theme)
                        {{ $theme->name }}@if(!$loop->last), @endif
                    @endforeach
                </td>
                <td style="padding: 10px; vertical-align: middle;">
                    <a href="{{ route('books.edit', $book->id) }}" style="padding: 5px 10px; background-color: #F7E6A9FF; color: #8A6674; border-radius: 3px; text-decoration: none; margin-right: 5px;">
                        Edit
                    </a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('This will delete the book.')" style="padding: 5px 10px; background-color: #DC3545; color: #fff; border: none; border-radius: 3px; cursor: pointer;">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="padding:30px; text-align:center;">No books found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
