<?php
namespace App\Repositories\Cart;

use App\Products;
use Auth;
use App\Models\Cart;
use Illuminate\Support\Arr;

class CollectionsCartRepository extends CoreRepository
{
	

	public static function getProducts()
	{
		if(Auth::check()){
			return self::getProductsWithDataBase();
		}else{
			return self::getProductsWithCount(); 
		}
	}

	protected static function getProductsWithCount()
	{
		$id = data_get(session('cart'), '*.id');
		$count = data_get(session('cart'), '*.count');
		$protucts = Products::find($id);
		if(!empty($protucts)){
			foreach ($protucts as $key => $value) {
				$value->count = $count[$key];
			}
		}
		return $protucts;
	}	

	protected static function getProductsWithDataBase()
	{
		$cart = Cart::where('users_id', Auth::user()->id)->get();
		$products = Products::find(data_get($cart, '*.products_id'));
		$count = data_get($cart, '*.count_product');
		if(!empty($products)){
			foreach ($products as $key => &$value) {
				$value->count = $count[$key];
			}
		}
		return $products;
	}
}