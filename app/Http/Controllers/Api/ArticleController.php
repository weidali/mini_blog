<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function like(Request $request, $articleId)
    {
        $ip = $request->ip();
        $deviceId = $request->cookie('device_id');
        $deviceId = hash('sha256', $deviceId);

        $existingLike = ArticleLike::where('article_id', $articleId)
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
            'article_id' => $articleId,
            'ip_address' => $ip,
            'device_id' => $deviceId,
        ]);

        $cacheKey = "article_{$articleId}_likes";

        if (!Cache::has($cacheKey)) {
            $currentLikes = DB::table('articles')->where('id', $articleId)->value('likes');
            Cache::put($cacheKey, $currentLikes, now()->addMinutes(10));
        }

        $currentLikes = Cache::increment($cacheKey);

        return response()->json(['success' => true, 'likes' => $currentLikes]);
    }

    public function incrementViews($id)
    {
        $article = Article::findOrFail($id);
        $article->increment('views');

        Cache::put("article_{$article->id}_views", $article->views, now()->addMinutes(10));

        return response()->json(['views' => $article->views]);
    }
}
