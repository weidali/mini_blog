<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
		<img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}">
        <h1>{{ $article->title }}</h1>
		<div>{!! nl2br(e($article->content)) !!}</div>
        <a href="{{ route('articles.index') }}" class="btn btn-primary">Назад к каталогу</a>
    </div>
</body>
</html>
