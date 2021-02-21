<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransOption extends Model
{
    protected $table     = 'trans_options';
    protected $fillable  = ['title', 'short_desc', 'schedule', 'desc', 'addr'];
    protected $casts     = [
        'created_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y',
        'addr'       => 'array'
    ];
}
