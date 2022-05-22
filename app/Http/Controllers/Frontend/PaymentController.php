<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index($reference)
    {

        return $reference;
        // return response()->json([
        //     'message' => 'we gor you coverred',
        //     'data' => $reference
        // ]);
    }
    public function pay()
    {
        return view('frontend.payments');
    }



}
