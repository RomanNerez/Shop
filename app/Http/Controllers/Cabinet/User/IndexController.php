<?php

namespace App\Http\Controllers\Cabinet\User;

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
                        'title' => 'Первый в Украине магазин неодимовых магнитов',
                        'desc'  => 'Первый в Украине магазин неодимовых магнитов',
                        'image' => ''
                    ]
                ]
            ]
        ];

        return view('public.pages.cabinet', compact('response'));
    }
}