<div class="row row-cols-1 row-cols-md-1 g-4">
	@if($articles->isNotEmpty())
		@foreach($decorated_articles as $article)

		<a href="" class="custom-card">
		  <div class="col">
			<div class="card h-100">
			  <img src="{{ $article->placeholderImage }}" class="card-img-top" alt="{{ $article->title }}">
			  <div class="card-body">
				<a class="stretched-link" href="{{ route('articles.show', $article->slug) }}"></a>

				<div class="container p-0">
					<div class="row">
					  <div class="col">
						  <h5 class="card-title">{{ $article->title }}</h5>
					  </div>
					  <div class="col-sm-6">
						<p class="mx-2 text-body-secondary fs-6">{{ $article->date }}</p>
					  </div>
					</div>
				  </div>
				<p class="card-text">{{ \Illuminate\Support\Str::limit($article->content, \App\Models\Article::PREVIEW_LENGTH) }}</p>
			  </div>
			  <div class="card-footer">
				<small class="text-body-secondary">Опубликовано {{ $article->diffForHumansDate }}</small>
			  </div>
			</div>
		</div>
	</a>
		@endforeach
	@else
	<div class="alert alert-secondary" role="alert">
	  <div class="container h-100 d-flex justify-content-center">
		<div class="jumbotron my-auto">
		  Статьи скоро появятся
		</div>
	  </div>
	</div>
	@endif

	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-start">
			{{ $articles->links('pagination::bootstrap-5') }}
		</ul>
	</nav>
</div>