<?php

namespace App\Interfaces;

interface CartInterface
{
    public function AddProduct(array $prod_details);
    public function AllCartProducts();
    public function EditProduct(int $ProdID, array $prod_details);
    public function deleteCartProduct(int $ProdID);

}
