<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;

    public function sub_categories()
    {
        return $this->hasMany('App\SubCategories');
    }
}
