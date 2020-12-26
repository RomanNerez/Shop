<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuAreaVisibilities;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MenuAreaVisibilityController extends Controller
{
    public function add(Request $request): JsonResponse
    {
        sleep(1);
        Validator::make($request->all(), [
            'title' => 'required|max:255',
        ])->validate();

        $menuAreaVisibility = new MenuAreaVisibilities;
        $menuAreaVisibility->title = $request->input('title');
        $menuAreaVisibility->save();
        return response()->json($menuAreaVisibility);
    }

    public function delete(Request $request): JsonResponse
    {
        $flight = MenuAreaVisibilities::where('id', $request->input('id'));
        $flight->delete();
        return response()->json($flight);
    }

    public function edit(Request $request): JsonResponse
    {
        sleep(2);
        Validator::make($request->all(), [
            'id' => 'required',
            'title' => 'required|max:255',
        ])->validate();

        $menuAreaVisibility = MenuAreaVisibilities::where('id', $request->input('id'))->first();
        $menuAreaVisibility->title = $request->input('title');
        $menuAreaVisibility->save();
        return response()->json($menuAreaVisibility);
    }
}
