<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\MainCategory;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        return $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = $this->categoryService->getAllcategorys();
        return view('admin.category.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maincate = MainCategory::all();
        return view('admin.category.add-category', compact('maincate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $cat_details = $request->validated();
        // dd($cat_details);

        $cat_details['status'] = $request->status == TRUE ? 1 : 0;
        $categorys = $this->categoryService->createcategorys($cat_details);
        return redirect()->route('admin.categorys')->with([
            'message' => 'Category Added Successfully',
            'prods' => $categorys
        ]);
        // dd($cat_details);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($catID)
    {
        $category = $this->categoryService->getAcategory($catID);
        if(!$category){
            return back()->with([
                'message' => 'No product with this identity'
            ]);
        }
        return view('admin.category.edit-category', compact('category'));
    }


    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $catID
     * @return void
     */
    public function update(UpdateCategoryRequest $request, $catID)
    {
        $newcat_details = $request->validated();
        $newcat_details['status'] = $request->status == TRUE ? 1 : 0;
        if(!$request->hasFile('images')){
            $categorys = $this->categoryService->updateCatwithOutImage($catID, $newcat_details);
            return redirect()->route('admin.categorys')->with([
                'message' => 'Category Updated Successfully',
                'prods' => $categorys
            ]);
        }else{
        $categorys = $this->categoryService->updatecategory($catID, $newcat_details);
        return redirect()->route('admin.categorys')->with([
            'message' => 'Category Updated Successfully',
            'prods' => $categorys
        ]);
        }
    }

    /**
     * search
     *
     * @param  mixed $request
     * @return void
     */
    public function search(Request $request)
    {
        $searchText = $request->get('searchname');
        // dd($search);
         return $this->categoryService->liveSearch($searchText);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($catID)
    {
        // return 'Delter page';
        $categorys = $this->categoryService->deletcategory($catID);
        return redirect()->route('admin.categorys')->with([
            'message' => 'Category Deleted!',
            'prods' => $categorys
        ]);
    }
}
