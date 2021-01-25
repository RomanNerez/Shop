<?php

namespace App\Models;

use App\Traits\LocalContentTrait;
use Illuminate\Database\Eloquent\Model;

class Subs extends Model
{
    use LocalContentTrait;

    protected $table     = 'subs';
    protected $translate = 'App\Models\TransSubs';
    protected $fillable  = ['groups_id', 'order', 'status', 'slug'];
    protected $casts     = [
        'created_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y',
    ];

    public function collections()
    {
        return $this->hasMany('App\Models\GroupsInCollect', 'subs_id');
    }

    public function inProduct()
    {
        return $this->hasMany('App\Models\SubsInProducts', 'subs_id');
    }

    public function inArticle()
    {
        return $this->hasMany('App\Models\GroupsInArticle', 'subs_id');
    }

    public function group()
    {
        return $this->hasOne('App\Models\Groups', 'id', 'groups_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($subs) {
            $subs->localeData()->delete();
            $subs->inProduct()->delete();
            $subs->inArticle()->delete();
            $subs->collections()->delete();
        });
    }
}
