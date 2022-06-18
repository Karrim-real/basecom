<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Http\Requests\StoreMainCategoryRequest;
use App\Http\Requests\UpdateMainCategoryRequest;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMainCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMainCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function show(MainCategory $mainCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(MainCategory $mainCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMainCategoryRequest  $request
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMainCategoryRequest $request, MainCategory $mainCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainCategory $mainCategory)
    {
        //
    }
}
