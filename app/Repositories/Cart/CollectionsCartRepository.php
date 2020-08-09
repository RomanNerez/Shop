<?php
namespace App\Repositories\Cart;

use App\Products;
use Auth;
use Illuminate\Support\Arr;

class CollectionsCartRepository extends CoreRepository
{
	

	public static function getProducts()
	{
		if(Auth::check()){

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
}