@extends('layouts.app')

@section('content')

    <div class="nieuws-create-form-wrapper">
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="nieuws-create-form">
        @csrf
        <label>Title</label>
        <input type="text" name="title" required style="border-radius: 5px">

        <label>Content</label>
        <textarea name="content" required style="width: 250px"></textarea>

        <label>Picture</label>
        <input type="file" name="image">

        <label>Genre</label>
        <input type="text" name="genre" required style="border-radius: 5px">

        <label>Author</label>
        <input type="text" name="author" required style="border-radius: 5px">

        <button type="submit" style="color: #8A6674; border: 2px #8A6674 solid; padding: 4px; border-radius: 5px">Add news</button>
    </form>
    </div>

@endsection
