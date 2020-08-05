<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategories extends Model
{
    use SoftDeletes;

    public function products()
    {
        return $this->hasMany('App\Products');
    }
}
