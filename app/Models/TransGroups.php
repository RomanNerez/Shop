<?php

namespace App\Models;

use App\Casts\Shielding;
use Illuminate\Database\Eloquent\Model;

class TransGroups extends Model
{
    protected $table    = 'trans_groups';
    protected $fillable = ['groups_id', 'title', 'full_title', 'desc', 'local', 'metaTitle', 'metaDesc'];
    protected $casts    = [
        'desc' => Shielding::class
    ];
}