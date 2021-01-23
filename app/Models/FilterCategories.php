<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterCategories extends Model
{
    protected $table    = 'filters_categories';
    protected $fillable = ['trans_categories_id', 'title', 'type', 'unit', 'disabled'];
}