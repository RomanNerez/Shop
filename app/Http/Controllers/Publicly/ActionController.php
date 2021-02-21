<?php
namespace App\Http\Controllers\Publicly;

use App\Http\Controllers\Controller;
use App\Models\CurrencyList;
use App\Models\Product;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function currency (Request $request)
    {
        $code = $request->route()->parameter('code');

        if ( CurrencyList::where('code', $code)->exists() ) {
            $request->session()->put('currency', $code);
            return redirect()->back();
        }
        abort(404);
    }

    public function getSpecialOffers (Request $request)
    {
        $key   = $request->get('key');
        $count = $request->get('count');

        if ($key && $count) {
            $products = Product::where([
                    [$key, 1],
                    ['related_to', 'store']
                ])
                ->orderBy('id', 'desc');

            $request->merge([
                'is-catalog' => true
            ]);

            return [
                'count' => $products->count(),
                'items' => $products->take($count)->get()
            ];
        }else{
            abort(400);
        }
    }
}
