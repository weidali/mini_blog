<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class SyncLikesToDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync:likes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync cached likes to the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $articles = Article::select(['id', 'likes'])->get();

        foreach ($articles as $article) {
            $articleId = $article->id;
            $cacheKey = "article_{$articleId}_likes";

            $cachedLikes = Cache::get($cacheKey);

            if ($cachedLikes !== null) {
                $article->likes = $cachedLikes;
                $article->save();
                $this->info("article {$article->id} synced: {$cachedLikes}");

                Cache::forget($cacheKey);
            }
        }

        $this->info('Likes have been synced to the database successfully.');
    }
}
