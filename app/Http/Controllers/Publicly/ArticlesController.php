<?php
namespace App\Http\Controllers\Publicly;

use App\Http\Controllers\Controller;
use App\Repositories\Publicly\ArticlesRepository;
use App\Repositories\Publicly\HeaderRepository;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index (Request $request, ArticlesRepository $articlesRepository, HeaderRepository $headerRepository)
    {
        $data = $articlesRepository->getCatalog($request);

        if ($request->get('is-async')) {
            return $data;
        }

        $response = [
            'header'    => $headerRepository->data($request),
            'data'      => $data,
            'component' => 'articles'
        ];

        return view('public.pages.articles', compact('response'));
    }
}