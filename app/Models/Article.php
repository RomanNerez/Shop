<?php

namespace App\Models;

use App\Casts\PathTo;
use App\Traits\GetUrlTrait;
use App\Traits\LocalContentTrait;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use LocalContentTrait;
    use GetUrlTrait;

    protected $translate = 'App\Models\TransArticle';
    protected $table     = 'articles';
    protected $fillable  = ['categories_id', 'file', 'slug', 'status'];
    protected $hidden   =  ['article_subs'];
    protected $appends   = ['subs', 'url'];
    protected $casts     = [
        'created_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y',
        'file'       => PathTo::class
    ];

    public function article_subs()
    {
        return $this->hasMany('App\Models\GroupsInArticle', 'article_id');
    }

    public function category()
    {
        return $this->hasOne('App\Models\Categories', 'id', 'categories_id');
    }

    public function getUrlAttribute()
    {
        return $this->urlLocal($this->locale, 'article/'. $this->slug);
    }

    public function getSubsAttribute()
    {
        $items = [];
        foreach ($this->article_subs as $item) {
            $items[] = $item->subs_id;
        }
        return $items;
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($model) {
            $model->localeData()->delete();
            $model->article_subs()->delete();
        });
    }
}
