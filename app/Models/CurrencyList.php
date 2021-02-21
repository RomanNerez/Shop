<?php

namespace App\Models;

use App\Traits\LocalContentTrait;
use Illuminate\Database\Eloquent\Model;

class CurrencyList extends Model
{
    use LocalContentTrait;

    protected $table     = 'currency_lists';
    protected $translate = 'App\Models\TransCurrency';
    protected $fillable  = ['symbol', 'code'];
    protected $hidden    = ['created_at', 'updated_at'];

    public static function boot() {
        parent::boot();

        static::deleting(function($model) {
            CurrencyValue::where('first', $model->id)
                        ->orWhere('last', $model->id)
                        ->delete();

            $model->localeData()->delete();
        });
    }
}
