<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransAttr extends Model
{
    protected $table    = 'trans_attrs';
    protected $fillable = ['attribute_id', 'title', 'local'];
}
