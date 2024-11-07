@extends('layouts.app')
@section('title', $tag->label)

@section('content')
    <h1>Статьи с тегом: <span class="badge rounded-pill text-bg-secondary">#{{ $tag->label }}</span></h1>

	@include('components.paginated-articles-list', ['articles' => $articles])

@endsection