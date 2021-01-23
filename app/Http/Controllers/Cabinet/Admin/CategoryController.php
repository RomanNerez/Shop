<?php
namespace App\Http\Controllers\Cabinet\Admin;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\DB;

class CategoryController extends IndexController
{
    public function create (Request $request, CategoryRepository $categoryRepository)
    {
    	return response()->json([
		    'category' => $categoryRepository->create($request)
		]);
    }

    public function copy (Request $request, CategoryRepository $categoryRepository)
    {
        return response()->json($categoryRepository->copy($request));
    }

    public function edit (Request $request, CategoryRepository $categoryRepository)
    {
        sleep(1);
    	return response()->json($categoryRepository->categoryEdit($request));
    }

    public function delete (Request $request)
    {
        sleep(2);
        $result = DB::transaction(function () use ($request) {
            Categories::destroy( $request->input('id') );
        });

        return response()->json([
            'done' => $result
        ]);
    }
}
