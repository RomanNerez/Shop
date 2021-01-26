<?php

namespace App\Http\Controllers\Cabinet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Repositories\AttributeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    public function create(Request $request, AttributeRepository $attributeRepository)
    {
        sleep(1);
        return response()->json([
            'item' => $attributeRepository->getIdNewAttribute($request)
        ]);
    }

    public function edit(Request $request, AttributeRepository $attributeRepository)
    {
        sleep(1);
        return response()->json([
            'done' => $attributeRepository->attributeEdit($request)
        ]);
    }

    public function sort(Request $request, AttributeRepository $attributeRepository)
    {
        sleep(1);
        return response()->json([
            'result' => $attributeRepository->attributeSort($request)
        ]);
    }

    public function delete(Request $request)
    {
        sleep(1);
        $result = DB::transaction(function () use ($request) {
            return Attribute::destroy( $request->input('id') );
        });

        return response([
            'instance' => 'group',
            'data'     => $result
        ]);
    }
}
