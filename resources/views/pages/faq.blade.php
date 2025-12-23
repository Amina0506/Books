@extends('layouts.app')

@section('content')
    <div style="max-width: 768px; margin: 0 auto; padding: 40px 0;">
        <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 24px; text-align: center;">
            Frequently Asked Questions
        </h1>

        @php
            $faqsByCategory = $faqs->groupBy(function($faq) {
                return $faq->category->name ?? 'Uncategorized';
            });
        @endphp

        @foreach($faqsByCategory as $categoryName => $faqsInCategory)
            <h2 style="font-size: 20px; font-weight: bold; margin-top: 24px; margin-bottom: 12px;">
                {{ $categoryName }}
            </h2>

            @foreach($faqsInCategory as $faq)
                <details style="margin-bottom: 16px; border: 1px solid #F7E6A9FF; border-radius: 8px; padding: 16px; background-color: #F7E6A9FF; color: #8A6674">
                    <summary style="cursor: pointer; font-weight: 500;">
                        {{ $faq->question }}
                    </summary>
                    <p style="margin-top: 8px;">{{ $faq->answer }}</p>
                </details>
            @endforeach
        @endforeach
    </div>
@endsection
