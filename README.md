# mini_blog

<p align="center">
<a href="#"><img src="https://img.shields.io/badge/PHP-8.2-blue" alt="Total Downloads"></a>
<a href="#"><img src="https://img.shields.io/badge/Laravel-11.9-orange" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## instalation

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

## Coding style guidelines

When developing, we follow the guide from the "[Laravel & PHP 'Spatie'][spatie/guidelines]" article.

## Previews
### Главная страница
[![Главная страница](https://i.postimg.cc/kg9KJsJX/temp-Image-Mflrv-R.avif)](https://postimg.cc/RNsNGcJj)

### Каталог статей
[![Каталог статей](https://i.postimg.cc/NM1Qj6fB/temp-Image-Kpvf1-G.avif)](https://postimg.cc/Kkv69gMH)


[spatie/guidelines]: https://spatie.be/guidelines/laravel-php#artisan-commands
