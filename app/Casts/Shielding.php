<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Shielding implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        return stripcslashes(str_replace('%host%', url('upload'), $value));
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
        return addslashes(str_replace(url('upload'), '%host%', $value));
    }
}
