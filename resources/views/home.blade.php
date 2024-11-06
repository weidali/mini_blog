@extends('layouts.app')

@section('title', 'Главная страница')
@section('content')

<main>
	<div class="container py-3">
		<div class="pricing-header p-3 pb-md-4 mx-auto text-left">
			<h1 class="display-4 fw-normal text-body-emphasis">Мир абстрактен</h1>
			<p class="fs-5 text-body-secondary">Успешный Успех</p>
		</div>
	</div>
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
						<p class="card-text">{{ \Illuminate\Support\Str::limit($article->content, 100) }}</p>
					</div>
				</div>
			</div>
		@endforeach
  	</div>
</main>

<footer class="footer mt-auto py-3 bg-body-tertiary">
	<div class="container">
		<span class="text-body-secondary">Place sticky footer content here.</span>
	</div>
</footer>
@endsection

