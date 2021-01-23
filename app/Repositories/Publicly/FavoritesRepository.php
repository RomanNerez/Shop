<?php


namespace App\Repositories\Publicly;

use App\Models\Product;
use App\Repositories\Repository;

class FavoritesRepository extends Repository
{
    public function data($favorites, $request) {
        $request->merge([
            'is-catalog' => true
        ]);

        return [
            'content' => self::getContent(),
            'items'   => Product::whereIn('id', $favorites)->get(),
            'option'  => [
                'prev_page' => url()->previous()
            ]
        ];
    }

    public function getContent() {
        return [
            'meta' => [
                'title' => __('Избранное'),
                'desc'  => __('Избранное'),
                'image' => ''
            ]
        ];
    }
}