<?php

namespace App\Repositories\Publicly;

use App\Models\Product;
use App\Models\TransProduct;
use App\Repositories\Repository;
use App\Repositories\SearchActionRepository;

class SearchRepository extends Repository
{
    protected $searchAction;
    public function __construct(SearchActionRepository $repository)
    {
        $this->searchAction = $repository;
    }

    public function getProduct($request) {
        $query = $request->get('query');

        if (!$query) {
            abort(404);
        }

        $order = $request->get('order');

        $request->merge([
            'is-catalog' => true
        ]);

        $products = $this->searchAction->get($query, TransProduct::class, Product::class, 'product_id');

        if ( $order ) {
            $direction = (int) $order === 1 ? 'asc' : 'desc';
            $products = $products->orderBy('price', $direction);
        }

        return $products->orderBy('id', 'desc')->get();
    }

    public function getData($products, $query) {
        return [
            'content' => self::getContent(),
            'items'   => $products,
            'query'   => $query
        ];
    }

    public function getContent() {
        return [
            'meta' => [
                'title' => 'Результаты поиска',
                'desc'  => 'Результаты поиска',
                'image' => ''
            ]
        ];
    }
}