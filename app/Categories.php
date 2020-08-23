<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'active'];

    protected $casts = [
	    'created_at' => 'datetime:d.m.Y',
	];

	protected $hidden = ['updated_at'];

    public function sub_categories()
    {
        return $this->hasMany('App\SubCategories');
    }
    public function products()
    {
        return $this->hasMany('App\Products');
    }
}
