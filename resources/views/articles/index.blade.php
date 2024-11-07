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
          <p>Количество: <span class="mx-2 text-body-secondary text-sm">{{ $count }}</span></p>
        </div>
      </div>
  </div>

  @include('components.paginated-articles-list', [
    'articles' => $articles,
    'decorated_articles' => $decorated_articles,
    ])
</div>
@endsection
