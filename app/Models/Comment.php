<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'article_id',
        'subject',
        'body',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
