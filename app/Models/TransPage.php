<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransPage extends Model
{
    protected $table    = 'trans_pages';
    protected $fillable = ['page_id', 'title', 'data', 'local', 'metaTitle', 'metaDesc'];
    protected $hidden   = ['created_at', 'updated_at'];
    protected $casts    = [
        'data' => 'array'
    ];
}
