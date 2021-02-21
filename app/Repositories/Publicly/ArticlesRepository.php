<?php

namespace App\Repositories\Publicly;

use App\Models\Article;
use App\Models\Categories;
use App\Models\Groups;
use App\Models\Subs;
use App\Models\TransArticle;
use App\Repositories\Repository;
use App\Repositories\SearchActionRepository;

class ArticlesRepository extends Repository
{
    protected $searchAction;
    public function __construct(SearchActionRepository $repository)
    {
        $this->searchAction = $repository;
    }
    public function getCatalog($request) {
        $group      = $request->route()->parameter('group');
        $params     = $request->route()->parameter('params');
        $order      = $request->get('order');
        $search     = $request->get('search');
        $_category  = $request->route()->parameter('category');

        if ($group && !$params) {
            abort(404);
        }
        $request->merge([
            'is-catalog' => true
        ]);

        $category = Categories::where([
                ['slug', $_category],
                ['status', 1]
            ])
            ->firstOrFail();

        if ($search) {
            $query = $this->searchAction->get($search, TransArticle::class, Article::class, 'article_id');
        }else{
            $query = Article::where([
                ['categories_id', $category->id],
                ['status', 1]
            ]);
        }

        $subs     = $query->get()->pluck('subs');
        $list     = self::filterList($query, $params, $order);
        $filters  = self::getFilter($subs, $list['data']->get()->pluck('subs'));

        if ( !$list['data']->exists() && !$search ) {
            abort(404);
        }

        return [
            'content'  => self::getContent($category, $list['selected'] ?? null, $_category),
            'list'     => $list['data']->paginate(24),
            'search'   => $search,
            'template' => $category->template,
            'filters'  => [
                'items'    => $filters,
                'selected' => collect($list['selected'])->pluck('id')
            ]
        ];
    }

    public function filterList($list, $params, $order) {
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

                    $data[$group->id] = array_merge($data[$group->id], $subs->inArticle->pluck('article_id')->toArray());
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

            $list = $list->whereIn('id', $result);
        }

        if ($order) {
            $direction = (int) $order === 1 ? 'asc' : 'desc';
            $list = $list->orderBy('price', $direction);
        }

        return [
            'selected' => $selected,
            'data'     => $list->orderBy('id', 'desc')
        ];
    }

    public function getFilter($subs, $list) {
        $check  = [];
        $data   = [];
        $actual = [];

        foreach ($list as $item) {
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

    public function getContent($parent, $subs, $category) {
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

        $breadcrumbs = [
            [
                'name' => __('Главная'),
                'link' => url('/')
            ],[
                'name' => $parent->content->title,
                'link' => url('/articles/'. $category)
            ]
        ];

        $loop = 0;
        foreach (collect($subs)->groupBy('groups_id') as $group) {
            $count = count($breadcrumbs);
            $prev  = $breadcrumbs[$count - 1]['link'] . (!$loop ? '/rubric' : '');
            $link  = $prev .'/'. $group[0]['group']['slug'];
            $names = [];

            foreach ($group as $item) {
                $link .= '_'. $item['slug'];
                $names[] = $item['content']['title'];
            }
            $breadcrumbs[] = [
                'name' => implode(', ', $names),
                'link' => $link
            ];
            ++$loop;
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
            ],
            'breadcrumbs' => $breadcrumbs
        ];
    }
}
