<?php

namespace App\Models;

use App\Traits\LocalContentTrait;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use LocalContentTrait;

    protected $table     = 'groups';
    protected $translate = 'App\Models\TransGroups';
    protected $fillable  = ['categories_id', 'order', 'status', 'slug', 'related'];
    protected $hidden    = ['get_subs'];
    protected $preAppend = [
        ['subs', 'is-catalog']
    ];
    protected $casts     = [
        'created_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y',
    ];

    public function get_subs()
    {
        return $this->hasMany('App\Models\Subs')
                    ->orderBy('order', 'asc')
                    ->orderBy('created_at', 'desc');
    }

    public function getSubsAttribute()
    {
        return $this->get_subs ?? [];
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($group) {
            $group->localeData()->delete();
        });
    }
}
