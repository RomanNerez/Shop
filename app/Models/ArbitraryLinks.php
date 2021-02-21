<?php

namespace App\Models;

use App\Traits\LocalContentTrait;
use Illuminate\Database\Eloquent\Model;

class ArbitraryLinks extends Model
{
    use LocalContentTrait;

    const TABLE_NAME = 'arbitrary_links';

    protected $translate = 'App\Models\TransArbitraryLinks';

    protected $fillable = ['link'];

    protected $casts     = [
        'created_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y',
    ];

    public function instance()
    {
        return $this->morphTo();
    }
}
