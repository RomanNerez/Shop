<?php

namespace App\Models;

use App\Traits\LocalContentTrait;
use Illuminate\Database\Eloquent\Model;
use Log;

class AttributeList extends Model
{
    use LocalContentTrait;

    protected $table     = 'attribute_lists';
    protected $translate = 'App\Models\TransAttrList';
    protected $fillable  = ['attribute_id', 'order', 'status', 'slug'];
    protected $casts     = [
        'created_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y',
    ];

    public function collection()
    {
        return $this->hasMany('App\Models\AttrCollection');
    }

    public function group()
    {
        return $this->hasOne('App\Models\Attribute', 'id', 'attribute_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($model) {
            $model->localeData()->delete();
            $model->collection->each(function ($collection) {
                $collection->attr_in_product->each(function ($attr) {
                    $attr->delete();
                });
            });
        });
    }
}
