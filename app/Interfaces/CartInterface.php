<?php

namespace App\Interfaces;

interface CartInterface
{
    public function AddProduct(array $prod_details);
    public function AllCartProducts();
    public function cartCounter();
    public function navAjaxProd();
    public function DelCartAfterPay(int $userID);
    public function deleteCartProduct(int $ProdID);

}
