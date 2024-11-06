@extends('layouts.app')

@section('title', $article->title)
@section('content')
<div class="container mt-5">
	<img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}">
	<h1>{{ $article->title }}</h1>
	<div>{!! nl2br(e($article->content)) !!}</div>
	<a href="{{ route('articles.index') }}" class="btn btn-primary">Назад к каталогу</a>
</div>
@endsection
