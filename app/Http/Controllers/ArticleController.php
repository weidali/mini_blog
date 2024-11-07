<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ImageService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        $articles = Article::orderBy('published_at', 'desc')->paginate(2);

        foreach ($articles as $article) {
            $article->placeholderImage = $this->imageService->getPlaceholderImage(600, 400, $article->title);
            $article->date = Carbon::parse($article->published_at);
        }

        return view('articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::with('tags')->where('slug', $slug)->firstOrFail();
        $article->image = $this->imageService->getPlaceholderImage(600, 400, $article->title);

        return view('articles.show', compact('article'));
    }
}
