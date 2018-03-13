<?php

namespace App\Http\Controllers\transaction;

use App\transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class transactionCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction )
    {
        $categories = $transaction->product->categories;
        return $this->showAll($categories);
    }
}
