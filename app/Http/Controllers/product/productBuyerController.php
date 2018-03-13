<?php

namespace App\Http\Controllers\product;

use App\product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class productBuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $buyers = $product->transactions()->with('buyer')->get()->pluck('buyer')->unique('id')->values();
        return $this->showAll($buyers);
    }
}
