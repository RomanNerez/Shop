<?php
namespace App\Http\Controllers\Publicly;

use App\Http\Controllers\Controller;
use App\Repositories\Publicly\FavoritesRepository;
use App\Repositories\Publicly\HeaderRepository;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function index (Request $request, HeaderRepository $headerRepository, FavoritesRepository $favoritesRepository) {
        $header   = $headerRepository->data($request);
        $response = [
            'header'    => $header,
            'data'      => $favoritesRepository->data($header['favorites'] ?? [], $request),
            'component' => 'favorites'
        ];

        return view('public.pages.favorites', compact('response'));
    }

    public function add (Request $request)
    {
        sleep(1);
        $data = $request->input('data');

        $favorites = $request->session()->get('favorites', []);
        $favorites[] = $data;

        $request->session()->put('favorites', $favorites);
        return true;
    }

    public function remove (Request $request)
    {
        $id = $request->input('data');

        $favorites = $request->session()->get('favorites');
        $index    = array_search($id, $favorites);

        array_splice($favorites, $index, 1);

        $request->session()->put('favorites', $favorites);
        return true;
    }
}