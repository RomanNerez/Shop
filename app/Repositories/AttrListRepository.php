<?php
namespace App\Repositories;

use App\Models\AttributeList;
use App\Models\TransAttrList;
use Illuminate\Support\Facades\DB;

class AttrListRepository extends Repository
{
	public function getIdNewList($request)
	{
        $data = $request->input('data');

        $check = AttributeList::where([
                    ['slug', $data['slug']],
                    ['attribute_id', $data['parent']]
                ])->exists();

        if ($data['slug'] && $check) {
            abort(422, 'Такая ссылка уже существует');
        }

        DB::transaction(function () use ($request, &$subsData, &$data) {
            $list = AttributeList::create([
                'attribute_id' => $data['parent'],
                'slug'         => $data['slug'],
                'status'       => $data['status']
            ]);

            foreach ($data['content'] as $key => &$value) {
                if (!is_array($value)) {
                    continue;
                }

                TransAttrList::create([
                    'attribute_list_id' => $list->id,
                    'title'             => $value['title'],
                    'local'             => $key
                ]);
            }

            $list->save();
            $data = $list;
        });

        return $data;
	}

	public function listEdit($request)
	{
        $data  = $request->input('data');
        $check = AttributeList::where([
                    ['id', '!=', $data['id']],
                    ['slug', $data['slug']],
                    ['attribute_id', $data['parent']]
                ])->exists();

        if ($data['slug'] && $check) {
            abort(422, 'Такая ссылка уже существует');
        }

        DB::transaction(function() use (&$data) {
            AttributeList::where('id', $data['id'])->update([
                'slug'   => $data['slug'],
                'status' => $data['status']
            ]);

            foreach ($data['content'] as $key => $value) {
                if (!is_array($value)) {
                    continue;
                }

                TransAttrList::where('id', $value['id'])->update([
                    'title' => $value['title']
                ]);
            }
        });

        return true;
	}
}