# mini_blog

<p align="center">
<a href="#"><img src="https://img.shields.io/badge/PHP-8.2-blue" alt="Total Downloads"></a>
<a href="#"><img src="https://img.shields.io/badge/Laravel-11.9-orange" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalation
```bash
git clone git@github.com:weidali/mini_blog.git
cd education_system
```

Install the dependencies
```bash
composer install --optimize-autoloader --no-dev
```

Get into the project root, open `.env` file and update configuration details
```bash
cp .env.example .env
```

Set DB connection credentials and make migrations with seeders
```bash
php artisan migrate:fresh --seed
```

## Features
- Project Purpose: Build a small, production-ready article website using Laravel
- Pages and Functionalities:
  - Home Page (/): Navigation, 6 recent articles.
  - Article Catalog (/articles): Navigation, paginated list (10 per page).
  - Article Page (/articles/{slug}): Cover image, content, tags, like/view counters and comment form.
- Key Components:
  - Counters: Likes and views (AJAX-based, scalable to high traffic).
  - Comment Form: AJAX submission, confirmation message on success.
- Handle high-volume traffic on counters; asynchronous comment processing.

## Coding style guidelines
When developing, we follow the guide from the "[Laravel & PHP 'Spatie'][spatie/guidelines]" article.

## Previews
### Главная страница
[![Главная страница|200x150](https://i.postimg.cc/kg9KJsJX/temp-Image-Mflrv-R.avif)](https://postimg.cc/RNsNGcJj)

### Каталог статей
[![Каталог статей|200x150](https://i.postimg.cc/NM1Qj6fB/temp-Image-Kpvf1-G.avif)](https://postimg.cc/Kkv69gMH)

### Статья
[![Статья|200x150](https://i.postimg.cc/q7KT1sKy/temp-Image-XZJ6-Bx.avif)](https://postimg.cc/QBjwtW0d)

### Тег
[![Тег|200x150](https://i.postimg.cc/xCSShXG7/temp-Image-FWXUJg.avif)](https://postimg.cc/xkg7bT4y)


[spatie/guidelines]: https://spatie.be/guidelines/laravel-php#artisan-commands
