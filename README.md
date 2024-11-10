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
  - Home Page (/): Navigation, 6 recent articles and most popular article vitget.
  - Article Catalog (/articles): Navigation, paginated list (10 per page).
  - Article Page (/articles/{slug}): Cover image, content, tags, like/view counters and comment form.
- Key Components:
  - Counters: Likes and views (AJAX-based, scalable to high traffic).
  - Comment Form: AJAX submission, confirmation message on success.
  - Most Popular Article: AJAX request to find most popular article by views, likes and comments.
- Handle high-volume traffic on counters; asynchronous comment processing.

## Routes
#### WEb
<details>
 <summary><code>GET</code> <code><b>/</b></code> <code>Home Page</code></summary>

##### Parameters
> None

##### Responses
> | http code     | content-type                      | response                                                            |
> |---------------|-----------------------------------|---------------------------------------------------------------------|
> | `200`         | `text/html;charset=UTF-8`         | HTML                                                                |

##### Example cURL
> ```bash
>  curl -X GET -H "Content-Type: text/html" http://localhost:8889/
> ```
</details>
<details>
 <summary><code>GET</code> <code><b>/articles</b></code> <code>Articles Page</code></summary>

##### Parameters
> None

##### Responses
> | http code     | content-type                      | response                                                            |
> |---------------|-----------------------------------|---------------------------------------------------------------------|
> | `200`         | `text/html;charset=UTF-8`         | HTML                                                                |

##### Example cURL
> ```bash
>  curl -X GET -H "Content-Type: text/html" http://localhost:8889/articles
> ```
</details>
<details>
 <summary><code>GET</code> <code><b>/articles</b></code> <code>Articles Page</code></summary>

##### Parameters
> None

##### Responses
> | http code     | content-type                      | response                                                            |
> |---------------|-----------------------------------|---------------------------------------------------------------------|
> | `200`         | `text/html;charset=UTF-8`         | HTML                                                                |

##### Example cURL
> ```bash
>  curl -X GET -H "Content-Type: text/html" http://localhost:8889/articles
> ```
</details>
<details>
 <summary><code>GET</code> <code><b>/articles/{slug}</b></code> <code>The Article Page</code></summary>

##### Parameters
> | name   |  type      | data type      | description                                          |
> |--------|------------|----------------|------------------------------------------------------|
> | `slug` |  required  | string         | The specific article titile                          |

##### Responses
> | http code     | content-type                      | response                                                            |
> |---------------|-----------------------------------|---------------------------------------------------------------------|
> | `200`         | `text/html;charset=UTF-8`         | HTML                                                                |
> | `404`         | `text/html;charset=UTF-8`         | HTML                                                                |

##### Example cURL
> ```bash
>  curl -X GET -H "Content-Type: text/html" http://localhost:8889/articles/{slug}
> ```
</details>
<details>
 <summary><code>GET</code> <code><b>/tags/{url}</b></code> <code>The Article Page</code></summary>

##### Parameters
> | name   |  type      | data type      | description                                          |
> |--------|------------|----------------|------------------------------------------------------|
> | `url`  |  required  | string         | The specific tag name                                |

##### Responses
> | http code     | content-type                      | response                                                            |
> |---------------|-----------------------------------|---------------------------------------------------------------------|
> | `200`         | `text/html;charset=UTF-8`         | HTML                                                                |
> | `404`         | `text/html;charset=UTF-8`         | HTML                                                                |

##### Example cURL
> ```bash
>  curl -X GET -H "Content-Type: text/html" http://localhost:8889/tags/{url}
> ```
</details>

------------------------------------------------------------------------------------------
#### Api
<details>
 <summary><code>GET</code> <code><b>api/articles/{id}/increment-views</b></code> <code>The article page view counter</code></summary>

##### Parameters
> | name   |  type      | data type      | description                                          |
> |--------|------------|----------------|------------------------------------------------------|
> | `id`   |  required  | string         | SpeThe specific article id                           |

##### Responses
> | http code     | content-type                      | response                                                            |
> |---------------|-----------------------------------|---------------------------------------------------------------------|
> | `200`         | `application/json`                | `{"code":"200","views":"<COUNT>"}`                                  |
> | `404`         | `application/json`                | `{"code":"404","message":"Article Not Found"}`                      |

##### Example cURL
> ```bash
>  curl -X GET -H "Content-Type: text/html" http://localhost:8889/api/articles/{id}/increment-views
> ```
</details>
<details>
 <summary><code>POST</code> <code><b>api/articles/{articleId}/like</b></code> <code>Like the article page endpoint</code></summary>

##### Parameters
> | name        |  type      | data type      | description                                          |
> |-------------|------------|----------------|------------------------------------------------------|
> | `articleId` |  required  | int            | The specific article id                              |

##### Responses
> | http code     | content-type                      | response                                                            |
> |---------------|-----------------------------------|---------------------------------------------------------------------|
> | `200`         | `application/json`                | `{"code":"200","views":"<COUNT>"}`                                  |
> | `404`         | `application/json`                | `{"code":"404","message":"Article Not Found"}`                      |

##### Example cURL
> ```bash
>  curl -X POST -H "Content-Type: application/json" --data @put.json http://localhost:8889/api/articles/{articleId}/like
> ```
</details>
<details>
 <summary><code>POST</code> <code><b>api/articles/{id}/comments</b></code> <code>Comment the article page endpoint</code></summary>

##### Parameters
> | name   |  type      | data type      | description                                          |
> |--------|------------|----------------|------------------------------------------------------|
> | `id`   |  required  | int            | The specific article id                              |
> | `title`|  required  | string         | The title of comment                                 |
> | `body` |  required  | string         | The body of comment                                  |

##### Responses
> | http code     | content-type                      | response                                                            |
> |---------------|-----------------------------------|---------------------------------------------------------------------|
> | `200`         | `application/json`                | `{"code":"400","views":"<COUNT>"}`                                  |
> | `404`         | `application/json`                | `{"code":"404","message":"Article Not Found"}`                      |
> | `400`         | `application/json`                | `{"code":"400","success":false,"message":"Вы уже поставили лайк"}`  |
> | `422`         | `application/json`                | `{"code":"422","success":false,"message":"<Validation Exceptions>"}`|

##### Example cURL
> ```bash
>  curl -X POST -H "Content-Type: application/json" --data @put.json http://localhost:8889/api/articles/{id}/comments
> ```
</details>

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
