<?php

namespace App\Http\Controllers\transaction;

use App\transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class transactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = transaction::all();
        return $this->showAll($transactions);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(transaction $transaction)
    {
        return $this->showOne($transaction);
    }
}
