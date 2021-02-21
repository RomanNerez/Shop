<?php


namespace App\Repositories\Publicly;

use App\Models\Categories;
use App\Models\Product;
use App\Repositories\Repository;

class CompareRepository extends Repository
{
    public function data($compare, $request) {
        $categories = [];
        $request->merge([
            'is-catalog' => true
        ]);

        $items = Product::whereIn('id', $compare)->get();

        foreach ($items as $item) {
            if ( !isset($categories[ $item->categories_id ]) ) {
                $categories[ $item->categories_id ] = Categories::where('id', $item->categories_id)->firstOrFail();
            }

            $item->cat = $categories[$item->categories_id];
        }

        return [
            'content' => self::getContent(),
            'items'   => $items,
            'option'  => [
                'prev_page' => url()->previous()
            ]
        ];
    }

    public function getContent() {
        return [
            'meta' => [
                'title' => __('Сравнение товаров'),
                'desc'  => __('Сравнение товаров'),
                'image' => ''
            ]
        ];
    }
}
