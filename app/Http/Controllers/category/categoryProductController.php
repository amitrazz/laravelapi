<?php

namespace App\Http\Controllers\category;

use App\category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class categoryProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $products = $category->products;
        return $this->showAll($products);
    }
}
