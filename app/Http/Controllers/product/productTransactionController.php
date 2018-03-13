<?php

namespace App\Http\Controllers\product;

use App\product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class productTransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(product $product)
    {
        $transactions = $product->transactions;
        return $this->showAll($transactions);
    }
}
