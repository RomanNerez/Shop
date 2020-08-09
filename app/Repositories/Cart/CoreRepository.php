<?php
namespace App\Repositories\Cart;

use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;


abstract class CoreRepository
{
	protected $userAuth;
	protected $carts;
	protected $request;
	protected $sessionCart;
	protected $id;
	protected $count;

	public function __construct($id, $count=1)
	{	
		$this->id = $id;
		$this->count = $count;
		$this->userAuth = Auth::check();
		$this->carts = new Cart();

	}
} 