<?php

namespace App\Services;

use App\Models\Article;
use Carbon\Carbon;

class ArticleDecoratorService
{
	protected $imageService;

	public function __construct(ImageService $imageService)
	{
		$this->imageService = $imageService;
	}

	/**
	 * Add additional fields for Article
	 * 
	 * @param Article $article
	 * @param int $width
	 * @param int $height
	 * @return Article
	 */
	public function decorate(Article $article, int $width = 600, int $height = 400): Article
	{
		$article->placeholderImage = $this->imageService->getPlaceholderImage($width, $height, $article->title);
		$article->date = Carbon::parse($article->published_at)->format('d-m-Y');
		$article->diffForHumansDate = $this->diffForHumansDate($article->published_at);

		return $article;
	}

	/**
	 * Decorate Articles Collection
	 *
	 * @param \Illuminate\Support\Collection $articles
	 * @param int $width
	 * @param int $height
	 * @return \Illuminate\Support\Collection
	 */
	public function decorateCollection($articles, int $width = 600, int $height = 400)
	{
		return $articles->map(function ($article) use ($width, $height) {
			return $this->decorate($article, $width, $height);
		});
	}

	/**
	 * diffForHumans date
	 *
	 * @param string $date
	 * @return string
	 */
	public function diffForHumansDate($date)
	{
		return Carbon::parse($date)->diffForHumans();
	}
}
