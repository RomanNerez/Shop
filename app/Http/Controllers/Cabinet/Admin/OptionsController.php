<?php

namespace App\Http\Controllers\Cabinet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\TransOption;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function update(Request $request)
    {
        sleep(1);
        $data = $request->input('input');

        return DB::transaction(function () use ($data) {
            $option = Option::find($data['id']);
            $option->update([
                'logo_color' => $data['logo_color'],
                'logo_dark'  => $data['logo_dark'],
                'logo_light' => $data['logo_light'],
                'phones'  => $data['phones'],
                'emails'  => $data['emails'],
                'socials' => $data['socials']
            ]);

            foreach ($data['content'] as $key => $value) {
                TransOption::find($value['id'])->update([
                    'title'      => $value['title'],
                    'desc'       => $value['desc'],
                    'addr'       => $value['addr'],
                    'schedule'   => $value['schedule'],
                    'short_desc' => $value['short_desc']
                ]);
            }

            $option->save();
            return $option;
        });
    }
}
