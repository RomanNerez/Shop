<?php

namespace App\Models;

use App\Casts\Shielding;
use Illuminate\Database\Eloquent\Model;

class TransCollection extends Model
{
    protected $table    = 'trans_collections';
    protected $fillable = ['collections_id', 'title', 'desc', 'local', 'metaTitle', 'metaDesc'];
    protected $casts    = [
        'desc' => Shielding::class
    ];
}
