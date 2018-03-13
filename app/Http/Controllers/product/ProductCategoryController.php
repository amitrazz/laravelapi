<?php

namespace App\Http\Controllers\product;

use App\product;
use App\category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProductCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(product $product)
    {
        $categories = $product->categories;
        return $this->showAll($categories);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product,Category $category)
    {
       // attach, sync, syncWithoutDetach
       // $product->categories()->attach([$category->id]);  issue attach same category many time
      //   $product->categories()->sync([$category->id]);   issue  attach but remove all previous
          $product->categories()->syncWithoutDetaching([$category->id]);  
        return $this->showAll($product->categories);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product,category $category)
    {
        if(!$product->categories()->find($category->id)){
            return $this->errorResponse('This specified  category is not a category of product ',404);
        }
        $product->categories()->detach($category->id);
        return $this->showAll($product->categories);
    }
}
