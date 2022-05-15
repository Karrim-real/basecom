<?php
namespace App\CartServices;

use App\Interfaces\CartInterface;

class CartServices implements CartInterface
{

    /**
     * AddProduct
     *
     * @param  mixed $ProdID
     * @param  mixed $prod_details
     * @return void
     */
    public function AddProduct(int $ProdID, array $prod_details)
    {
        return ;
    }

    /**
     * EditProduct
     *
     * @param  mixed $ProdID
     * @param  mixed $prod_details
     * @return void
     */
    public function EditProduct(int $ProdID, array $prod_details)
    {
        return ;
    }

    public function deleteCartProduct(int $ProdID)
    {
        return ;
    }
}
