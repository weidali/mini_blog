<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{

    protected $model = Article::class;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()->count(20)->create();
    }
}
