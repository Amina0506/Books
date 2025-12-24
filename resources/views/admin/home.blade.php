@extends('layouts.admin')

@section('admin-content')
    <h1 style="font-size: 30px; margin-bottom: 30px">Admin dashboard</h1>

    <a href="{{ route('admin.users.index') }}" style="padding:40px 80px; background-color:#F7E6A9FF; color:#8A6674; border-radius:5px; margin-bottom:50px; display:flex; justify-content: center; text-align: center; font-size: 25px">
        Manage users
    </a>

    <a href="{{ route('admin.users.create') }}" style="padding:40px 80px; background-color:#F7E6A9FF; color:#8A6674; border-radius:5px; margin-bottom:15px; display:flex; justify-content: center; text-align: center; font-size: 25px">
        Add New User
    </a>

@endsection
