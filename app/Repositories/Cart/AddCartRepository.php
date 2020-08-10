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
            return $this->existsValue();
        }else{
            $data = [ [ 'id' => $this->id, 'count' => $this->count ] ];
            session()->put('cart', $data);
            return true;
        }
    }

    protected function getCartSession()
    {
        if($this->addCartInSession()){
            $product = Products::where('id', $this->id)->first();
            $product->count = $this->count;
            return $product;
        }else{
            return null;
        }
    }

    protected function existsValue()
    {
        $data = session('cart');
        $arr = [ 'id' => $this->id, 'count' => $this->count ];

        if(!empty($data)){
            foreach($data as $value) { 
                if($this->id === $value['id']){
                    return false;
                }
            }
            $data[] = $arr;
            session()->put('cart', $data);
            return true;
        }else{
            $data[] = $arr;
            session()->put('cart', $data);
            return true;
        }
        
        
        
    }

    public function setCountSession()
    {
        $data = session('cart');
        if(!empty($data)){
            foreach($data as &$value) {
                if(in_array($this->id, $value)){
                    $value['count'] = $this->count;
                }
            } 
            session()->put('cart', $data);
        }
        
        
    }

} 