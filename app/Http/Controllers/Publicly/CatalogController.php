<?php
namespace App\Http\Controllers\Publicly;

use App\Http\Controllers\Controller;
use App\Repositories\Publicly\CatalogRepository;
use App\Repositories\Publicly\HeaderRepository;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index (Request $request, CatalogRepository $catalogRepository, HeaderRepository $headerRepository)
    {
        $data = $catalogRepository->getCatalog($request);

        if ($request->get('is-async')) {
            return $data;
        }

        $response = [
            'header'    => $headerRepository->data($request),
            'data'      => $data,
            'component' => 'catalog'
        ];

        return view('public.pages.catalog', compact('response'));
    }
}