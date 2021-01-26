<?php

namespace App\Repositories\Publicly;

use App\Models\Categories;
use App\Models\Collection;
use App\Models\Groups;
use App\Models\Product;
use App\Models\Subs;
use App\Repositories\Repository;

class CatalogRepository extends Repository
{
    public function getCatalog($request) {
        $group      = $request->route()->parameter('group');
        $params     = $request->route()->parameter('params');
        $collection = $request->route()->parameter('collection');
        $order      = $request->get('order');

        if ($group && !$params) {
            abort(404);
        }
        $request->merge([
            'is-catalog' => true
        ]);

        $category = Categories::where([
            ['slug', $request->route()->parameter('category')],
            ['status', 1]
        ])
        ->firstOrFail();

        if ($collection) {
            $collection = Collection::where([
                ['slug', $collection],
                ['categories_id', $category->id],
                ['status', 1]
            ])
            ->firstOrFail();
        }

        $where = [['status', 1]];

        if (!$category->is_root) {
            $where[] = ['categories_id', $category->id];
        }

        $query    = self::getProduct($where, $collection);
        $subs     = $query->get()->pluck('subs');
        $products = self::filterProduct($query, $params, $order);
        $filters  = self::getFilter($subs, $products['data']->pluck('subs'));

        if ( !count($products['data']) ) {
            abort(404);
        }

        return [
            'content'  => self::getContent($collection ? $collection : $category, $products['selected'] ?? null),
            'list'     => $products['data'],
            'filters'  => [
                'items'    => $filters,
                'selected' => collect($products['selected'])->pluck('id')
            ]
        ];
    }

    public function getProduct($where, $collection) {
        $products = Product::where($where);
        if ($collection) {
            $items  = array_column($collection->subs, 'subs_id');
            $subs   = Subs::whereIn('id', $items)->get();
            $data   = [];
            $result = [];
            $check  = [
                'count' => 0,
                'subs'  => 0
            ];
            foreach ($subs as $sub) {
                if ( !isset($data[$sub->id]) ) {
                    $data[$sub->id] = [];
                }
                $data[$sub->id] = $sub->inProduct->pluck('product_id')->toArray();

                if ( $check['count'] < count($data[$sub->id]) ) {
                    $check['count'] = count($data[$sub->id]);
                    $check['subs']  = $sub->id;
                }
            }

            if ( isset($data[$check['subs']]) ) {
                foreach ($data[$check['subs']] as $item) {
                    $counter = 0;
                    foreach ($data as $key => $sub) {
                        if ($key !== $check['subs'] && in_array($item, $sub)) {
                            ++$counter;
                        }
                    }
                    if ($counter === (count($data) - 1)) {
                        $result[] = $item;
                    }
                }
            }

            $products = $products->whereIn('id', $result);
        }
        return $products;
    }

    public function filterProduct($products, $params, $order) {
        $selected = [];

        if ($params) {
            $params = explode('/', $params);
            $data     = [];
            $result   = [];
            $check    = [
                'count' => 0,
                'group' => 0
            ];

            foreach ($params as $param) {
                $query = explode('_', $param);

                if (count($query) < 2) {
                    abort(404);
                }

                $group = Groups::where('slug', $query[0])->firstOrFail();

                if ( !isset($data[$group->id]) ) {
                    $data[$group->id] = [];
                }

                for ($i = 1; $i < count($query); $i++) {
                    $subs = Subs::where([
                                ['groups_id', $group->id],
                                ['slug', $query[$i]],
                            ])
                            ->firstOrFail();

                    $data[$group->id] = array_merge($data[$group->id], $subs->inProduct->pluck('product_id')->toArray());
                    $subs->group = $group;
                    $selected[] = $subs;
                }

                $data[$group->id] = array_unique($data[$group->id]);

                if ( $check['count'] < count($data[$group->id]) ) {
                    $check['count'] = count($data[$group->id]);
                    $check['group'] = $group->id;
                }
            }

            foreach ($data[$check['group']] as $sub) {
                $counter = 0;
                foreach ($data as $key => $group) {
                    if ($key !== $check['group'] && in_array($sub, $group)) {
                        ++$counter;
                    }
                }
                if ($counter === (count($data) - 1)) {
                    $result[] = $sub;
                }
            }

            $products = $products->whereIn('id', $result);
        }

        if ($order) {
            $direction = (int) $order === 1 ? 'asc' : 'desc';
            $products = $products->orderBy('price', $direction);
        }

        return [
            'selected' => $selected,
            'data'     => $products->orderBy('id', 'desc')->get()
        ];
    }

    public function getFilter($subs, $product) {
        $check  = [];
        $data   = [];
        $actual = [];

        foreach ($product as $item) {
            $actual = array_merge($actual, $item);
        }
        unset($item);
        $actual = array_unique($actual);

        foreach ($subs as $sub) {
            foreach ($sub as $item) {
                if ( !isset($check[$item]) ) {
                    $check[$item] = 0;
                }
                ++$check[$item];
            }
        }
        unset($item);
        unset($sub);

        foreach ($check as $key => $item) {
            if ( $item < count($subs) ) {
                $sub = Subs::find($key);

                if ( !isset($data[$sub->groups_id]) ) {
                    $data[$sub->groups_id] = [
                        'group'    => $sub->group,
                        'enabled'  => 0,
                        'show'     => true,
                        'items'    => []
                    ];
                }
                $data[$sub->groups_id]['items'][] = [
                    'item'  => $sub,
                    'disabled' => !in_array($sub->id, $actual),
                    'count' => $item
                ];

                if (in_array($sub->id, $actual)) {
                    $data[$sub->groups_id]['enabled']++;
                }

                usort($data[$sub->groups_id]['items'], function($a, $b) {
                    $delta = $a['item']['order'] - $b['item']['order'];

                    if ( $delta ) {
                        return $delta;
                    }else{
                        return $a['item']['id'] - $b['item']['id'];
                    }
                });
            }
        }

        usort($data, function($a, $b) {
            $delta = $a['group']['order'] - $b['group']['order'];

            if ( $delta ) {
                return $delta;
            }else{
                return $a['group']['id'] - $b['group']['id'];
            }
        });

        return array_values($data);
    }

    public function getContent($parent, $subs) {
        $data = $parent->content;
        if ($subs) {
            if ( count($subs) === 1 ) {
                $check = $subs[0];

                if ( !$check->content->metaTitle ) {
                    $check->content->metaTitle = $data->metaTitle .'. '. $check->group->content->title .' - '. $check->content->title;
                }
                if ( !$check->content->metaDesc ) {
                    $check->content->metaDesc = $data->metaDesc .'. '. $check->group->content->title .' - '. $check->content->title;
                }

                $check->content->title = $check->content->full_title;
                if ( !$check->content->title ) {
                    $check->content->title = $data->title;
                }
                if ( !$check->content->desc ) {
                    $check->content->desc = $data->desc;
                }

                $data = $check->content;
            }else{
                $collect = collect($subs)->unique('groups_id');
                if ( $collect->count() === 1 ) {
                    $check = $collect->first()->group->content;

                    $check->title = $check->full_title;
                    if ( !$check->title ) {
                        $check->title = $data->title;
                    }
                    if ( !$check->desc ) {
                        $check->desc = $data->desc;
                    }
                }

                if ( !isset($check) || (!$check->metaTitle || !$check->metaDesc) ) {
                    if ( !isset($check) ) {
                        $check = $data;
                        $is_set = true;
                    }
                    $group = [];

                    foreach ($subs as $item) {
                        if ( !isset($group[$item->groups_id]) ) {
                            $group[$item->groups_id] = [
                                'group' => $item->group->content->title,
                                'items' => []
                            ];
                        }
                        $group[$item->groups_id]['items'][] = $item->content->title;
                    }
                    unset($item);

                    foreach ($group as &$item) {
                        $determinate = count($item['items']) > 1 ? ': ' : ' - ';
                        $item = $item['group'] . $determinate . implode(', ', $item['items']);
                    }

                    $group = implode('. ', $group);

                    if (isset($is_set) || !$check->metaTitle) {
                        $title_determinate = mb_substr($data->metaTitle, -1) === '.' ? ' ' : '. ';

                        $check->metaTitle = $data->metaTitle . $title_determinate . $group;
                        $check->metaTitle = strlen($check->metaTitle) > 120 ? mb_substr( $check->metaTitle, 0, 120, 'UTF-8' ) .'...' : $check->metaTitle;
                    }

                    if (isset($is_set) || !$check->metaDesc) {
                        $desc_determinate  = mb_substr($data->metaDesc, -1) === '.' ? ' ' : '. ';

                        $check->metaDesc = $data->metaDesc . $desc_determinate . $group;
                        $check->metaDesc = strlen($check->metaDesc) > 200 ? mb_substr( $check->metaDesc, 0, 200, 'UTF-8' ) .'...' : $check->metaDesc;
                    }
                }

                $data = $check;
            }
        }

        return [
            'meta' => [
                'title'  => $data->metaTitle,
                'desc'   => $data->metaDesc,
                'image'  => $parent->file,
            ],

            'body' => [
                'title' => $data->title,
                'desc'  => $data->desc
            ]
        ];
    }
}