<?php

namespace App\Services;
use App\Interfaces\ProductInterface;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function prodFilter(int $range)
    {
        return Product::latest()->take($range)->get();
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

        $file = $prod_details['image'];
        $ext = $file->getClientOriginalName();
        $fileName = time().'_'.$prod_details['title'].'.png';
        $file->move('uploads/products/images', $fileName);
        $prod_details['image'] = $fileName;
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

        if($newprod_details['image']){
            $file = $newprod_details['image'];
            $checkProd = Product::find($prodID);
            $destinationPath = 'uploads/products/images';
            if($checkProd){
                $path = $destinationPath.$checkProd->image;
                Storage::delete($path);
                $fileName = time().'_'.$newprod_details['title'].'.png';
                $file->move('uploads/products/images', $fileName);
                $newprod_details['image'] = $fileName;
                return Product::whereId($prodID)->update($newprod_details);
            }
        }
    }

    public function updateProdwithOutImage($prodID, array $newprod_details)
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
