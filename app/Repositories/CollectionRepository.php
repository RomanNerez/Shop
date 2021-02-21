<?php
namespace App\Repositories;

use App\Models\Collection;
use App\Models\GroupsInCollect;
use App\Models\TransCollection;
use Illuminate\Support\Facades\DB;

class CollectionRepository extends Repository
{
    public function create($request)
    {
        $data  = $request->input('data');
        $check = Collection::where([
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
        $model = Collection::find( $request->input('id') );
        $slug  = explode('-', $model->slug);

        if (count($slug) > 1) {
            $last = array_pop($slug);
            if (!is_numeric($last)) {
                $slug[] = $last;
            }
        }
        $model->slug = implode('-', $slug) .'-'. (Collection::latest()->value('id') + 1);

        return self::insert($model->toArray());
    }

    public function insert($data)
    {
        sleep(1);
        return DB::transaction(function () use (&$data) {
            $collection = Collection::create([
                'categories_id' => isset($data['categories_id']) ? $data['categories_id'] : $data['parent'],
                'slug'          => $data['slug'],
                'status'        => isset($data['id']) ? 0 : $data['status'],
                'file'          => $data['file']
            ]);

            foreach ($data['subs'] as $key => &$value) {
                GroupsInCollect::create([
                    'collections_id' => $collection->id,
                    'subs_id'        => $value
                ]);
            }

            foreach ($data['content'] as $key => $value) {
                TransCollection::create([
                    'collections_id' => $collection->id,
                    'title'          => $value['title'],
                    'desc'           => $value['desc'],
                    'local'          => $key,
                    'metaTitle'      => $value['metaTitle'],
                    'metaDesc'       => $value['metaDesc']
                ]);
            }

            $collection->save();
            return $collection;
        });
    }

	public function collectionEdit($request)
	{
        $data = $request->input('data');
        $slug = Collection::where([
                    ['id', '!=', $data['id']],
                    ['slug', $data['slug']],
                    ['categories_id', $data['parent']]
                ])->exists();

        if ($data['slug'] && $slug) {
            abort(422, 'Такая ссылка уже существует');
        }

        return DB::transaction(function() use (&$data) {
            $collection = Collection::find($data['id']);
            $collection->update([
                'slug'   => $data['slug'],
                'file'   => $data['file'],
                'status' => $data['status']
            ]);

            GroupsInCollect::where('collections_id', $data['id'])->delete();

            foreach ($data['subs'] as $key => $value) {
                GroupsInCollect::create([
                    'collections_id' => $data['id'],
                    'subs_id'        => $value
                ]);
            }

            foreach ($data['content'] as $key => $value) {
                TransCollection::where('id', $value['id'])->update([
                    'title'     => $value['title'],
                    'desc'      => $value['desc'],
                    'metaTitle' => $value['metaTitle'],
                    'metaDesc'  => $value['metaDesc']
                ]);
            }

            $collection->save();
            return $collection;
        });
	}
}
