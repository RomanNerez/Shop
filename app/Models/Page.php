<?php

namespace App\Models;

use App\Casts\JsonSource;
use App\Casts\PathTo;
use App\Traits\LocalContentTrait;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use LocalContentTrait;

    protected $translate = 'App\Models\TransPage';
    protected $table     = 'pages';
    protected $fillable  = ['key', 'link', 'image', 'data'];
    protected $appends   = ['url'];
    protected $casts     = [
        'created_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y',
        'image'      => PathTo::class,
        'data'       => JsonSource::class
    ];

    public function getUrlAttribute()
    {
        return url( $this->link );
    }
}
