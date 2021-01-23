<?php
namespace App\Http\Controllers\Publicly;

use App\Http\Controllers\Controller;
use App\Repositories\Publicly\HeaderRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index (Request $request, HeaderRepository $headerRepository)
    {
        $response = [
            'header'     => $headerRepository->data($request),
            'data'       => [
                'content' => [
                    'meta' => [
                        'title' => 'Найзручнiший online-магазин аксесуарiв та електронiки в Україні',
                        'desc'  => 'Найзручнiший online-магазин аксесуарiв та електронiки в Україні',
                        'image' => ''
                    ]
                ]
            ]
        ];
        
        return view('public.pages.home', compact('response'));
    }
}