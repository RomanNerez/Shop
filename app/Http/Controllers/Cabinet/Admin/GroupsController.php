<?php

namespace App\Http\Controllers\Cabinet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupsController extends Controller
{
    public function create(Request $request, GroupRepository $groupRepository)
    {
        return response()->json([
            'item' => $groupRepository->create($request)
        ]);
    }

    public function copy(Request $request, GroupRepository $groupRepository)
    {
        return response()->json( $groupRepository->copy($request) );
    }

    public function edit(Request $request, GroupRepository $groupRepository)
    {
        sleep(1);
        return response()->json($groupRepository->groupEdit($request));
    }

    public function sort(Request $request, GroupRepository $groupRepository)
    {
        sleep(1);
        return response()->json([
            'result' => $groupRepository->groupSort($request)
        ]);
    }

    public function delete(Request $request)
    {
        sleep(1);
        $result = DB::transaction(function () use ($request) {
            Groups::destroy( $request->input('id') );
        });

        return response()->json([
            'done' => $result
        ]);
    }
}
