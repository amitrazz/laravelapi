<?php

namespace App\Http\Controllers\product;

use App\product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class productsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return $this->showAll($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return $this->showOne($product);
    }
}