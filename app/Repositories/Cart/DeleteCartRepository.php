<?php
namespace App\Repositories\Cart;

use App\Products;

class DeleteCartRepository extends CoreRepository
{

	public function deleteCart()
	{
        if($this->userAuth){

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


}