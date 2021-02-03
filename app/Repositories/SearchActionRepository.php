<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\TransProduct;

class SearchActionRepository extends Repository
{
    public function get($query, $locale, $model, $related) {
        $list = $locale::where('title', 'like', '%'. $query .'%')->pluck($related);
        return $model::whereIn('id', $list)->where('status', 1);
    }
}
