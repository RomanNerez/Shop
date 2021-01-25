<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubsInProducts extends Model
{
    protected $table    = 'subs_in_products';
    protected $fillable = ['product_id', 'subs_id'];

    public function data()
    {
        return $this->hasOne('App\Models\Subs', 'id', 'subs_id');
    }
}
