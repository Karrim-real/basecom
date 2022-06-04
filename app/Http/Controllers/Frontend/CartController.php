<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CartServices;
use Illuminate\Queue\Console\RetryCommand;

class CartController extends Controller
{

    protected $cartServices;

    public function __construct(CartServices $cartServices)
    {
        $this->cartServices = $cartServices;
    }


    public function index()
    {
        $cartProds = $this->cartServices->AllCartProducts();
        return view('frontend.cart', compact('cartProds'));
    }

    public function delete($prodID)
    {
        $deletedProd =$this->cartServices->deleteCartProduct($prodID);
        return redirect()->back();
    }

    public function countCart()
    {
        $count = $this->cartServices->cartCounter();
            return response()->json([
                'cartcount' => $count,
            ]);

    }

    public function AjaxNavProd()
    {
        $ajaxProds = $this->cartServices->navAjaxProd();
            foreach($ajaxProds as $ajaprods){
                return response()->json([
                    'cartprods' => $ajaprods->products,
                    'prod_qty' => $ajaprods->prod_qty
                ]);
            }



    }
}
