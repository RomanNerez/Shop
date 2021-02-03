<?php

namespace App\Models;

use App\Traits\LocalContentTrait;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use LocalContentTrait;

    protected $table     = 'attributes';
    protected $translate = 'App\Models\TransAttr';
    protected $fillable  = ['order', 'slug', 'price', 'count', 'status', 'type', 'data', 'related'];
    protected $appends   = ['subs'];
    protected $hidden    = ['get_list'];
    protected $casts     = [
        'created_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y',
    ];

    public function get_list()
    {
        return $this->hasMany('App\Models\AttributeList')
                    ->orderBy('order', 'asc')
                    ->orderBy('created_at', 'desc');
    }

    public function getSubsAttribute()
    {
        return $this->get_list ?? [];
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($group) {
            $group->localeData()->delete();
        });
    }
}
