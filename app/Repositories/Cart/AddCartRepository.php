<?php
namespace App\Repositories\Cart;

use App\Products;

class AddCartRepository extends CoreRepository
{

	public function addCart()
	{
        if($this->userAuth){
            return $this->addCartInDataBase();
        }else{
            $this->setCountSession();
            return $this->getCartSession();
        }
        
	}

    protected function addCartInDataBase()
    {
        $exists = $this->carts->where([
            ['products_id', $this->id],
            ['users_id', $this->userAuth->id]
        ])->exists();

        if(!$exists){
            $this->carts->insert(
                [
                    'products_id' => $this->id,
                    'count_product' => $this->count,
                    'users_id' => $this->userAuth->id,
                ]
            );
            $product = Products::where('id', $this->id)->first();
            $product->count = $this->count;
            return $product;
        }else{
            $this->incrementCartCount($exists);
        }
        return null;
    }

    protected function incrementCartCount($e)
    {
        if($e){
            $this->carts->where([
                ['products_id', $this->id],
                ['users_id', $this->userAuth->id],
            ])->update(['count_product' => $this->count]);
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