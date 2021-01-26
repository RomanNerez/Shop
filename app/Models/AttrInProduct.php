<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttrInProduct extends Model
{
    protected $table    = 'attr_in_products';
    protected $fillable = ['product_id', 'price', 'count', 'images'];
    protected $hidden   = ['created_at', 'updated_at'];
    protected $casts    = [
        'images' => 'array',
        'price'  => 'float'
    ];

    public function collection()
    {
        return $this->hasMany('App\Models\AttrCollection');
    }

    public function trans()
    {
        return $this->hasMany('App\Models\TransAttrProduct');
    }

    public function list_collection()
    {
        $keys = [];
        foreach ($this->collection as $collection) {
            $keys[] = $collection->attribute_list_id;
        }
        return $keys;
    }

    public function getImagesAttribute($value)
    {
        if (!$value) {
            return $value;
        }
        $data = json_decode($value);
        foreach ($data as $item) {
            if ($item->source) {
                $item->source = url('upload/'. $item->source);
            }
        }
        return $data;
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($model) {
            $model->trans()->delete();
            $model->collection()->delete();
        });
    }
}