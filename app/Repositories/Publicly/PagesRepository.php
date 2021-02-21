<?php

namespace App\Repositories\Publicly;

use App\Models\Categories;
use App\Models\Page;
use App\Models\Review;
use App\Models\Subs;
use App\Repositories\Repository;

class PagesRepository extends Repository
{
    public function data($key) {
        $page = Page::where('key', $key)->firstOrFail();
        $data = $this->{$key}($page);

        $output = [
            'content' => [
                'meta' => [
                    'title' => $page->content->metaTitle,
                    'desc'  => $page->content->metaDesc,
                    'image' => $page->image
                ],
                'body' => [
                    'title' => $page->content->title,
                    'base'  => $data['base'],
                    'local' => $data['local'] ?? $page->content->data
                ],
                'breadcrumbs' => $data['breadcrumbs'] ?? []
            ]
        ];

        if (isset($data['params'])) {
            $output['params'] = $data['params'];
        }
        if (isset($data['image'])) {
            $output['content']['body']['image'] = $data['image'];
        }

        return $output;
    }

    public function home($model) {
        $data    = $model->data;
        $filters = [];


        foreach ($data['filter'] as $item) {
            $sub = Subs::find($item);

            if ( !isset($filters[$sub->groups_id]) ) {
                $filters[$sub->groups_id] = [
                    'group' => $sub->group,
                    'items' => []
                ];
            }
            $filters[$sub->groups_id]['items'][] = $sub;

            usort($filters[$sub->groups_id]['items'], function($a, $b) {
                $delta = $a['order'] - $b['order'];

                if ( $delta ) {
                    return $delta;
                }else{
                    return $a['id'] - $b['id'];
                }
            });
        }

        usort($filters, function($a, $b) {
            $delta = $a['group']['order'] - $b['group']['order'];

            if ( $delta ) {
                return $delta;
            }else{
                return $a['group']['id'] - $b['group']['id'];
            }
        });

        return [
            'base'   => [
                'reviews'  => Review::where('rating', '>', 3)->orderBy('id', 'desc')->take(18)->get(),
                'partners' => $data['partners']
            ],
            'params' => [
                'catalog' => Categories::where('is_root', true)->value('slug'),
                'filters' => $filters
            ]
        ];
    }

    public function services($model) {
        return [
            'base' => $model->data
        ];
    }

    public function vinyls($model) {
        $parent = Page::where('key', 'services')->firstOrFail();

        return [
            'base'        => $model->data,
            'breadcrumbs' => [
                [
                    'name' => __('Главная'),
                    'link' => url('/')
                ],[
                    'name' => $parent->content->title,
                    'link' => $parent->url
                ],[
                    'name' => $model->content->title,
                    'link' => $model->url
                ]
            ]
        ];
    }

    public function standing($model) {
        $parent = Page::where('key', 'services')->firstOrFail();

        return [
            'base' => $model->data,
            'breadcrumbs' => [
                [
                    'name' => __('Главная'),
                    'link' => url('/')
                ],[
                    'name' => $parent->content->title,
                    'link' => $parent->url
                ],[
                    'name' => $model->content->title,
                    'link' => $model->url
                ]
            ]
        ];
    }

    public function delivery($model) {
        return [
            'base' => $model->data
        ];
    }

    public function contacts($model) {
        return [
            'base' => $model->data
        ];
    }

    public function calculator($model) {
        return [
            'base' => $model->data
        ];
    }

    public function units($model) {
        return [
            'base' => [
                'items' => [
                    [
                        'id'     => 1,
                        'show'   => false,
                        'title'  => __('Магнитный поток'),
                        'desc'   => __('units.magnit_potok'),
                        'img'    => url('library/img/units__img-1.jpg'),
                        'value'  => 1,
                        'units'  => [
                            'selected' => ['Wb', 'Mx'],
                            'items'    => [
                                [
                                    'name'  => __('Вебер'),
                                    'key'   => 'Wb',
                                    'label' => __('Вебер') .' (Wb)',

                                ],[
                                    'name'  => __('Максвелл'),
                                    'key'   => 'Mx',
                                    'label' => __('Максвелл') .' (Mx)'
                                ],[
                                    'name'  => __('Вебер-1'),
                                    'key'   => 'Wb1',
                                    'label' => __('Вебер-1') .' (Wb1)'
                                ],[
                                    'name'  => __('Максвелл-1'),
                                    'key'   => 'Mx1',
                                    'label' => __('Максвелл-1') .' (Mx1)'
                                ]
                            ],
                            'values' => [
                                'Wb/Mx' => 10**8,
                                'Wb/Wb1' => 1,
                                'Wb/Mx1' => 10**8,
                                'Mx/Wb1' => 10**(-8),
                                'Mx/Mx1' => 1,
                                'Wb1/Mx1' => 10**8
                            ]
                        ]
                    ],
                    [
                        'id'     => 2,
                        'show'   => false,
                        'title'  => __('Плотность магнитного потока'),
                        'desc'   => __('units.plotnost_potoka'),
                        'img'    => url('library/img/units__img-2.jpg'),
                        'value'  => 1,
                        'units'  => [
                            'selected' => ['Wb', 'Mx'],
                            'items'    => [
                                [
                                    'name'  => __('Вебер'),
                                    'key'   => 'Wb',
                                    'label' => __('Вебер') .' (Wb)',

                                ],[
                                    'name'  => __('Максвелл'),
                                    'key'   => 'Mx',
                                    'label' => __('Максвелл') .' (Mx)'
                                ],[
                                    'name'  => __('Вебер-1'),
                                    'key'   => 'Wb1',
                                    'label' => __('Вебер-1') .' (Wb1)'
                                ],[
                                    'name'  => __('Максвелл-1'),
                                    'key'   => 'Mx1',
                                    'label' => __('Максвелл-1') .' (Mx1)'
                                ]
                            ],
                            'values' => [
                                'Wb/Mx' => 10**8,
                                'Wb/Wb1' => 1,
                                'Wb/Mx1' => 10**8,
                                'Mx/Wb1' => 10**(-8),
                                'Mx/Mx1' => 1,
                                'Wb1/Mx1' => 10**8
                            ]
                        ]
                    ],[
                        'id'     => 3,
                        'show'   => false,
                        'title'  => __('Напряженность поля'),
                        'desc'   => __('units.napryazhenie_polya'),
                        'img'    => url('library/img/units__img-3.jpg'),
                        'value'  => 1,
                        'units'  => [
                            'selected' => ['Wb', 'Mx'],
                            'items'    => [
                                [
                                    'name'  => __('Вебер'),
                                    'key'   => 'Wb',
                                    'label' => __('Вебер') .' (Wb)',

                                ],[
                                    'name'  => __('Максвелл'),
                                    'key'   => 'Mx',
                                    'label' => __('Максвелл') .' (Mx)'
                                ],[
                                    'name'  => __('Вебер-1'),
                                    'key'   => 'Wb1',
                                    'label' => __('Вебер-1') .' (Wb1)'
                                ],[
                                    'name'  => __('Максвелл-1'),
                                    'key'   => 'Mx1',
                                    'label' => __('Максвелл-1') .' (Mx1)'
                                ]
                            ],
                            'values' => [
                                'Wb/Mx' => 10**8,
                                'Wb/Wb1' => 1,
                                'Wb/Mx1' => 10**8,
                                'Mx/Wb1' => 10**(-8),
                                'Mx/Mx1' => 1,
                                'Wb1/Mx1' => 10**8
                            ]
                        ]
                    ],[
                        'id'     => 4,
                        'show'   => false,
                        'title'  => __('BH MAX - максимальный энергетический продукт'),
                        'desc'   => __('units.max_energo_product'),
                        'img'    => url('library/img/units__img-4.jpg'),
                        'value'  => 1,
                        'units'  => [
                            'selected' => ['Wb', 'Mx'],
                            'items'    => [
                                [
                                    'name'  => __('Вебер'),
                                    'key'   => 'Wb',
                                    'label' => __('Вебер') .' (Wb)',

                                ],[
                                    'name'  => __('Максвелл'),
                                    'key'   => 'Mx',
                                    'label' => __('Максвелл') .' (Mx)'
                                ],[
                                    'name'  => __('Вебер-1'),
                                    'key'   => 'Wb1',
                                    'label' => __('Вебер-1') .' (Wb1)'
                                ],[
                                    'name'  => __('Максвелл-1'),
                                    'key'   => 'Mx1',
                                    'label' => __('Максвелл-1') .' (Mx1)'
                                ]
                            ],
                            'values' => [
                                'Wb/Mx' => 10**8,
                                'Wb/Wb1' => 1,
                                'Wb/Mx1' => 10**8,
                                'Mx/Wb1' => 10**(-8),
                                'Mx/Mx1' => 1,
                                'Wb1/Mx1' => 10**8
                            ]
                        ]
                    ],[
                        'id'     => 5,
                        'show'   => false,
                        'title'  => __('Магнитный дипольный момент (м)'),
                        'desc'   => __('units.magnit_dop_moment'),
                        'value'  => 1,
                        'units'  => [
                            'selected' => ['Wb', 'Mx'],
                            'items'    => [
                                [
                                    'name'  => __('Вебер'),
                                    'key'   => 'Wb',
                                    'label' => __('Вебер') .' (Wb)',

                                ],[
                                    'name'  => __('Максвелл'),
                                    'key'   => 'Mx',
                                    'label' => __('Максвелл') .' (Mx)'
                                ],[
                                    'name'  => __('Вебер-1'),
                                    'key'   => 'Wb1',
                                    'label' => __('Вебер-1') .' (Wb1)'
                                ],[
                                    'name'  => __('Максвелл-1'),
                                    'key'   => 'Mx1',
                                    'label' => __('Максвелл-1') .' (Mx1)'
                                ]
                            ],
                            'values' => [
                                'Wb/Mx' => 10**8,
                                'Wb/Wb1' => 1,
                                'Wb/Mx1' => 10**8,
                                'Mx/Wb1' => 10**(-8),
                                'Mx/Mx1' => 1,
                                'Wb1/Mx1' => 10**8
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }

    public function returns($model) {
        return [
            'base' => $model->data
        ];
    }

    public function certificates($model) {
        return [
            'base' => $model->data
        ];
    }

    public function partnership($model) {
        $local = $model->content->data;

        foreach ($local as &$item) {
            $path = base_path('public'. parse_url($item['link'], PHP_URL_PATH));
            $item['file'] = [
                'update_at' => date('d.m.Y', filectime($path)),
                'name'      => basename($path)
            ];
        }
        return [
            'base'  => $model->data,
            'local' => $local
        ];
    }

    public function policy($model) {
        return [
            'base'  => $model->data,
            'image' => $model->image
        ];
    }

    public function measuring($model) {
        return [
            'base' => [
                'items' => Page::whereIn('key', ['calculator', 'units'])->get()
            ]
        ];
    }
}
