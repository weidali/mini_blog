<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ImageService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        $latestArticles = Article::orderBy('published_at', 'desc')->take(6)->get();

        foreach ($latestArticles as $article) {
            $article->placeholderImage = $this->imageService->getPlaceholderImage(300, 200, $article->title);
        }

        return view('home', compact('latestArticles'));
    }
}
