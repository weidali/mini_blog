@extends('layouts.app')
@section('title', $tag->label)

@section('content')
    <h1>Статьи с тегом: {{ $tag->label }}</h1>

    <ul class="list-group">
        @forelse ($tag->articles as $article)
            <li class="list-group-item">
                <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                <p>{{ Str::limit($article->content, 100) }}</p>
            </li>
        @empty
            <p>Нет статей с этим тегом.</p>
        @endforelse
    </ul>
@endsection