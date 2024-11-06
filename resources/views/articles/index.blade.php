@extends('layouts.app')

@section('title', 'Каталог статей')
@section('content')

<div class="container mt-5">
    <div class="container ">
        <!-- Stack the columns on mobile by making one full-width and the other half-width -->
        <div class="row">
          <div class="col-md-8 text-left">
            <h2>Каталог статей</h2>
          </div>
          <div class="col-6 col-md-4 text-right">
            <p>Количество: <span class="mx-2 text-body-secondary text-sm">{{ count($articles) }}</span></p>
          </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-1 g-4">
        @if($articles->isNotEmpty())
            @foreach($articles as $article)

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
                              <p class="mx-2 text-body-secondary fs-6">{{ $article->date->format('d-m-Y') }}</p>
                          </div>
                        </div>
                      </div>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($article->content, \App\Models\Article::PREVIEW_LENGTH) }}</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">Опубликовано {{ $article->date->diffForHumans() }}</small>
                  </div>
                </div>
            </div>
        </a>
            @endforeach
        @else
            <p class="list-group-item">Статьи не найдены</p>
        @endif
      </div>
</div>
@endsection
