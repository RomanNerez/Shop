<?php
namespace App\Http\Controllers\Publicly;

use App\Http\Controllers\Controller;
use App\Repositories\Publicly\CompareRepository;
use App\Repositories\Publicly\HeaderRepository;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index (Request $request, HeaderRepository $headerRepository, CompareRepository $compareRepository) {
        $header   = $headerRepository->data($request);
        $response = [
            'header'    => $header,
            'data'      => $compareRepository->data($header['compare'] ?? [], $request),
            'component' => 'compare'
        ];

        return view('public.pages.compare', compact('response'));
    }

    public function add (Request $request)
    {
        sleep(1);
        $data = $request->input('data');

        $compare = $request->session()->get('compare', []);
        $compare[] = $data;

        $request->session()->put('compare', $compare);
        return true;
    }

    public function remove (Request $request)
    {
        $id = $request->input('data');

        $compare = $request->session()->get('compare');
        $index   = array_search($id, $compare);

        array_splice($compare, $index, 1);

        $request->session()->put('compare', $compare);
        return true;
    }
}
