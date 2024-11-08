<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class SyncLikesAndViewsToDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync:likes-and-views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync cached likes and views to the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $articles = Article::select(['id', 'likes', 'views'])->get();

        foreach ($articles as $article) {
            $this->syncCachedValue($article, 'likes', "article_{$article->id}_likes", "Likes for article {$article->id}");
            $this->syncCachedValue($article, 'views', "article_{$article->id}_views", "Views for article {$article->id}");

            $article->save();
        }

        $this->info('Likes have been synced to the database successfully.');
    }

    /**
     * @param Article $article
     * @param string $field
     * @param string $cacheKey
     * @param string $logMessage
     * @return void
     */
    protected function syncCachedValue(Article $article, string $field, string $cacheKey, string $logMessage): void
    {
        $cachedValue = Cache::get($cacheKey);

        if ($cachedValue !== null) {
            $article->$field = $cachedValue;
            Cache::forget($cacheKey);
            $this->info("{$logMessage} synced: {$cachedValue}");
        }
    }
}
