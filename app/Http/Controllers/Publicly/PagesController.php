<?php
namespace App\Http\Controllers\Publicly;

use App\Http\Controllers\Controller;
use App\Repositories\Publicly\HeaderRepository;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function magnitCustom (Request $request, HeaderRepository $headerRepository)
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

        return view('public.pages.permanent-magnets', compact('response'));
    }
}