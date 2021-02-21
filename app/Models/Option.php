<?php

namespace App\Models;

use App\Casts\JsonSource;
use App\Casts\PathTo;
use App\Traits\LocalContentTrait;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use LocalContentTrait;

    protected $table     = 'options';
    protected $translate = ['App\Models\TransOption', 'option_id'];
    protected $fillable  = ['socials', 'emails', 'phones', 'logo_color', 'logo_light', 'logo_dark'];
    protected $casts     = [
        'created_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y',
        'socials'    => JsonSource::class,
        'logo_color' => PathTo::class,
        'logo_light' => PathTo::class,
        'logo_dark'  => PathTo::class
    ];
}
