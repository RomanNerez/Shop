<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $table = 'cart';

    public function products()
    {
        return $this->hasMany('App\Products');
    }
}
