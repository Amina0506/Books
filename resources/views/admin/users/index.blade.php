@extends('layouts.admin')

@section('admin-content')
    <h1 style="font-size: 30px; margin-bottom: 20px;">Manage users</h1>

    <table style="border-collapse: collapse; width: 100%; margin-top: 10px;">
        <thead>
        <tr>
            <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: left;">Name</th>
            <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: left;">Email</th>
            <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: left;">Role</th>
            <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: left;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td style="padding: 10px;">{{ $user->name }}</td>
                <td style="padding: 10px;">{{ $user->email }}</td>
                <td style="padding: 10px;">{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                <td style="padding: 10px;">
                    @if(auth()->id() !== $user->id)
                        <form action="{{ route('admin.users.toggleAdmin', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" style="padding:5px 10px; border-radius:3px; background-color:#F7E6A9FF; color:#8A6674; border:none; cursor:pointer;">
                                {{ $user->is_admin ? 'Remove Admin' : 'Make Admin' }}
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
