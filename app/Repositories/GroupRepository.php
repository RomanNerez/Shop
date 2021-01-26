<?php
namespace App\Repositories;

use App\Models\Groups;
use App\Models\Subs;
use App\Models\TransGroups;
use App\Models\TransSubs;
use Illuminate\Support\Facades\DB;

class GroupRepository extends Repository
{
	public function create($request)
	{
        $data  = $request->input('data');
        $check = Groups::where([
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
        $category = $request->input('category');
        $model    = Groups::find( $request->input('id') );
        $slug     = explode('-', $model->slug);

        if (count($slug) > 1) {
            $last = array_pop($slug);
            if (!is_numeric($last)) {
                $slug[] = $last;
            }
        }
        $model->slug = implode('-', $slug) .'-'. (Groups::latest()->value('id') + 1);

        if ($category) {
            $model->categories_id = $category;
        }

        return self::insert($model->toArray());
    }

    public function insert($data)
    {
        sleep(1);
        return DB::transaction(function () use (&$data) {
            $group = Groups::create([
                'categories_id' => isset($data['categories_id']) ? $data['categories_id'] : $data['parent'],
                'status'        => isset($data['id']) ? 0 : $data['status'],
                'related'       => $data['related'],
                'slug'          => $data['slug']
            ]);

            foreach ($data['content'] as $key => $value) {
                TransGroups::create([
                    'groups_id'  => $group->id,
                    'title'      => $value['title'],
                    'full_title' => $value['full_title'],
                    'desc'       => $value['desc'],
                    'local'      => $key,
                    'metaTitle'  => $value['metaTitle'],
                    'metaDesc'   => $value['metaDesc']
                ]);
            }

            if ( isset($data['subs']) && count($data['subs']) ) {
                foreach ($data['subs'] as $value) {
                    $subs = Subs::create([
                        'groups_id' => $group->id,
                        'slug'      => $value['slug'],
                        'status'    => $value['status']
                    ]);

                    foreach ($value['content'] as $key => $item) {
                        TransSubs::create([
                            'subs_id'    => $subs->id,
                            'title'      => $item['title'],
                            'full_title' => $item['full_title'],
                            'desc'       => $item['desc'],
                            'local'      => $key,
                            'metaTitle'  => $item['metaTitle'],
                            'metaDesc'   => $item['metaDesc']
                        ]);
                    }
                }
            }

            $group->save();
            return $group;
        });
    }

	public function groupEdit($request)
	{
        $data = $request->input('data');
        $slug = Groups::where([
                    ['id', '!=', $data['id']],
                    ['slug', $data['slug']],
                    ['categories_id', $data['parent']]
                ])->exists();

        if ($data['slug'] && $slug) {
            abort(422, 'Такая ссылка уже существует');
        }

        return DB::transaction(function() use (&$data) {
            $group = Groups::find($data['id']);
            $group->update([
                'slug'   => $data['slug'],
                'status' => $data['status']
            ]);

            foreach ($data['content'] as $key => $value) {
                if (!is_array($value)) {
                    continue;
                }
                TransGroups::where('id', $value['id'])->update([
                    'title'      => $value['title'],
                    'full_title' => $value['full_title'],
                    'desc'       => $value['desc'],
                    'metaTitle'  => $value['metaTitle'],
                    'metaDesc'   => $value['metaDesc']
                ]);
            }
            $group->save();
            return $group;
        });
	}

	public function groupSort($request) {
        $data = $request->input('data');

        DB::transaction(function() use (&$data) {
            $index = [
                'group' => 0,
                'subs' => 0
            ];

            foreach ($data as $group) {
                ++$index['group'];

                foreach ($group['subs'] as $subs) {
                    ++$index['subs'];

                    $check = Subs::where([
                        ['id', '!=', $subs['id']],
                        ['slug', $subs['slug']],
                        ['groups_id', $group['id']]
                    ])->exists();

                    if ($check) {
                        abort(422, 'Не удалось выполнить сортировку! Ключ <b>"'. $subs['slug'] .'"</b> дублируется в группе <b>"'. $group['content']['ru']['title'] .'"</b>');
                    }

                    Subs::where('id', $subs['id'])->update([
                        'groups_id' => $group['id'],
                        'order'     => $index['subs']
                    ]);
                }

                Groups::find($group['id'])->update([
                    'order' => $index['group']
                ]);
            }
        });

        return true;
    }
}