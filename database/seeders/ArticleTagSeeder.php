<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory()->count(20)->create();
        if (Article::count()) {
            Article::all()->each(function ($article) use ($tags) {
                $article->tags()->attach(
                    $tags->random(rand(1, 4))->pluck('id')->toArray()
                );
            });
        }
    }
}
