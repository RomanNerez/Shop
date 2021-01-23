<?php

namespace App\Models;

use App\Casts\Shielding;
use Illuminate\Database\Eloquent\Model;

class TransAttrProduct extends Model
{
    protected $table    = 'trans_attr_products';
    protected $fillable = ['trans_product_id', 'attr_in_product_id', 'desc', 'params', 'meta_title', 'meta_desc'];
    protected $casts    = [
        'params' => 'array',
        'desc'   => Shielding::class
    ];

    public function collection()
    {
        return $this->hasMany('App\Models\AttrCollection', 'attr_in_product_id', 'attr_in_product_id');
    }

    public function list_collection()
    {
        $keys = [];
        foreach ($this->collection as $collection) {
            $keys[] = $collection->attribute_list_id;
        }
        return $keys;
    }
}