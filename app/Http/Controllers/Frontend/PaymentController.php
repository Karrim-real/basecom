<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{


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
            'redirect_url'=> 'https://charge/completed/page',
            'cancel_url' => env('APP_URL').'preview-order'
        ]);
        return response()->json([
            'status' => 'success',
            'title' => 'Loading...',
            'data' => $client->json(),
            'message' => 'You choose crypto as Payment, Please wait while we redirect you to payment page'
    ]);

    }

    public function checkPayment()
    {
        # code...
    }
}
