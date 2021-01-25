<?php

namespace App\Repositories;

use App\Models\Categories;
use App\Models\Collection;

class AppendSubsRepository extends Repository
{
    public function CollectionToCategories() {
        $foo = new Categories();
        $foo->append('subs');
        return [
            'cat' => Categories::all(),
            'col' => Collection::all()
        ];
    }
}
