
@php
$src = [
	'https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp',
	'https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp',
	'https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(3).webp',
	'https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp',
	'https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(31).webp',
	'https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp',
	'https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(33).webp',
]
@endphp
<div class="row d-flex justify-content-center">
	<div class="col-md col-lg">
	  <div class="card shadow-0 border" style="background-color: #f0f2f5;">
		<div class="card-body p-4">
		  <h6>Kомментарии <span>{{ count($comments) > 0 ? count($comments) : '' }}</span></h6>
		  
		  @if ($comments->isNotEmpty())
		  @foreach ($comments as $comment)
		  <div class="card mb-4">
			<div class="card-body">
			  <p>{{ $comment->subject }}</p>
			  <p>{!! nl2br($comment->body) !!}</p>
  
			  <div class="d-flex justify-content-between">
				<div class="d-flex flex-row align-items-center">
				  <img
					src="{{ collect($src)->random() }}"
					alt="avatar"
					width="25"
					height="25"
				  />
				  <p class="small mb-0 ms-2">{{ \Faker\Factory::create()->name }}</p>
				</div>
				<div class="d-flex flex-row align-items-center">
				  <p class="small text-muted mb-0">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>
				</div>
			  </div>
			</div>
		  </div>
		  @endforeach
		  @else
		  <div class="my-4"><p>Комментарии пока отсутствуют</p></div>
		  @endif
		</div>
	  </div>
	</div>
  </div>

					