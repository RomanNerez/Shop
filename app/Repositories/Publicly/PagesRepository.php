<?php

namespace App\Repositories\Publicly;

use App\Models\Page;
use App\Models\Product;
use App\Repositories\Repository;

class PagesRepository extends Repository
{
    public function data($key) {
        $page = Page::where('key', $key)->firstOrFail();
        $data = $this->{$key}($page);

        return [
            'content' => [
                'meta' => [
                    'title' => $page->content->metaTitle,
                    'desc'  => $page->content->metaDesc,
                    'image' => $page->image
                ],
                'body' => [
                    'title' => $page->content->title,
                    'base'  => $data['base'],
                    'local' => $page->content->data
                ],
                'breadcrumbs' => $data['breadcrumbs'] ?? []
            ]
        ];
    }

    public function home($model) {
        return [
            'base' => $model->data
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
            'base' => $model->data
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
        return [
            'base' => $model->data
        ];
    }
}
