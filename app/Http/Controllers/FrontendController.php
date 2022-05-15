<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\ContactRequest;
use App\Models\Product;
use App\Models\User;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    protected $ProductService;

    public function __construct(ProductService $ProductService)
    {
        $this->ProductService = $ProductService;
    }
        /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $products = $this->ProductService->prodFilter(3);
        $recentProds = $this->ProductService->prodFilter(6);
        return view('index', compact('products', 'recentProds'));
    }


    /**
     * show
     *
     * @return void
     */
    public function show()
    {
        $products = $this->ProductService->getAllProducts();
        return view('frontend.products', compact('products'));
    }

    public function singleProd(int $product)
    {

        $products = $this->ProductService->getAProduct($product);
        //  dd($productss);
        return view('frontend.product', compact('products'));
    }

    public function addToCart(AddToCartRequest $request, int $product)
    {
        $prod_detail = $request->validated();
        // dd(Auth::user()->id);
            if(!Auth::user()){
                return response()->json([
                    'status' => 400,
                'message' => 'Please Login to add product to cart'
                ]);
            }else{
            $user_id = User::where('id', Auth::user()->id)->first();
            $prod_detail['user_id'] = $user_id->id;
            dd($prod_detail);
            }

        // if(!$user_id){
        //     return "User Not Login";
        //     // return response()->json([
        //     //     'status' => 400,
        //     // 'message' => 'Please Login to add product to cart'
        //     // ]);
        // }else{
        //     $prod_detail['user_id'] = $user_id->id;
        // }
        return $product;
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

    public function myerror()
    {
        return view('frontend.404');
    }
}
