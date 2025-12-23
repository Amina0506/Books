@extends('layouts.admin')

@section('admin-content')
    <h1 style="font-size: 30px">Admin dashboard</h1>

    <a href="{{ route('admin.users.index') }}">
        Manage users
    </a>

@endsection
