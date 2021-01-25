<?php
namespace App\Repositories;

use App\Models\Subs;
use App\Models\TransSubs;
use Illuminate\Support\Facades\DB;

class SubsRepository extends Repository
{
	public function create($request)
	{
        $data = $request->input('data');

        $check = Subs::where([
                    ['slug', $data['slug']],
                    ['groups_id', $data['parent']]
                ])->exists();

        if ($data['slug'] && $check) {
            abort(422, 'Такая ссылка уже существует');
        }

        return self::insert($data);
	}

    public function copy($request)
    {
        $model = Subs::find( $request->input('id') );
        $slug  = explode('-', $model->slug);

        if (count($slug) > 1) {
            $last = array_pop($slug);
            if (!is_numeric($last)) {
                $slug[] = $last;
            }
        }
        $model->slug = implode('-', $slug) .'-'. (Subs::latest()->value('id') + 1);

        return self::insert($model->toArray());
    }

    public function insert($data)
    {
        sleep(1);
        return DB::transaction(function () use (&$data) {
            $subs = Subs::create([
                'groups_id' => isset($data['groups_id']) ? $data['groups_id'] : $data['parent'],
                'slug'      => $data['slug'],
                'status'    => isset($data['id']) ? 0 : $data['status']
            ]);

            foreach ($data['content'] as $key => $value) {
                TransSubs::create([
                    'subs_id'    => $subs->id,
                    'title'      => $value['title'],
                    'full_title' => $value['full_title'],
                    'desc'       => $value['desc'],
                    'local'      => $key,
                    'metaTitle'  => $value['metaTitle'],
                    'metaDesc'   => $value['metaDesc']
                ]);
            }

            $subs->save();
            return $subs;
        });
    }

	public function subsEdit($request)
	{
        $data  = $request->input('data');
        $check = Subs::where([
                    ['id', '!=', $data['id']],
                    ['slug', $data['slug']],
                    ['groups_id', $data['parent']]
                ])->exists();

        if ($data['slug'] && $check) {
            abort(422, 'Такая ссылка уже существует');
        }

        return DB::transaction(function() use (&$data) {
            $subs = Subs::find($data['id']);
            $subs->update([
                'slug'   => $data['slug'],
                'status' => $data['status']
            ]);

            foreach ($data['content'] as $key => $value) {
                if (!is_array($value)) {
                    continue;
                }

                TransSubs::where('id', $value['id'])->update([
                    'title'      => $value['title'],
                    'full_title' => $value['full_title'],
                    'desc'       => $value['desc'],
                    'metaTitle'  => $value['metaTitle'],
                    'metaDesc'   => $value['metaDesc']
                ]);
            }
            $subs->save();
            return $subs;
        });
	}
}
