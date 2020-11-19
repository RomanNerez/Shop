<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model 
{
    use SoftDeletes;

    protected $fillable = ['file','title', 'slug', 'active', 'desc', 'meta_title', 'meta_desc'];

    protected $casts = [
	    'created_at' => 'datetime:d.m.Y',
	];

	protected $hidden = ['updated_at'];

    protected $attributes = [
        'active' => 1,
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function sub_categories()
    {
        return $this->hasMany('App\SubCategories')->active();
    }
    
    public function products()
    {
        return $this->hasMany('App\Products');
    }

    public function productsTwo()
    {
        return $this->hasOneThrough(
            'App\Products',
            'App\SubCategories',
            'categories_id',
            'sub_categories_id',
            'id',
            'id' 
        );
    }
}
