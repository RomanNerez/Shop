<?php

namespace App\Http\Controllers\Cabinet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function create(Request $request, ArticleRepository $articleRepository)
    {
        sleep(1);
        return response()->json([
            'article' => $articleRepository->create($request)
        ]);
    }

    public function copy(Request $request, ArticleRepository $articleRepository)
    {
        sleep(1);
        return response()->json( $articleRepository->copy($request) );
    }

    public function edit(Request $request, ArticleRepository $articleRepository)
    {
        sleep(1);
        return response()->json($articleRepository->edit($request));
    }

    public function delete(Request $request)
    {
        sleep(1);
        $result = DB::transaction(function () use ($request) {
            Article::destroy( $request->input('id') );
        });

        return response()->json([
            'done' => $result
        ]);
    }
}
