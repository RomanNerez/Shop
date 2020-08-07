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

	public function __construct($id)
	{	
		$this->id = $id;
		$this->userAuth = Auth::check();
		$this->carts = new Cart();

	}
} 