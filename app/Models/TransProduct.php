<?php

namespace App\Models;

use App\Casts\Shielding;
use Illuminate\Database\Eloquent\Model;

class TransProduct extends Model
{
    protected $table    = 'trans_products';
    protected $fillable = ['product_id', 'local', 'title', 'desc', 'params', 'meta_title', 'meta_desc'];
    protected $casts    = [
        'params' => 'array',
        'desc'   => Shielding::class
    ];


    public function attr()
    {
        return $this->hasMany('App\Models\TransAttrProduct');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($model) {
            $model->attr()->delete();
        });
    }
}