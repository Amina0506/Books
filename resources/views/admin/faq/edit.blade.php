@extends('layouts.app')

@section('content')
    <h1 style="font-size: 30px; display: flex; justify-content: center; margin-top: 40px;">
        Edit FAQ Question
    </h1>

    <div style="display: flex; justify-content: center; margin-top: 30px;">
        <form action="{{ route('faq.update', $faq->id) }}" method="POST" style="width: 50%;">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 20px;">
                <label for="question" style="display: block; font-weight: bold; margin-bottom: 5px;">Question</label>
                <input type="text" name="question" id="question" value="{{ old('question', $faq->question) }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                @error('question')
                <div style="color: red; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label for="answer" style="display: block; font-weight: bold; margin-bottom: 5px;">Answer</label>
                <textarea name="answer" id="answer" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" rows="4">{{ old('answer', $faq->answer) }}</textarea>
                @error('answer')
                <div style="color: red; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label for="faq_category_id" style="display: block; font-weight: bold; margin-bottom: 5px;">Category</label>
                <select name="faq_category_id" id="faq_category_id" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; color: #53161d;">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('faq_category_id', $faq->faq_category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('faq_category_id')
                <div style="color: red; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="display: flex; justify-content: center;">
                <button type="submit" style="padding: 10px; font-size: 16px; border-radius: 5px; border: 2px solid #F7E6A9; background-color: #F7E6A9FF; color: #8A6674;">
                    Update Question
                </button>
            </div>
        </form>
    </div>
@endsection
