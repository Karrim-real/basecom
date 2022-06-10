<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
            'X-CC-Api-Key' => env('COINBASE'),
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
                'customer_id' => time().rand(10, 100),
                'customer_name' => $datas['name'],
            ],
            'redirect_url'=> 'https://charge/completed/page',
            'cancel_url' => 'https://charge/canceled/page'
        ]);
        return response()->json(['data' => $client->json()]);

    }
}
