<?php

namespace App\Models;

use App\Casts\Shielding;
use Illuminate\Database\Eloquent\Model;

class TransCategories extends Model
{
    protected $table    = 'trans_categories';
    protected $fillable = ['categories_id', 'title', 'desc', 'local', 'metaTitle', 'metaDesc'];
    protected $casts    = [
        'desc' => Shielding::class
    ];
}
