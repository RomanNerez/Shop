<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyValue extends Model
{
    protected $table    = 'currency_values';
    protected $fillable = ['first', 'last', 'value'];
    protected $hidden   = ['created_at', 'updated_at'];
    protected $appends  = ['pending'];
    protected $casts    = [
        'value' => 'float'
    ];

    public function getPendingAttribute()
    {
        return false;
    }
}