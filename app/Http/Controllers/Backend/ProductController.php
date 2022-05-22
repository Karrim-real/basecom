<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryServices;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryServices = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prods = $this->productService->getAllProducts();
        return view('admin.index', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = $this->categoryServices->getAllcategorys();
        return view('admin.add-product', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $prodDetails = $request->validated();
        $prodDetails['status'] = $request->status == TRUE ? 1 : 0;

        // $prodDetails['user_id'] = Auth::user()->id;
        // dd($prodDetails['status']);
        $prods = $this->productService->createProducts($prodDetails);
        return redirect()->route('admin.dashboard')->with([
            'message' => 'Product Added Successfully',
            'prods' => $prods
        ]);
        // dd($prodDetails);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $ProdID)
    {
        $product = $this->productService->getAProduct($ProdID);
        $categorys = $this->categoryServices->getAllcategorys();
        if(!$product){
            return back()->with([
                'message' => 'No product with this identity'
            ]);
        }
        return view('admin.edit-product', compact('product', 'categorys'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $ProdID
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, int $ProdID)
    {
        $newprod_details = $request->validated();
        $newprod_details['status'] = $request->status == TRUE ? 1 : 0;
        if(!$request->hasFile('image')){
            $prods = $this->productService->updateProdwithOutImage($ProdID, $newprod_details);
            return redirect()->route('admin.dashboard')->with([
                'message' => 'Product Added Successfully',
                'prods' => $prods
            ]);
        }else{
        $prods = $this->productService->updateProduct($ProdID, $newprod_details);
        return redirect()->route('admin.dashboard')->with([
            'message' => 'Product Updated Successfully',
            'prods' => $prods
        ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ProdID)
    {
        $prods = $this->productService->deletProduct($ProdID);
        return redirect()->route('admin.dashboard')->with([
            'error' => 'Product Deleted Successfully',
            'prods' => $prods
        ]);
    }
}
