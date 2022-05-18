<?php
namespace App\Services;

use App\Interfaces\CartInterface;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartServices implements CartInterface
{

    /**
     * AddProduct
     *
     * @param  mixed $ProdID
     * @param  mixed $prod_details
     * @return void
     */
    public function AddProduct(array $prod_details)
    {
        if(!Auth::check()){
            return response()->json([
                'status' => 'warning',
            'message' => 'Please Login to add product to cart'
            ]);
        }else{
        $user_id = User::where('id', Auth::user()->id)->first();
        $prod_details['user_id'] = $user_id->id;
        $cart = Cart::where('prod_id', $prod_details['prod_id'])
        ->where('user_id', Auth::user()->id)->exists();
        // dd($cart);
        if($cart){
            return response()->json([
                'status' => 'error',
            'message' => 'Product Alread Exists in your cart'
            ]);
        }else{
            $insertCart = Cart::create($prod_details);
            // dd($insertCart);
            return response()->json([
                'status' => 'success',
                'message' => 'Product Added Successfully',
                // 'text' => 'You have Added a product, Keep Shopping'
            ]);
        }

        }
    }

    public function AllCartProducts()
    {
       return Cart::where('user_id', Auth::user()->id)->get();
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

    /**
     * deleteCartProduct
     *
     * @param  int $ProdID
     * @return void
     */
    public function deleteCartProduct(int $ProdID)
    {
        return Cart::destroy($ProdID);
    }
}
