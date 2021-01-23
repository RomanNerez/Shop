<?php

namespace App\Http\Controllers\Cabinet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Attribute;
use App\Models\Collection;
use App\Models\CurrencyList;
use App\Models\CurrencyValue;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Groups;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public static $data;

    public function index (Request $request)
    {
    	$version = env('APP_VERSION', time());

    	$user = Auth::user();
    	$data = [
            'divide' => $request->get('divide'),
            'langs'  => DB::table('lang')->where('local', '!=', 'en')->get(),
            'store'  => [
                'categories'  => Categories::where('related', 'store')->orderBy('created_at', 'desc')->get(),
                'groups'      => Groups::where('related', 'store')->orderBy('order', 'asc')->orderBy('created_at', 'desc')->get(),
                'collections' => Collection::orderBy('created_at', 'desc')->get(),
                'attributes'  => Attribute::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get(),
                'products'    => Product::with('related')->orderBy('created_at', 'desc')->get()
            ],
            'settings' => [
                'currency' => [
                    'list'   => CurrencyList::all(),
                    'values' => CurrencyValue::all()
                ]
            ],
            'content'  => [
                'categories' => Categories::where('related', 'content')->orderBy('created_at', 'desc')->get(),
                'groups'     => Groups::where('related', 'content')->orderBy('order', 'asc')->orderBy('created_at', 'desc')->get(),
                'articles'   => Article::orderBy('created_at', 'desc')->get()
            ],
            'user' => [
                'fullname' => $user->fullname,
                'name'     => $user->name,
            ]
    	];

    	return view('cabinet.admin.index', compact('data', 'version'));
    }
}