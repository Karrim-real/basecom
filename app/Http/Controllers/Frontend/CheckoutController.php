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

class CheckoutController extends Controller
{

    protected $cartServices;
    protected $orderServices;


    public function __construct(CartServices $cartServices, OrderService $orderService)
    {
        $this->cartServices = $cartServices;
        $this->orderServices = $orderService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($this->orderServices->getAllOrders());
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
        // session(['datas' => $orderDetails]);
        // dd($datas);

        // dd($userID);
        $orderDetails['reference_id'] = time().'drop'.rand(100, 999);
        // $orderDetails['message'] = $datas['message'];
        // $orderDetails['twitter'] = $datas['twitter'];
        // $orderDetails['discord'] = $datas['discord'];
        // $orderDetails['instagram'] = $datas['instagram'];
        // $orderDetails['image'] = $datas['image'];
        $cartProds = $this->cartServices->AllCartProducts();

        // $myorder = $this->orderServices->createOrder($orderDetails);
        // dd($myorder);
        foreach ($cartProds as $cart) {
            $orderDetails['user_id']= $cart['user_id'];
            $orderDetails['prod_id'] = $cart['prod_id'];
            $orderDetails['prod_qty'] = $cart['prod_qty'];
            $this->orderServices->createOrder($orderDetails);
        }

        $cart = Cart::where('user_id', Auth::user()->id)->get();

        foreach($cart as $carts){
            $removeCart = Cart::where('user_id', Auth::user()->id)
            ->where('prod_id', $carts->prod_id)->first();
            $removeCart->delete();

        }
        // Cart::destroy();
        // dd($cart);

        // dd($orderDetails['reference_id']);
        // return 'Done';
        return redirect()->route('thanks-you/',$orderDetails['reference_id'] )->with(
            'datas' , $orderDetails['reference_id']
        );
        // dd($datas);

        // if($payType === 'paystack') {

            // dd($payType, $name, $email, $phone, $payAmount);
            // $paystack = new \Yabacon\Paystack(config('paystack.secret_key'));
            // $reference = time().'drof'.rand(1000, 9999);

            // try
            // {
            //   $tranx = $paystack->transaction->initialize([
            //     'amount'=>$payAmount,       // in kobo
            //     'email'=>$email,         // unique to customers
            //     'reference'=>$reference, // unique to transactions
            //   ]);
            // //   dd($tranx->data);
            // } catch(\Yabacon\Paystack\Exception\ApiException $e){
            //   print_r($e->getResponseObject());
            //   die($e->getMessage());
            // }
            // dd($tranx->status);


            // redirect to page so User can pay
            // header('Location: ' . $tranx->data->authorization_url);

        //     $tranx = $paystack->transaction->initialize([
        //         'reference'=>$reference,
        //         'amount'=>$payAmount, // in kobo
        //         'email'=>$email,

        //       ]);

        //         $res = $paystack->transaction->charge([
        //         'reference'=>$reference,
        //         'authorization_code'=>$tranx->data->access_code ,
        //         'email'=>$email,
        //         'amount'=>$payAmount // in kobo
        //       ]);
        //       dd($res);
        // }else{
        //    dd($payType);
        // }

    // }
}


    public function thanks($reference)
    {
        // dd($reference);
        $getOrder = Order::where('user_id', Auth::user()->id)->where('reference_id', $reference)->get();

        if($getOrder){
            return view('frontend.thank-you', compact('getOrder'));
        }else{
            return redirect()->route('home')->with('message', 'An Error Occurs while processing your order, Pease try again later');
        }
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
