<?php

namespace App\Repositories\Publicly;

use App\Models\Attribute;
use App\Models\Product;
use App\Repositories\Repository;

class ProductRepository extends Repository
{
    public function getProduct($request) {
        $params = [
            'attribute' => $request->route()->parameter('attribute'),
            'option'    => $request->route()->parameter('option')
        ];
        if ($params['option'] && !$params['attribute']) {
            abort(404);
        }

        $attribute = self::getAttribute( $params['attribute'] );
        $product   = Product::where([
                ['slug', $request->route()->parameter('id')],
                ['status', 1]
            ])
            ->firstOrFail();

        return [
            'content'  => self::getContent($product, $attribute),
            'product'  => self::getData($product, $attribute),
            'reviews'  => $product->reviews
        ];
    }

    public function getAttribute($attributes) {
        $data = [];
        if ($attributes) {
            $attributes = explode('/', $attributes);

            foreach ($attributes as $attribute) {
                $query = explode('_', $attribute);

                if (count($query) < 2) {
                    abort(404);
                }

                $group = Attribute::where('slug', $query[0])->firstOrFail();
                $subs  = $group->subs->where('slug', $query[1])->first();

                if ( !isset($subs->id) ) {
                    abort(404);
                }

                $data[$group->id] = $subs->id;
            }
        }

        return count($data) ? $data : null;
    }

    public function getData($product, $attribute) {
        $attr = [];

        foreach ($product->attr as $key => $group) {
            $data  = Attribute::where('id', $key)->firstOrFail();
            $subs  = array_values( $data->subs->whereIn('id', $group)->toArray() );

            $attr[] = [
                'group' => $data,
                'subs'  => $subs,
                'selected' => isset($attribute[$data->id]) ? $attribute[$data->id] : $subs[0]['id']
            ];
        }
        return [
            'id'         => $product->id,
            'title'      => $product->content['title'],
            'hit'        => $product->hit,
            'new'        => $product->new,
            'desc'       => $product->content['desc'],
            'images'     => $product->images,
            'price'      => $product->price,
            'count'      => $product->count,
            'draw'       => $product->draw,
            'params'     => $product->content['params'],
            'related'    => $product->related->pluck('related'),
            'related_to' => $product->related_to,
            'attr'       => $attr
        ];
    }

    public function getContent($product, $attribute) {
        $images = self::getAttrContent($product->images, $attribute);
        return [
            'meta' => [
                'title' => self::getAttrContent($product->content['meta_title'], $attribute),
                'desc'  => self::getAttrContent($product->content['meta_desc'], $attribute),
                'image' => $images[0]->source
            ],
            'body' => [
                'desc' => self::getAttrContent($product->content['desc'], $attribute)
            ],
            'breadcrumbs' => self::getBreadcrumbs($product)
        ];
    }

    public function getAttrContent($data, $attribute) {
        if ($attribute && count($data['attrs'])) {
            $attribute = array_values($attribute);

            $find = null;
            foreach ($data['attrs'] as $attr) {
                $check = 0;
                foreach ($attr['keys'] as $key) {
                    if ( in_array($key, $attribute) ) {
                        ++$check;
                    }
                }
                if ($check === count($attr['keys'])) {
                    $find = $attr['value'];
                }
            }

            if ( $find ) {
                return $find;
            }else{
                return $data['base'];
            }
        }else{
            return $data['base'];
        }
    }

    public function getBreadcrumbs($product)
    {
        $breadcrumbs = [
            [
                'name' => __('Главная'),
                'link' => url('/')
            ]
        ];

        switch ($product->related_to) {
            case 'services':
                $breadcrumbs[] = [
                    'name' => __('Услуги'),
                    'link' => url('/services')
                ];
                break;
        }
        $breadcrumbs[] = [
            'name' => $product->category->content['title'],
            'link' => $product->category->url
        ];

        $breadcrumbs[] = [
            'name' => $product->content['title'],
            'link' => $product->url
        ];

        return $breadcrumbs;
    }
}
