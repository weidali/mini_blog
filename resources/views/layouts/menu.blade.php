

<header>
	<div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
		<a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
			<svg width="64px" height="64px" viewBox="0 0 1024.00 1024.00" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000" stroke="#000000" stroke-width="0.01024"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>MiniBlog</title><path d="M512 960c-92.8 0-160-200-160-448S419.2 64 512 64s160 200 160 448-67.2 448-160 448z m0-32c65.6 0 128-185.6 128-416S577.6 96 512 96s-128 185.6-128 416 62.4 416 128 416z" fill="#050D42"></path><path d="M124.8 736c-48-80 92.8-238.4 307.2-363.2S852.8 208 899.2 288 806.4 526.4 592 651.2 171.2 816 124.8 736z m27.2-16c33.6 57.6 225.6 17.6 424-97.6S905.6 361.6 872 304 646.4 286.4 448 401.6 118.4 662.4 152 720z" fill="#050D42"></path><path d="M899.2 736c-46.4 80-254.4 38.4-467.2-84.8S76.8 368 124.8 288s254.4-38.4 467.2 84.8S947.2 656 899.2 736z m-27.2-16c33.6-57.6-97.6-203.2-296-318.4S184 246.4 152 304 249.6 507.2 448 622.4s392 155.2 424 97.6z" fill="#050D42"></path><path d="M512 592c-44.8 0-80-35.2-80-80s35.2-80 80-80 80 35.2 80 80-35.2 80-80 80zM272 312c-27.2 0-48-20.8-48-48s20.8-48 48-48 48 20.8 48 48-20.8 48-48 48zM416 880c-27.2 0-48-20.8-48-48s20.8-48 48-48 48 20.8 48 48-20.8 48-48 48z m448-432c-27.2 0-48-20.8-48-48s20.8-48 48-48 48 20.8 48 48-20.8 48-48 48z" fill="#2F4BFF"></path></g></svg>
			<span class="fs-4 px-2">Мини Блог</span>
		</a>
		<nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
			<a class="me-3 py-2 {{ Request::is('/') ? 'link-secondary' : 'link-body-emphasis text-decoration-none' }}" href="{{ route('home') }}">На главную</a>
			<a class="me-3 py-2 {{ Request::is('articles*') ? 'link-secondary' : 'link-body-emphasis text-decoration-none' }}" href="{{ route('articles.index') }}">Каталог статей</a>
		</nav>
	</div>
</header>