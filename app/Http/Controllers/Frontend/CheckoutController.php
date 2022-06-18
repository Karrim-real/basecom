<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Services\CartServices;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{

    protected $cartServices;


    public function __construct(CartServices $cartServices)
    {
        $this->cartServices = $cartServices;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cartProds = $this->cartServices->AllCartProducts();

        return view('frontend.checkout', compact('cartProds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CheckoutRequest $request)
    {

        $orderDetails = $request->validated();
        // dd($orderDetails);
        session(['datas' => $orderDetails]);
        // dd($datas);
        return redirect()->route('preview-order');

}

    public function previews()
    {
        $cartProds = $this->cartServices->AllCartProducts();
        // dd(config('paystack.secret_key'));
        session(['cartProds' => $cartProds]);
        return view('frontend.previewcheckout', compact('cartProds'));
    }



    /**
     * thanks
     *
     * @param  mixed $reference
     * @return void
     */
    public function thanks($reference)
    {
        // dd($reference);
        $getOrder = Order::where('user_id', Auth::user()->id)->where('reference_id', $reference)->get();

        if($getOrder){
            return view('frontend.thank-you', compact('getOrder'));
        }else{
            return redirect()->route('home')->with('error', 'An Error Occurs while processing your order, Pease try again later');
        }
    }

}
