<?php

namespace App\Services;
use App\Interfaces\ProductInterface;
use App\Models\Product;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;

class ProductService implements ProductInterface {

    /**
     * getAllProducts
     *
     * @return void array Products
     */

    public function getAllProducts()
    {
        return Product::paginate(10);
    }

    /**
     * prodFilter
     *
     * @param  mixed $range
     * @return void
     */
    public function prodFilter(int $range)
    {
        return Product::latest()->take($range)->get();
    }


    public function liveSearch($searchText)
    {
        $result = Product::query()->where('title', 'LIKE',"%".$searchText."%")
         ->orWhere('id', 'LIKE', "%". $searchText. "%")
         ->get();
         $output = '';
         if(!$result){
            $output .= 'No Product Avaialable';
         }else{

             foreach ($result as $searchValue) {
                $output .=
                '<tr>
                <td>'.$searchValue->id.'</td>
                <td>'.$searchValue->title.'</td>
                <td>'.$searchValue->desc.'</td>
                <td>'.$searchValue->discount_price.'</td>
                <td>'.$searchValue->Categorys->title.'</td>
                <td><a href="edit-product/'.$searchValue->id.'" class="btn btn-primary">'.'Edit'.'</button></td>
                <td><a href="deleteproduct/'.$searchValue->id.'" class="btn btn-danger">'.'Delete'.'</button></td>

                <tr>';

             }

         }
         return response($output);

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
            $destinationPath = 'uploads/products/images/'.$checkProd->image;
            if(FacadesFile::exists($destinationPath)){
                // dd($destinationPath);
                FacadesFile::delete($destinationPath);
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
        $checkProd = Product::find($prodID);
        $destinationPath = 'uploads/products/images/'.$checkProd->image;
        if(FacadesFile::exists($destinationPath)){
            FacadesFile::delete($destinationPath);
        return Product::destroy($prodID);

        }
    }



}
