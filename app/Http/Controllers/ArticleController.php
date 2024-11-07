<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ArticleDecoratorService;
use App\Services\ImageService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleDecorator;

    public function __construct(ArticleDecoratorService $articleDecorator)
    {
        $this->articleDecorator = $articleDecorator;
    }

    public function index()
    {
        $count = Article::count();
        $articles = Article::orderBy('published_at', 'desc')->paginate(2);
        $decorated_articles = $this->articleDecorator->decorateCollection($articles);

        return view('articles.index', compact('articles', 'count', 'decorated_articles'));
    }

    public function show($slug)
    {
        $article = Article::with('tags')->where('slug', $slug)->firstOrFail();
        $article = $this->articleDecorator->decorate($article);

        return view('articles.show', compact('article'));
    }
}
