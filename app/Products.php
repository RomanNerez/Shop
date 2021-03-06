<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;

    protected $casts = [
	    'created_at' => 'datetime:d.m.Y',
	    'updated_at' => 'datetime:d.m.Y',
	];

	protected $fillable = ['sub_categories_id','title', 'slug', 'description', 'photos', 'price', 'brand', 'manufacturer', 'material', 'active'];

	public function sub_category()
    {
        return $this->hasMany('App\SubCategories', 'id', 'sub_categories_id');
    }
}
