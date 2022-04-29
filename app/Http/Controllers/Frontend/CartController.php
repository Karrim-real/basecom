<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Queue\Console\RetryCommand;

class CartController extends Controller
{

    public function index()
    {
        return view('frontend.cart');
    }
}
