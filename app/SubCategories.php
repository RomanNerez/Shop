<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategories extends Model
{
    use SoftDeletes;

    protected $fillable = ['categories_id', 'title', 'slug', 'active'];

    protected $casts = [
	    'created_at' => 'datetime:d.m.Y',
	];

    public function products()
    {
        return $this->hasMany('App\Products');
    }

    public function category()
    {
        return $this->hasMany('App\Categories', 'id', 'categories_id');
    }
}
