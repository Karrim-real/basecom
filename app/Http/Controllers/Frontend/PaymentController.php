<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Services\CartServices;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{

    protected $cartServices;
    protected $orderServices;


    public function __construct(CartServices $cartServices, OrderService $orderService)
    {
        $this->cartServices = $cartServices;
        $this->orderServices = $orderService;
    }

     /**
     * Display the specified resource.
     * Paystack API Call
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orderPayment($reference)
    {
        if(!$reference){
            return back()->with('error', 'Your reference key is empty, Please try again later');
        }else{

         $response = Http::withToken(config('paystack.secret_key'),
            )->get("https://api.paystack.co/transaction/verify/$reference");

            if ($response['status'] == '0') {
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
                    'title' => 'Congratulation, You just order a Service',
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
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('frontend.payment');
    }



    public function payment()
    {

        $datas = session('datas');
        // dd($datas);
        $client = Http::acceptJson()->withHeaders([
            'X-CC-Api-Key' => env('COINBASE_KEY'),
            'X-CC-Version' => '2018-03-22'

        ])->post('https://api.commerce.coinbase.com/charges', [
            'name' => $datas['name'],
            'description' => $datas['twitter'],
            'local_price' => [
                'amount' => $datas['amount'],
                'currency' => 'USD'
            ],
            'pricing_type' => 'fixed_price',
            'metadata' => [
                'customer_id' => Auth::user()->id,
                'customer_name' => $datas['name'],
            ],
            'redirect_url'=> env('APP_URL').'thank-btc',
            'cancel_url' => env('APP_URL').'preview-order'
        ]);
                    $payeecode = json_decode($client);
                    $orderDetails = session('datas');
                    $orderDetails['payment_type'] = 'btc';
                    $orderDetails['payment_ref'] = $payeecode->data->code;;
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
                    'title' => 'Loading...',
                    'data' => $client->json(),
                    'message' => 'You choose crypto as Payment, Please wait while we redirect you to payment page'
            ]);

    }

    public function thankbtc()
    {

        return view('frontend.thanks-btc');

    }

}
