<?php

namespace App\Http\Controllers\Cabinet\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeList;
use App\Models\Product;
use App\Repositories\AttrListRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttrListController extends Controller
{
    public function create(Request $request, AttrListRepository $attrListRepository)
    {
        sleep(1);
        return response()->json([
            'item' => $attrListRepository->getIdNewList($request)
        ]);
    }

    public function edit(Request $request, AttrListRepository $attrListRepository)
    {
        sleep(1);
        return response()->json([
            'done' => $attrListRepository->listEdit($request)
        ]);
    }

    public function delete(Request $request)
    {
        sleep(1);
        $result = DB::transaction(function () use ($request) {
            AttributeList::destroy( $request->input('id') );

            return Product::orderBy('created_at', 'desc')->get();
        });

        return response([
            'instance' => 'list',
            'data'     => $result
        ]);
    }
}