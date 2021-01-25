<?php
namespace App\Http\Controllers\Publicly;

use App\Http\Controllers\Controller;
use App\Models\CurrencyList;
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
}