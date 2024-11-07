@extends('layouts.app')

@section('title', $article->title)
@section('content')

<div class="container mt-5">
	<img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}">
	<h1>{{ $article->title }}</h1>
	@include('components.article-like-view', [
    	'likes' => $article->likes,
    	'views' => $article->likes,
    ])

	<div class="tags">
		@foreach($article->tags as $tag)
			<a href="{{ route('tags.show', $tag->url) }}" class="tag-link mr-2">
				<span class="badge rounded-pill text-bg-secondary">{{ $tag->label }}</span></a>
		@endforeach
	</div>
	<div>{!! nl2br(e($article->content)) !!}</div>
	<a href="{{ route('articles.index') }}" class="btn btn-secondary my-2">Назад к каталогу</a>
</div>
<script type="text/javascript">
	document.getElementById('like-button').addEventListener('click', function() {
		const articleId = this.getAttribute('data-article-id');
		const route = `/api/articles/${articleId}/like`;

		fetch(route, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
			if (data.success) {
				const likeCountElement = document.querySelector('.js-like-count');
				if (likeCountElement) {
					likeCountElement.textContent = data.likes;
				}
			} else {
				alert(data.message);
			}
        })
        .catch(error => console.error('Ошибка:', error));
	});
</script>
@endsection
