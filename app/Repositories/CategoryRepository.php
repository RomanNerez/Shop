<?php
namespace App\Repositories;

use App\Models\Categories;
use App\Models\TransCategories;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends Repository
{
	public function create($request)
	{
        $data = $request->input('data');

        if ($data['slug'] && Categories::where('slug', $data['slug'])->exists()) {
            abort(422, 'Такая ссылка уже существует');
        }
        if ($data['is_root']) {
            Categories::where('is_root', 1)->update([
                'is_root' => 0
            ]);
        }

        return self::insert($data);
	}

    public function copy($request)
    {
        $model = Categories::find( $request->input('id') );
        $slug  = explode('-', $model->slug);

        if (count($slug) > 1) {
            $last = array_pop($slug);
            if (!is_numeric($last)) {
                $slug[] = $last;
            }
        }
        $model->slug = implode('-', $slug) .'-'. (Categories::latest()->value('id') + 1);

        return self::insert($model->toArray());
    }

    public function insert($data)
    {
        sleep(1);
        return DB::transaction(function () use (&$data) {
            $category = Categories::create([
                'slug'    => $data['slug'],
                'file'    => $data['file'],
                'related' => $data['related'],
                'status'  => isset($data['id']) ? 0 : $data['status'],
                'is_root' => isset($data['id']) ? 0 : $data['is_root']
            ]);

            foreach ($data['content'] as $key => $value) {
                TransCategories::create([
                    'categories_id' => $category->id,
                    'title'         => $value['title'],
                    'desc'          => $value['desc'],
                    'local'         => $key,
                    'metaTitle'     => $value['metaTitle'],
                    'metaDesc'      => $value['metaDesc']
                ]);
            }

            $category->save();
            return $category;
        });
    }

	public function categoryEdit($request)
	{
        $data = $request->input('data');
        $slug = Categories::where([
                    ['id', '!=', $data['id']],
                    ['slug', $data['slug']]
                ])->exists();

        if ($data['slug'] && $slug) {
            abort(422, 'Такая ссылка уже существует');
        }

        return DB::transaction(function () use ($data) {
            if ($data['is_root']) {
                Categories::where('is_root', 1)->update([
                    'is_root' => 0
                ]);
            }

            $category = Categories::find($data['id']);
            $category->update([
                'slug'    => $data['slug'],
                'file'    => $data['file'],
                'status'  => $data['status'],
                'is_root' => $data['is_root'],
            ]);

            foreach ($data['content'] as $key => $value) {
                TransCategories::where('id', $value['id'])->update([
                    'title'     => $value['title'],
                    'desc'      => $value['desc'],
                    'metaTitle' => $value['metaTitle'],
                    'metaDesc'  => $value['metaDesc']
                ]);
            }

            $category->save();
            return $category;
        });
	}
}