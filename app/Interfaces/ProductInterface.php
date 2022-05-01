<?php
namespace App\Interfaces;

interface ProductInterface{


    /**
     * getAllProducts
     *
     * @return void
     */
    public function getAllProducts();

    /**
     * getAProduct
     *
     * @param  mixed $prodID
     * @return void
     */
    public function getAProduct($prodID);

    /**
     * createProducts
     *
     * @param  mixed array $prod_details
     * @return void
     */
    public function createProducts(array $prod_details);

    /**
     * updateProduct
     *
     * @param  mixed $prodID
     * @param  mixed array $newprod_details
     * @return void
     */
    public function updateProduct($prodID, array $newprod_details);

    /**
     * deletProduct
     *
     * @param  mixed $prodID
     * @return void
     */
    public function deletProduct($prodID);
}
