<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог статей </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Каталог статей<span class="mx-2 text-body-secondary text-sm">{{ count($articles) }}</span></h1>
        <ul class="list-group">
            @if($articles->isNotEmpty())
				@foreach($articles as $article)
					<li class="list-group-item">
						<a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}<span class="mx-2 text-body-secondary">{{ $article->slug }}</span></a>
						<p>{{ \Illuminate\Support\Str::limit($article->content, 100) }}</p>
					</li>
				@endforeach
			@else
				<li class="list-group-item">Статьи не найдены</li>
			@endif
        </ul>
    </div>
</body>
</html>