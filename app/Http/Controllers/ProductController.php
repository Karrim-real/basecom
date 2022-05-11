<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        return view('index');
    }


    /**
     * show
     *
     * @return void
     */
    public function show()
    {
        return view('frontend.products');
    }


    /**
     * about
     *
     * @return void
     */
    public function about()
    {
        return view('frontend.about');
    }


    /**
     * contact
     *
     * @return void
     */
    public function contact()
    {
        return view('frontend.contact');
    }

        /**
     * contact
     *
     * @return void
     */
    public function contactstore(ContactRequest $request)
    {
        $message = $request->validated();
        dd($message);
        return view('frontend.contact');
    }


    /**
     * privacy
     *
     * @return void
     */
    public function privacy()
    {
        return view('frontend.privacy-policy');
    }

    /**
     * faq
     *
     * @return void
     */
    public function faq()
    {
        return view('frontend.faq');
    }

    public function tracking()
    {
        return view('frontend.tracking');
    }

    public function trackingCreate()
    {
       return view('frontend.tracking');
    }

    public function error()
    {
        return view('frontend.404');
    }

}
