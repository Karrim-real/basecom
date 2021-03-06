<?php
namespace App\Services;

use App\Interfaces\CategoryInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class CategoryService implements CategoryInterface{

    /**
     * getAllcategorys
     *
     * @return void
     */
    public function getAllcategorys()
    {
      return Category::paginate(10);
    }

    /**
     * getAcategory
     *
     * @param  mixed $catID
     * @return void
     */
    public function getAcategory($catID)
    {
      return Category::find($catID);
    }

    /**
     * liveSearch
     *
     * @param  mixed $searchText
     * @return void
     */
    public function liveSearch($searchText)
    {
        $result = Category::query()->where('title', 'LIKE',"%".$searchText."%")
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
                <td><a href="edit-product/'.$searchValue->id.'" class="btn btn-primary">'.'Edit'.'</button></td>
                <td><a href="deleteproduct/'.$searchValue->id.'" class="btn btn-danger">'.'Delete'.'</button></td>

                <tr>';

             }

         }
         return response($output);

    }

    /**
     * createcategorys
     *
     * @param  mixed $cat_details
     * @return void
     */
    public function createcategorys(array $cat_details)
    {
        $file = $cat_details['images'];
        $ext = $file->getClientOriginalName();
        $fileName = time().'_'.$cat_details['title'].'.png';
        $file->move('uploads/categorys/images', $fileName);
        $cat_details['images'] = $fileName;

            return Category::create($cat_details);

    }

    /**
     * updatecategory
     *
     * @param  mixed $catID
     * @param  mixed $newcat_details
     * @return void
     */
    public function updatecategory($catID, array $newcat_details)
    {
        if($newcat_details['images']){
            $file = $newcat_details['images'];
            $checkProd = Product::find($catID);
            $destinationPath = 'uploads/categorys/images';
            if($checkProd){
                $path = $destinationPath.$checkProd->image;
                Storage::delete($path);
                $fileName = time().'_'.$newcat_details['title'].'.png';
                $file->move('uploads/categorys/images', $fileName);
                $newpcat_details['images'] = $fileName;
                return Category::whereId($catID)->update($newcat_details);
            }
        }
    }

    /**
     * updateCatwithOutImage
     *
     * @param  mixed $catID
     * @param  mixed $newcat_details
     * @return void
     */
    public function updateCatwithOutImage($catID, array $newcat_details)
    {
      return Category::whereId($catID)->update($newcat_details);

    }

    /**
     * deletcategory
     *
     * @param  mixed $catID
     * @return void
     */
    public function deletcategory($catID)
    {
      return Category::destroy($catID);
    }

}
