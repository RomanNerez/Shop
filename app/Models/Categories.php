<?php

namespace App\Models;

use App\Casts\PathTo;
use App\Traits\GetUrlTrait;
use App\Traits\LocalContentTrait;
use App\Traits\ModelSubsTrait;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use LocalContentTrait;
    use GetUrlTrait;
    //use ModelSubsTrait;

	protected $translate = 'App\Models\TransCategories';
	//protected $subs      = 'App\Models\Collection';
    protected $fillable  = ['file', 'slug', 'is_root', 'status', 'related'];
    protected $appends   = ['url'];
    protected $casts     = [
	    'created_at' => 'datetime:d.m.Y',
	    'updated_at' => 'datetime:d.m.Y',
	    'file'       => PathTo::class,
	    'is_root'    => 'boolean'
	];

    public function collection()
    {
        return $this->hasMany('App\Models\Collection');
    }

    public function getUrlAttribute()
    {
        $segment = $this->related === 'store' ? 'catalog' : 'articles';
        return $this->urlLocal($this->locale, $segment .'/'. $this->slug);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($model) {
            $model->localeData()->delete();
        });
    }
}
