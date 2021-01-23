<?php

namespace App\Models;

use App\Casts\PathTo;
use App\Traits\GetUrlTrait;
use App\Traits\LocalContentTrait;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use LocalContentTrait;
    use GetUrlTrait;

    protected $table     = 'collections';
    protected $path      = 'catalog';
    protected $translate = ['App\Models\TransCollection', 'collections_id'];
    protected $fillable  = ['categories_id', 'status', 'order', 'file', 'slug'];
    protected $appends   = ['subs', 'url'];
    protected $hidden    = ['collection_subs', 'category'];
    protected $casts     = [
        'created_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y',
        'file'       => PathTo::class,
    ];

    public function collection_subs()
    {
        return $this->hasMany('App\Models\GroupsInCollect', 'collections_id');
    }

    public function category()
    {
        return $this->hasOne('App\Models\Categories', 'id', 'categories_id');
    }

    public function getUrlAttribute()
    {
        return $this->urlLocal($this->locale, 'catalog/'. $this->category->slug .'/'. $this->slug);
    }

    public function getSubsAttribute()
    {
        $items = [];
        foreach ($this->collection_subs as $item) {
            $items[] = $this->locale ? $item : $item->subs_id;
        }
        return $items;
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($collection) {
            $collection->localeData()->delete();
            $collection->collection_subs()->delete();
        });
    }
}