@extends('layouts.app')

@section('title', 'Главная страница')
@section('content')

<div class="container py-3">
	<div class="pricing-header pb-md-4 mx-auto text-left">
		<h1 class="display-4 fs-2 fw-normal text-body-emphasis text-uppercase">Мир абстрактен</h1>
		<p class="fs-6 text-body-secondary">В каждом слове — целая вселенная</p>
	</div>
</div>

<section class="bg-light pt-3 pb-3">
<div class="container">
	<div class="row pt-2">
		<div class="col-12">
			<p class="fs-4 border-bottom mb-4">Последние добавленные статьи</p>
		</div>
	</div>
	@if($latestArticles->isNotEmpty())
	<div class="row">
		@foreach($latestArticles as $article)
			<!-- CLASSES d-flex align-items-stretch-->
			<div class="col-lg-4 mb-3 d-flex align-items-stretch">
				<div class="card">
					<img src="{{ $article->placeholderImage }}" class="card-img-top" alt="{{ $article->title }}">
					<div class="card-body d-flex flex-column">
						<a class="stretched-link" href="{{ route('articles.show', $article->slug) }}"></a>
						<h5 class="card-title">{{ $article->title }}</h5>
						<p class="card-text text-xs mb-4">{{ \Illuminate\Support\Str::limit($article->content, \App\Models\Article::PREVIEW_LENGTH) }}</p>
					</div>
					<div class="card-body d-flex justify-content-between">
						<a id="aid" class="link-secondary link-offset-2 link-underline-opacity-0 link-underline-opacity-0-hover">
							<svg height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
								<path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/>
							</svg>
							<span class="post__view-count js-view-count px-2">{{ $article->views }}</span>
						</a>
						<a id="like-button" data-article-id="{{ $article->id }}" class="link-secondary link-offset-2 link-underline-opacity-0 link-underline-opacity-0-hover" href="">
							♥ <span class="post__like-count js-like-count px-2">{{ Cache::get("article_{$article->id}_likes", $article->likes) }}</span>
						</a>
					</div>
					<div class="card-footer text-body-secondary">
						<p class="card-text"><small class="text-body-secondary">Опубликовано {{ $article->date->diffForHumans() }}</small></p>
					</div>
				</div>
			</div>
		@endforeach
	</div>
	@else
	<div class="row pt-2">
		<div class="col-12">
			<div class="jumbotron my-auto">
				Статьи скоро появятся
			</div>
		</div>
	</div>
	@endif
</div>
</section>

@endsection
