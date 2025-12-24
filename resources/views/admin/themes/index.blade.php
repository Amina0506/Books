@extends('layouts.admin')

@section('admin-content')
    <h1 style="font-size: 30px; margin-bottom: 50px;">Themes management</h1>

    <a href="{{ route('themes.create') }}" style="padding:10px 20px; border-radius:5px; background-color:#F7E6A9FF; color:#8A6674; border:none; cursor:pointer;">Add new theme</a>

    <table style="border-collapse: collapse; width: 100%; margin-top: 50px;">
        <thead>
        <tr>
            <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: left;">ID</th>
            <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: left;">Name</th>
            <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: left;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($themes as $theme)
            <tr>
                <td style="padding: 10px; vertical-align: middle;">{{ $theme->id }}</td>
                <td style="padding: 10px; vertical-align: middle;">{{ $theme->name }}</td>
                <td style="padding: 10px; vertical-align: middle;">
                    <a href="{{ route('themes.edit', $theme) }}" style="padding: 5px 10px; background-color: #F7E6A9FF; color: #8A6674; border-radius: 3px; text-decoration: none; margin-right: 5px;">Edit</a>
                    <form action="{{ route('themes.destroy', $theme) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('This will delete the theme.')" style="padding: 5px 10px; background-color: #DC3545; color: #fff; border: none; border-radius: 3px; cursor: pointer;">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
