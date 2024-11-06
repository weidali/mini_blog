<?php

namespace App\Services;

class ImageService
{
	/**
	 * @param int $width
	 * @param int $height
	 * @param string $text
	 * @return string
	 */
	public function getPlaceholderImage(int $width = 300, int $height = 200, string $text = 'Placeholder')
	{
		return "https://via.placeholder.com/{$width}x{$height}?text=" . urlencode($text);
	}
}
