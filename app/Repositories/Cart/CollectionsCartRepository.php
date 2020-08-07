<?php
namespace App\Repositories\Cart;

use App\Products;
use Auth;

class CollectionsCartRepository extends CoreRepository
{
	

	public static function getProduct()
	{
		if(Auth::check()){

		}else{
			return Products::find(session('cart'));
		}
	}
}