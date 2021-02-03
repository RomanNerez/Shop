<?php
namespace App\Repositories;

use App\Models\Attribute;
use App\Models\AttributeList;
use App\Models\TransAttr;
use Illuminate\Support\Facades\DB;

class AttributeRepository extends Repository
{
	public function getIdNewAttribute($request)
	{
        $data  = $request->input('data');
        $check = Attribute::where([
                ['slug', $data['slug']],
                ['related', $data['related']]
            ])
            ->exists();


        if ($data['slug'] && $check) {
            abort(422, 'Такая ссылка уже существует');
        }

        return DB::transaction(function () use ($request, &$attributeData, &$data) {
            $attribute = Attribute::create([
                'slug'    => $data['slug'],
                'price'   => $data['price'],
                'count'   => $data['count'],
                'data'    => $data['data'],
                'type'    => $data['type'],
                'related' => $data['related'],
                'status'  => $data['status']
            ]);

            foreach ($data['content'] as $key => &$value) {
                if (!is_array($value)) {
                    continue;
                }

                TransAttr::create([
                    'attribute_id' => $attribute->id,
                    'title'        => $value['title'],
                    'local'        => $key
                ]);
            }

            $attribute->save();
            return $attribute;
        });
	}

	public function attributeEdit($request)
	{
        $data = $request->input('data');
        $slug = Attribute::where([
                    ['id', '!=', $data['id']],
                    ['slug', $data['slug']],
                    ['related', $data['related']]
                ])->exists();

        if ($data['slug'] && $slug) {
            abort(422, 'Такая ссылка уже существует');
        }

        DB::transaction(function() use (&$data) {
            Attribute::where('id', $data['id'])->update([
                'slug'   => $data['slug'],
                'price'  => $data['price'],
                'count'  => $data['count'],
                'data'   => $data['data'],
                'type'   => $data['type'],
                'status' => $data['status']
            ]);

            foreach ($data['content'] as $key => $value) {
                if (!is_array($value)) {
                    continue;
                }
                TransAttr::where('id', $value['id'])->update([
                    'title' => $value['title']
                ]);
            }
        });

        return true;
	}

	public function attributeSort($request) {
        $data = $request->input('data');

        DB::transaction(function() use (&$data) {
            $index = [
                'attribute' => 0,
                'subs'      => 0
            ];

            foreach ($data as $attribute) {
                ++$index['attribute'];

                foreach ($attribute['subs'] as $list) {
                    ++$index['subs'];

                    $check = AttributeList::where([
                        ['id', '!=', $list['id']],
                        ['slug', $list['slug']],
                        ['attribute_id', $attribute['id']]
                    ])->exists();

                    if ($check) {
                        abort(422, 'Не удалось выполнить сортировку! Ключ <b>"'. $list['slug'] .'"</b> дублируется в группе <b>"'. $attribute['content']['ru']['title'] .'"</b>');
                    }

                    AttributeList::where('id', $list['id'])->update([
                        'attribute_id' => $attribute['id'],
                        'order'        => $index['subs']
                    ]);
                }

                Attribute::find($attribute['id'])->update([
                    'order' => $index['attribute']
                ]);
            }
        });

        return true;
    }
}
