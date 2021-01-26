<?php

namespace App\Repositories\Publicly;

use App\Models\Article;
use App\Models\Attribute;
use App\Repositories\Repository;

class ArticleRepository extends Repository
{
    public function getArticle($request) {
        $article = Article::where([
                ['slug', $request->route()->parameter('article')],
                ['status', 1]
            ])
            ->firstOrFail();

        return [
            'content' => self::getContent($article)
        ];
    }

    public function getContent($article) {
        return [
            'meta' => [
                'title' => $article->content['metaTitle'],
                'desc'  => $article->content['metaDesc'],
                'image' => $article->file
            ],
            'body' => [
                'image'   => $article->file,
                'title'   => $article->content->title,
                'content' => $article->content->content
            ],
            'breadcrumbs' => [
                [
                    'name' => __('Главная'),
                    'link' => url('/')
                ],[
                    'name' => $article->category->content->title,
                    'link' => $article->category->url
                ],[
                    'name' => $article->content->title,
                    'link' => $article->url
                ]
            ]
        ];
    }
}