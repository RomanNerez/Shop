<?php
namespace App\Repositories\Cart;

use App\Products;

class AddCartRepository extends CoreRepository
{

	public function addCart()
	{
        if($this->userAuth){

        }else{
            return $this->getCartSession();
        }
        
	}

    protected function addCartInSession()
    {

        if(session()->has('cart')){
            $data = session('cart');
            if(in_array($this->id, $data)){
                return false;
            }else{
                $data[] = $this->id;
                session()->put('cart', $data);
                return true;
            }
        }else{
            $data = [$this->id];
            session()->put('cart', $data);
            return true;
        }
        
    }

    protected function getCartSession()
    {
        if($this->addCartInSession()){
            return Products::where('id', $this->id)->first();
        }else{
            return null;
        }
    }


} 