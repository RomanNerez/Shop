<?php
namespace App\Http\Controllers\Publicly;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Repositories\Publicly\HeaderRepository;
use App\Repositories\Publicly\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index (Request $request, ProductRepository $productRepository, HeaderRepository $headerRepository)
    {
        $response = [
            'header'    => $headerRepository->data($request),
            'data'      => $productRepository->getProduct($request),
            'component' => 'product',
            'captcha'   => true
        ];

        return view('public.pages.product', compact('response'));
    }

    public function review (Request $request)
    {
        sleep(1);
        $data = $request->input('data');

        return Review::create([
            'product_id' => $request->route()->parameter('id'),
            'name'       => $data['name'],
            'email'      => $data['email'],
            'message'    => $data['message'],
            'rating'     => $data['rating']
        ]);
    }

    public function fastOrder(Request $request) {
        sleep(1);

        $data    = $request->input('data');
        $message = '☎️ Телефон: '. $data['phone'] ."\r\n".
                   '✅️ Товар: '. $data['product']['name'] ."\r\n".
                   '🔄 Количество: '. $data['product']['quantity'];

        return 'https://api.telegram.org/bot1441722052:AAG6L0xhnsKUmL9uzWtyRL48rqgWR1NOJgs/sendMessage?chat_id=-461222525&text=' .urlencode($message);
    }

    public function related(Request $request) {
        $data = $request->input('data');

        $request->merge([
            'is-catalog' => true
        ]);

        if ( count($data) ) {
            return Product::whereIn('id', $data)->orderBy('id', 'desc')->get();
        }
        return [];
    }
}
