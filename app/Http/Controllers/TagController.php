<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Services\ArticleDecoratorService;
use App\Services\ImageService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $articleDecorator;

    public function __construct(ArticleDecoratorService $articleDecorator)
    {
        $this->articleDecorator = $articleDecorator;
    }

    public function show($url)
    {
        $tag = Tag::where('url', $url)->firstOrFail();
        $articles = $tag->articles()->orderBy('published_at', 'desc')->paginate(2);
        // $articles = $this->articleDecorator->decorateCollection($articles);
        $decorated_articles = $this->articleDecorator->decorateCollection($articles);

        return view('tags.show', compact('tag', 'articles', 'decorated_articles'));
    }
}
