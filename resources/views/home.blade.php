@extends('layouts.app')

@section('title', 'Главная страница')
@section('content')

<div class="container py-3">
	<div class="pricing-header p-3 pb-md-4 mx-auto text-left">
		<h1 class="display-4 fw-normal text-body-emphasis">Мир абстрактен</h1>
		<p class="fs-5 text-body-secondary">В каждом слове — целая вселенная</p>
	</div>
</div>
@if($latestArticles->isNotEmpty())
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
	@foreach($latestArticles as $article)
		<div class="col">
			<div class="card mb-4 rounded-3 shadow-sm">
				<img src="{{ $article->placeholderImage }}" class="card-img-top" alt="{{ $article->title }}">
				{{-- <img src="https://picsum.photos/300/200" class="card-img-top" alt="{{ $article->title }}" loading="lazy"> --}}
				<div class="card-body">
					<h5 class="card-title">
						<a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
					</h5>
					<p class="card-text">{{ \Illuminate\Support\Str::limit($article->content, \App\Models\Article::PREVIEW_LENGTH) }}</p>
					<p class="card-text"><small class="text-body-secondary">Опубликовано {{ $article->date->diffForHumans() }}</small></p>
				</div>
				<div class="card-body">
					<a class="card-link">Просмотров: 100</a>
					<a class="card-link">Лайков: 99+</a>
				  </div>
			</div>
		</div>
	@endforeach
</div>

@else
<div class="row row-cols-1 row-cols-md-1 g-4">
	<div class="alert alert-secondary" role="alert">
		<div class="container h-100 d-flex justify-content-center">
			<div class="jumbotron my-auto">
				Статьи скоро появятся
			</div>
		</div>
	</div>
</div>
@endif

@endsection
