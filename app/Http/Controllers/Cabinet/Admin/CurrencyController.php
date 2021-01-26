<?php

namespace App\Http\Controllers\Cabinet\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyListRequest;
use App\Models\CurrencyList;
use App\Models\CurrencyValue;
use App\Models\TransCurrency;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function create(CurrencyListRequest $request)
    {
        sleep(1);
        $data = $request->input('data');

        $output = DB::transaction(function () use ($data) {
             $list   = CurrencyList::create($data);
             $values = [];

             foreach ($data['content'] as $key => &$value) {
                 if (!is_array($value)) {
                     continue;
                 }

                 TransCurrency::create([
                     'currency_list_id' => $list->id,
                     'name'             => $value['name'],
                     'abbrev'           => $value['abbrev'],
                     'local'            => $key
                 ]);
             }

            foreach (CurrencyList::all() as $item) {
                if ($list->id !== $item->id) {
                    $model = CurrencyValue::make([
                        'first' => $list->id,
                        'last'  => $item->id,
                        'value' => 1
                    ]);

                    $model->save();
                    $values[] = $model;
                }
            }
            $list->save();

            return [
                'list'   => $list,
                'values' => $values
            ];
        });

        return response()->json($output);
    }

    public function edit(CurrencyListRequest $request)
    {
        sleep(1);
        $data = $request->input('data');

        $output = DB::transaction(function () use ($data) {
            foreach ($data['content'] as $key => $value) {
                if (!is_array($value)) {
                    continue;
                }

                TransCurrency::where('id', $value['id'])->update([
                    'name'   => $value['name'],
                    'abbrev' => $value['abbrev']
                ]);
            }

            CurrencyList::where('id', $data['id'])->update([
                'symbol' => $data['symbol'],
                'code'   => $data['code']
            ]);

            return $data;
        });

        return response()->json([
            'output' => $output
        ]);
    }

    public function delete(Request $request)
    {
        sleep(1);
        $result = DB::transaction(function () use ($request) {
            $id = $request->input('id');

            CurrencyList::destroy( $id );
            return (int) $id;
        });

        return response()->json($result);
    }

    public function update(Request $request)
    {
        sleep(2);
        $data = $request->input('data');

        $model = CurrencyValue::find($data['id']);

        $model->value = $data['value'];
        $model->first = $data['first'];
        $model->last  = $data['last'];

        $model->save();

        return response()->json($model);
    }
}
