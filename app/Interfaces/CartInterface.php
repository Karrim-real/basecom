<?php

namespace App\Interfaces;

interface CartInterface
{
    public function AddProduct(int $ProdID, array $prod_details);
    public function EditProduct(int $ProdID, array $prod_details);
    public function deleteCartProduct(int $ProdID);


}
