<?php

namespace App\Http\Controllers\Cabinet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subs;
use App\Repositories\SubsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubsController extends Controller
{
    public function create(Request $request, SubsRepository $subsRepository)
    {
        return response()->json([
            'item' => $subsRepository->create($request)
        ]);
    }
    public function copy(Request $request, SubsRepository $subsRepository)
    {
        return response()->json($subsRepository->copy($request));
    }

    public function edit(Request $request, SubsRepository $subsRepository)
    {
        sleep(1);
        return response()->json($subsRepository->subsEdit($request));
    }

    public function delete(Request $request)
    {
        sleep(1);
        $result = DB::transaction(function () use ($request) {
            Subs::destroy( $request->input('id') );
        });

        return response()->json([
            'done' => $result
        ]);
    }
}
