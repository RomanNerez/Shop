<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransCurrency extends Model
{
    protected $table    = 'trans_currencies';
    protected $fillable = ['currency_list_id', 'name', 'abbrev', 'status', 'local'];
    protected $hidden   = ['created_at', 'updated_at'];
}