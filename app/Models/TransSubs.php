<?php

namespace App\Models;

use App\Casts\Shielding;
use Illuminate\Database\Eloquent\Model;

class TransSubs extends Model
{
    protected $table = 'trans_subs';
    protected $fillable = ['subs_id', 'title', 'full_title', 'desc', 'local', 'metaTitle', 'metaDesc'];
    protected $casts    = [
        'desc' => Shielding::class
    ];
}