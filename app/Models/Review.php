<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table    = 'reviews';
    protected $fillable = ['product_id', 'name', 'email', 'message', 'rating'];
    protected $hidden   = ['get_product'];
    protected $appends  = ['product'];
    protected $casts    = [
        'created_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y'
    ];

    public function get_product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function getProductAttribute()
    {
        $product = $this->get_product;
        return [
            'url'   => $product->url,
            'title' => $product->content['title'],
            'image' => $product->images['base'][0]->source
        ];
    }
}