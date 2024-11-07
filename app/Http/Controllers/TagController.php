<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($url)
    {
        $tag = Tag::where('url', $url)->firstOrFail();
        $articles = $tag->articles()->orderBy('published_at', 'desc')->paginate(2);

        return view('tags.show', compact('tag', 'articles'));
    }
}
