<?php

namespace App\Http\Controllers;

use App\Services\CartServices;
use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Services\CategoryService;
use App\Services\ProductService;


class FrontendController extends Controller
{
    protected $ProductService, $CartService, $categoryServices;

    public function __construct(ProductService $ProductService, CartServices $CartService, CategoryService $categoryServices)
    {
        $this->ProductService = $ProductService;
        $this->CartService = $CartService;
        $this->categoryServices = $categoryServices;
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
    //    $categorys = $this->categoryServices->getAllcategorys();
        return view('index', compact('products', 'recentProds'));
    }



    /**
     * show
     *
     * @return void
     */
    public function show()
    {
        $recentProds = $this->ProductService->prodFilter(6);
        $products = $this->ProductService->getAllProducts();
        return view('frontend.products', compact('products', 'recentProds'));
    }

    public function singleProd(int $product)
    {

        $products = $this->ProductService->getAProduct($product);
        //  dd($productss);
        return view('frontend.product', compact('products'));
    }

    public function addToCart(AddToCartRequest $request)
    {
        $prod_detail = $request->validated();
        // dd(Auth::user()->id);
        return $this->CartService->AddProduct($prod_detail);

        // if(!$user_id){
        //     return "User Not Login";
        //     // return response()->json([
        //     //     'status' => 400,
        //     // 'message' => 'Please Login to add product to cart'
        //     // ]);
        // }else{
        //     $prod_detail['user_id'] = $user_id->id;
        // }

    }

    public function addToCartAjax(AddToCartRequest $request)
    {
        $prod_detail = $request->validated();
        // dd(Auth::user()->id);
        return $this->CartService->AddProduct($prod_detail);
    }

   /**
    * allCates
    *
    * @return void
    */
   public function allCates()
   {
        $recentProds = $this->ProductService->prodFilter(6);
       $categorys = $this->categoryServices->getAllcategorys();
        return view('frontend.categorys', compact('categorys', 'recentProds'));
   }
   public function cateProds(Category $category)
   {
       $categoryID = $category->id;
       $category = $this->categoryServices->getAcategory($categoryID);
    //    dd($category);
       return view('frontend.categproducts', compact('category'));
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
