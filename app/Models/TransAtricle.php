<?php

namespace App\Models;

use App\Casts\Shielding;
use Illuminate\Database\Eloquent\Model;

class TransArticle extends Model
{
    protected $table    = 'trans_articles';
    protected $fillable = ['article_id', 'title', 'desc', 'content', 'local', 'metaTitle', 'metaDesc'];
    protected $casts    = [
        'content' => Shielding::class,
        'desc'    => Shielding::class
    ];
}
