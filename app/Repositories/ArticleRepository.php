<?php
namespace App\Repositories;

use App\Models\Article;
use App\Models\GroupsInArticle;
use App\Models\TransArticle;
use Illuminate\Support\Facades\DB;

class ArticleRepository extends Repository
{
    public function create($request)
    {
        $data  = $request->input('data');
        $check = Article::where([
            ['slug', $data['slug']],
            ['categories_id', $data['parent']]
        ])->exists();

        if ($data['slug'] && $check) {
            abort(422, 'Такая ссылка уже существует');
        }

        return self::insert($data);
    }

    public function copy($request)
    {
        $model = Article::find( $request->input('id') );
        $slug  = explode('-', $model->slug);

        if (count($slug) > 1) {
            $last = array_pop($slug);
            if (!is_numeric($last)) {
                $slug[] = $last;
            }
        }
        $model->slug = implode('-', $slug) .'-'. (Article::latest()->value('id') + 1);

        return self::insert($model->toArray());
    }

    public function insert($data)
    {
        sleep(1);
        return DB::transaction(function () use (&$data) {
            $article = Article::create([
                'categories_id' => isset($data['categories_id']) ? $data['categories_id'] : $data['parent'],
                'slug'          => $data['slug'],
                'status'        => isset($data['id']) ? 0 : $data['status'],
                'file'          => $data['file']
            ]);

            foreach ($data['subs'] as $key => &$value) {
                GroupsInArticle::create([
                    'article_id' => $article->id,
                    'subs_id'    => $value
                ]);
            }

            foreach ($data['content'] as $key => $value) {
                TransArticle::create([
                    'article_id' => $article->id,
                    'title'      => $value['title'],
                    'desc'       => $value['desc'],
                    'content'    => $value['content'],
                    'local'      => $key,
                    'metaTitle'  => $value['metaTitle'],
                    'metaDesc'   => $value['metaDesc']
                ]);
            }

            $article->save();
            return $article;
        });
    }

	public function edit($request)
	{
        $data = $request->input('data');
        $slug = Article::where([
                    ['id', '!=', $data['id']],
                    ['slug', $data['slug']],
                    ['categories_id', $data['parent']]
                ])->exists();

        if ($data['slug'] && $slug) {
            abort(422, 'Такая ссылка уже существует');
        }

        return DB::transaction(function() use (&$data) {
            $article = Article::find($data['id']);
            $article->update([
                'slug'   => $data['slug'],
                'file'   => $data['file'],
                'status' => $data['status']
            ]);

            GroupsInArticle::where('article_id', $data['id'])->delete();

            foreach ($data['subs'] as $key => $value) {
                GroupsInArticle::create([
                    'article_id' => $data['id'],
                    'subs_id'    => $value
                ]);
            }

            foreach ($data['content'] as $key => $value) {
                TransArticle::where('id', $value['id'])->update([
                    'title'     => $value['title'],
                    'desc'      => $value['desc'],
                    'content'   => $value['content'],
                    'metaTitle' => $value['metaTitle'],
                    'metaDesc'  => $value['metaDesc']
                ]);
            }

            $article->save();
            return $article;
        });
	}
}