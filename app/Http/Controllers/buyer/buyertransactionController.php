<?php

namespace App\Http\Controllers\buyer;

use App\buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class buyertransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $transactions = $buyer->transactions ;
        return $this->showAll($transactions);
    }
}
