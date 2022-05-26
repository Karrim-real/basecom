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
        return view('frontend.previewcheckout', compact('cartProds'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orderPayment($reference)
    {
        if(!$reference){
            return back()->with('error', 'Your reference key is empty, Please try again later');
        }else{

            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer ".config('paystack.secret_key'),
                "Cache-Control: no-cache",
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if ($err) {
            //   return "cURL Error #:" . $err;
            return response()->json([
                'status' => 'error',
                'message' => 'An Error occur while proccesing your payment, Please try again later',
                'url' => '/'
            ]);

            } else {
                $decode_response = json_decode($response);
                if($decode_response->status){
                    $orderDetails = session('datas');
                    $orderDetails['payment_type'] = 'paystack';
                    $orderDetails['payment_ref'] = $decode_response->data->reference;
                $orderDetails['reference_id'] = 'drop'.time().rand(100, 999);
                 $cartProds = $this->cartServices->AllCartProducts();
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
                return response()->json([
                    'status' => 'success',
                    'message' => 'You order was successfull, Please take a chill while proccess your order, Thanks',
                    'url' => 'thanks-you/'.$orderDetails['reference_id'],
                ]);
                }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'An Error occur while proccesing your payment, Please try again later',
                    'url' => '/'
                ]);

                }
            }
        }


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
