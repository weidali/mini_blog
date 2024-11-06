<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ImageService;
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
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        // dump($article->content);
        $article->htmlContent = str_replace("\n", '<br />', $article->content);
        // dump(str_replace('\n', '<br />', $article->content));
        $article->decodedText = json_decode('"' . $article->content . '"');
        $article->image = $this->imageService->getPlaceholderImage(600, 400, $article->title);


        return view('articles.show', compact('article'));
    }
}
