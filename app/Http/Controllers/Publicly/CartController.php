<?php
namespace App\Http\Controllers\Publicly;

use App\Http\Controllers\Controller;
use App\Repositories\Publicly\CartRepository;
use App\Repositories\Publicly\HeaderRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index (Request $request, HeaderRepository $headerRepository, CartRepository $cartRepository) {
        $header   = $headerRepository->data($request);
        $response = [
            'header'    => $header,
            'data'      => $cartRepository->data($header['cart'] ?? []),
            'component' => 'cart'
        ];

        return view('public.pages.cart', compact('response'));
    }

    public function add (Request $request)
    {
        $data = $request->input('data');

        $cart = $request->session()->get('cart', []);
        $cart[] = $data;

        $request->session()->put('cart', $cart);
        return true;
    }

    public function bulkAdd (Request $request)
    {
        sleep(1);
        $data = $request->input('data');

        $cart = $request->session()->get('cart', []);
        $cart = array_merge($cart, $data);

        $request->session()->put('cart', $cart);
        return true;
    }

    public function update (Request $request)
    {
        $data = $request->input('data');

        $cart = $request->session()->get('cart');
        $cart[$data['index']]['count'] = $data['count'];

        $request->session()->put('cart', $cart);
        return true;
    }

    public function remove (Request $request)
    {
        $id = $request->input('data');

        $cart  = $request->session()->get('cart');
        $index = array_search($id, array_column($cart, 'id'));

        array_splice($cart, $index, 1);

        $request->session()->put('cart', $cart);
        return true;
    }
}