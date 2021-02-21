<?php
namespace App\Http\Controllers\Publicly;

use App\Http\Controllers\Controller;
use App\Repositories\Publicly\ArticleRepository;
use App\Repositories\Publicly\HeaderRepository;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index (Request $request, ArticleRepository $articleRepository, HeaderRepository $headerRepository)
    {
        $response = [
            'header'    => $headerRepository->data($request),
            'data'      => $articleRepository->getArticle($request),
            'component' => 'article'
        ];

        return view('public.pages.article', compact('response'));
    }
}
