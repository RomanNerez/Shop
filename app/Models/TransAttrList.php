<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransAttrList extends Model
{
    protected $table = 'trans_attr_lists';
    protected $fillable = ['attribute_list_id', 'title', 'local'];
}
