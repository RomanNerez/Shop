<?php

namespace App\Http\Controllers\Cabinet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Repositories\CollectionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    public function create(Request $request, CollectionRepository $collectionRepository)
    {
        sleep(1);
        return response()->json([
            'collection' => $collectionRepository->create($request)
        ]);
    }

    public function copy(Request $request, CollectionRepository $collectionRepository)
    {
        sleep(1);
        return response()->json( $collectionRepository->copy($request) );
    }

    public function edit(Request $request, CollectionRepository $collectionRepository)
    {
        sleep(1);
        return response()->json($collectionRepository->collectionEdit($request));
    }

    public function delete(Request $request)
    {
        sleep(1);
        $result = DB::transaction(function () use ($request) {
            Collection::destroy( $request->input('id') );
        });

        return response()->json([
            'done' => $result
        ]);
    }
}
