@extends('layouts.layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <article class="max-w-3xl mx-auto">
            <header class="mb-8">
                <h1 class="text-4xl font-bold text-[#37954b] mb-2">{{ $article->title }}</h1>
                <time datetime="{{ $article->created_at->toDateString() }}" class="text-gray-500">
                    {{ $article->created_at->format('F j, Y') }}
                </time>
            </header>

            <img src="{{ asset("storage/{$article->article_img_path}") }}" alt="{{ $article->title }}"
                class="w-full h-64 object-cover mb-8 rounded-lg shadow-md">

            <div class="prose prose-lg max-w-none">
                {{ $article->summary }}
            </div>
        </article>

        <div class="mt-12 text-center">
            <a href="{{ route('utama') }}" class="text-[#37954b] font-bold hover:underline">
                &larr; Kembali ke Halaman Utama
            </a>
        </div>
    </div>
@endsection
