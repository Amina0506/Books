@extends('layouts.app')

@section('content')
    <h1 style="font-size: 30px; display: flex; justify-content: center; margin-top: 40px;">Manage FAQ Categories</h1>

    <div style="display: flex; justify-content: center; margin-top: 20px;">
        <a href="{{ route('faq-category.create') }}" style="padding: 10px; font-size: 16px; border-radius: 5px; border: #F7E6A9 2px solid;">Add New Category</a>
    </div>

    <table style="width: 60%; margin: 20px auto; border-collapse: collapse;">
        <thead>
        <tr style="border-bottom: 2px solid #ccc;">
            <th style="padding: 10px; text-align: left;">ID</th>
            <th style="padding: 10px; text-align: left;">Name</th>
            <th style="padding: 10px; text-align: left;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr style="border-bottom: 1px solid #eee;">
                <td style="padding: 10px;">{{ $category->id }}</td>
                <td style="padding: 10px;">{{ $category->name }}</td>
                <td style="padding: 10px;">
                    <a href="{{ route('faq-category.edit', $category->id) }}" style="padding: 5px 10px; background-color: #F7E6A9FF; color: #8A6674; border-radius: 5px;">Edit</a>
                    <form action="{{ route('faq-category.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('This will delete a category.')" style="padding: 5px 10px; background-color: #DC3545; color: white; border-radius: 5px; cursor: pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
