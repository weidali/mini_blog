<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleLike extends Model
{
    protected $fillable = ['article_id', 'ip_address', 'device_id'];

    public function article()
    {
        return $this->belongs(Article::class);
    }
}
