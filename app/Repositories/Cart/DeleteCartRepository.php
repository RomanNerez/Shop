<?php
namespace App\Repositories\Cart;

use App\Products;

class DeleteCartRepository extends CoreRepository
{

	public function deleteCart()
	{
        if($this->userAuth){
            $this->deleteCartInDataBase();
        }else{
            return $this->deleteCartSession();
        }
        
	}

    protected function deleteCartSession()
    {
        $data = session('cart');
        $newData = [];
        if(!empty($data)){
            foreach ($data as $key => $value) {
                if($value['id'] === $this->id){
                    continue;
                }
                $newData[] = $value;
            }
            session()->put('cart', $newData);
            return $this->id;
        }
    }

    public function deleteCartInDataBase()
    {
        $this->carts->where([
            ['users_id', $this->userAuth->id],
            ['products_id', $this->id]
        ])->delete();
    }

}