<?php

namespace App\ProductService;
use App\Interfaces\ProductRepository;
use App\Models\Product;
use ProductInterface;

class ProductService implements ProductInterface {

    /**
     * getAllProducts
     *
     * @return void array Products
     */

    public function getAllProducts()
    {
        return Product::all();
    }

    /**
     * getAProduct
     *
     * @param  mixed $prodID
     * @return void
     */

    public function getAProduct($prodID)
    {
        return Product::find($prodID);
    }

    /**
     * createProducts
     *
     * @param  mixed $prod_details
     * @return array new Product
     */
    public function createProducts(array $prod_details)
    {
        return Product::create($prod_details);
    }

    /**
     * updateProduct
     *
     * @param  mixed $prodID
     * @param  mixed $newprod_details
     * @return void
     */
    public function updateProduct($prodID, array $newprod_details)
    {
        return Product::whereId($prodID)->update($newprod_details);
    }

    /**
     * deletProduct
     *
     * @param  mixed $prodID
     * @return true
     */
    public function deletProduct($prodID)
    {
        return Product::destroy($prodID);
    }



}
