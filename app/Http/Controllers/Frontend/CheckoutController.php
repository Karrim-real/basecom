<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Services\CartServices;
use App\Services\OrderService;
use Illuminate\Http\Request;

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

        $datas = $request->validated();
        // dd($datas);
        $orderDetails['reference_id'] = time().'drop'.rand(100, 999);
        $orderDetails['message'] = $datas['message'];
        $cartProds = $this->cartServices->AllCartProducts();
        // dd($cartProds);
        // $myorder = $this->orderServices->createOrder($cartProds);
        // dd($myorder);
        foreach ($cartProds as $cart) {
            $orderDetails['user_id']= $cart['user_id'];
            $orderDetails['prod_id'] = $cart['prod_id'];
            $orderDetails['prod_qty'] = $cart['prod_qty'];
            $orderDetails['total_price'] = $datas['amount'];
            $this->orderServices->createOrder($orderDetails);
        }

        return redirect()->route('thanks-you')->withMessage([
            'status' => 'success',
            'title' => 'You have make an order',
            'body' => 'Thanks you for ordering, we will send an notify you shortly on your email. Thanks once again'
        ]);
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


    public function thanks()
    {
        return view('frontend.thank-you');
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
