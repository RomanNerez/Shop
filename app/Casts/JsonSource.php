<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class JsonSource implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        return json_decode(str_replace('%host%', url('/'), $value), true);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  string  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        return str_replace(str_replace('/', '\\/', url('/')), '%host%', json_encode($value));
    }
}
