<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public $timestamps = false;

    protected $fillable = [
        'instance_id',
        'instance_type',
        'parent_id',
        'area_visibility_id',
        'order'
    ];

    protected $with = [
        'instance'
    ];

    public function instance()
    {
        return $this->morphTo();
    }
}
