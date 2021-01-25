<?php
namespace App\Http\Controllers\Publicly;

use App\Http\Controllers\Controller;
use App\Repositories\Publicly\HeaderRepository;
use App\Repositories\Publicly\SearchRepository;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index (Request $request, SearchRepository $searchRepository, HeaderRepository $headerRepository)
    {
        $products = $searchRepository->getProduct($request);

        if ($request->get('is-async')) {
            return $products;
        }

        $response = [
            'header'    => $headerRepository->data($request),
            'data'      => $searchRepository->getData($products, $request->get('query')),
            'component' => 'search'
        ];

        return view('public.pages.search', compact('response'));
    }
}
