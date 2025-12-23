@extends('layouts.app')

@section('content')
    <h1 style="font-size: 30px; display: flex; justify-content: center; margin-top: 40px;">
        Manage FAQ Questions
    </h1>

    <div style="display: flex; justify-content: center; gap: 10px; margin-top: 15px;">
        <a href="{{ route('faq.create') }}" style="padding: 10px 15px; font-size: 16px; border-radius: 5px; border: 2px solid #F7E6A9; text-decoration: none;">
            Add New Question
        </a>
        <a href="{{ route('faq-category.index') }}" style="padding: 10px 15px; font-size: 16px; border-radius: 5px; border: 2px solid #F7E6A9; text-decoration: none;">
            Manage Categories
        </a>
    </div>

    <div style="max-width: 900px; margin: 20px auto; overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
            <tr>
                <th style="border-bottom: 1px solid #ccc; padding: 12px;">ID</th>
                <th style="border-bottom: 1px solid #ccc; padding: 12px;">Question</th>
                <th style="border-bottom: 1px solid #ccc; padding: 12px;">Category</th>
                <th style="border-bottom: 1px solid #ccc; padding: 12px;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($faqs as $faq)
                <tr>
                    <td style="padding: 10px; vertical-align: middle;">{{ $faq->id }}</td>
                    <td style="padding: 10px; vertical-align: middle;">{{ $faq->question }}</td>
                    <td style="padding: 10px; vertical-align: middle;">{{ $faq->category->name }}</td>
                    <td style="padding: 10px; vertical-align: middle;">
                        <a href="{{ route('faq.edit', $faq->id) }}" style="padding: 5px 10px; background-color: #F7E6A9FF; color: #8A6674; border-radius: 3px; text-decoration: none; margin-right: 5px;">
                            Edit
                        </a>
                        <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('This will delete the question.')" style="padding: 5px 10px; background-color: #DC3545; color: #fff; border: none; border-radius: 3px; cursor: pointer;">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
