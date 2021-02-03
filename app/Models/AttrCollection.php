<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttrCollection extends Model
{
    protected $table    = 'attr_collections';
    protected $fillable = ['attribute_list_id', 'attr_in_product_id'];
    protected $hidden   = ['attribute', 'created_at', 'updated_at'];
    protected $appends  = ['attribute_id'];

    function attribute() {
        return $this->hasOne('App\Models\AttributeList', 'id', 'attribute_list_id');
    }

    function attr_in_product() {
        return $this->hasMany('App\Models\AttrInProduct', 'id', 'attr_in_product_id');
    }

    public function getAttributeIdAttribute()
    {
        return $this->attribute->attribute_id;
    }
}
