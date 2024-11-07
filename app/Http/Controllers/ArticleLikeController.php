<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleLike;
use Illuminate\Http\Request;

class ArticleLikeController extends Controller
{
    public function like(Request $request, $articleId)
    {
        $article = Article::findOrFail($articleId);
        $ip = $request->ip();
        $deviceId = $request->cookie('device_id');
        $deviceId = hash('sha256', $deviceId);

        $existingLike = ArticleLike::where('article_id', $article->id)
            ->where('ip_address', $ip)
            ->where('device_id', $deviceId)
            ->first();

        if ($existingLike) {
            return response()->json([
                'success' => false,
                'message' => 'Вы уже поставили лайк с этого устройства.'
            ], 400);
        }

        ArticleLike::create([
            'article_id' => $article->id,
            'ip_address' => $ip,
            'device_id' => $deviceId,
        ]);

        $article->increment('likes');

        return response()->json([
            'success' => true,
            'likes' => $article->likes
        ]);
    }
}
