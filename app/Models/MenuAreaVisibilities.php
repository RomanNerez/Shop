<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuAreaVisibilities extends Model
{
    protected $table = 'menu_area_visibilities';

    protected $casts     = [
        'created_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y',
    ];
}
