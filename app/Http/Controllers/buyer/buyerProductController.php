<?php

namespace App\Http\Controllers\buyer;

use App\buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class buyerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $products = $buyer->transactions()->with('product')->get()->pluck('product');
        return $this->showAll($products);
    }
}
