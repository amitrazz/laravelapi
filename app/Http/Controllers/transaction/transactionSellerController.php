<?php

namespace App\Http\Controllers\transaction;

use App\transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class transactionSellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {
        $seller = $transaction->product->seller;
        return $this->showOne($seller);
    }
}
