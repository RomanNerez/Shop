<?php


namespace App\Repositories\Publicly;

use App\Models\AttributeList;
use App\Models\Product;
use App\Repositories\Repository;

class CartRepository extends Repository
{
    protected $productRepository;

    public function __construct(ProductRepository $repository)
    {
        $this->productRepository = $repository;
    }

    public function data($cart) {
        $items = [];
        foreach ($cart as $item) {
            $product = Product::where('id', $item['id'])->firstOrFail();
            $items[] = self::getData($product, $item['attr'], $item['count']);
        }

        return [
            'content'  => self::getContent(),
            'items'    => $items,
            'option'   => [
                'min_price' => 200,
                'prev_page' => url()->previous()
            ]
        ];
    }

    public function getData($product, $attribute, $count) {
        $images = $this->productRepository->getAttrContent($product->images, $attribute);
        $price  = $this->productRepository->getAttrContent($product->price, $attribute);
        $bulk   = [];
        $attr   = self::getAttribute($attribute);
        $url    = $product->url;
        $slug   = $product->slug;
        $title  = $product->content['title'];

        if ($attr) {
            $url .= '/option/'. $attr['slug'];
            $slug .= '/'. $attr['slug'];
            $title .= ' ('. $attr['name'] .')';
        }

        foreach ($product->price['bulk'] as $item) {
            $item['price'] = round(($price['origin'] - ($price['origin'] * ($item['sale'] / 100))) * 100) / 100;
            $bulk[] = $item;
        }

        return [
            'id'       => $product->id,
            'attr'     => $attribute,
            'title'    => $title,
            'url'      => $url,
            'slug'     => $slug,
            'image'    => $images[0]->source,
            'count'    => $this->productRepository->getAttrContent($product->count, $attribute),
            'quantity' => $count,
            'price'    => [
                'value' => $price,
                'data'  => [
                    'currency' => $product->price['currency'],
                    'bulk'     => $bulk
                ]
            ]
        ];
    }

    public function getAttribute($attributes) {
        if ($attributes) {
            $name = [];
            $slug = [];

            foreach ($attributes as $attribute) {
                $subs  = AttributeList::where('id', $attribute)->firstOrFail();
                $group = $subs->group;

                $name[] = mb_convert_case($subs->content->title, MB_CASE_TITLE_SIMPLE, 'UTF-8');
                $slug[] = $group->slug .'_'. $subs->slug;
            }

            return [
                'name' => implode(', ', $name),
                'slug' => implode('/', $slug)
            ];
        }

        return null;
    }

    public function getContent() {
        return [
            'meta' => [
                'title' => __('Корзина'),
                'desc'  => __('Корзина'),
                'image' => ''
            ]
        ];
    }
}