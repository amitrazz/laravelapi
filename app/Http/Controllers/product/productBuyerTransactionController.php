<?php

namespace App\Http\Controllers\product;

use App\product;
use App\user;
use App\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class productBuyerTransactionController extends ApiController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, product $product, User $buyer)
    {
        $rules = [
            'quantity' => 'required|integer|min:1'
        ];
        $this->validate($request,$rules);

        if($buyer->id == $product->seller_id){
            return $this->errorResponse('buyer must be differnt from seller',409);
        }
        if(!$buyer->isVerified()){
            return $this->errorResponse('buyer must be Verified',409);
        }

        if(!$product->seller->isVerified()){
            return $this->errorResponse('Seller must be Verified',409);
        }

        if(!$product->isAvailable()){
            return $this->errorResponse('product is not Availabe',409);
        }

        if($product->quantity < $request->quantity){
            return $this->errorResponse('product do not have enough quantity for this transactions',409);  
        }

        return DB::transaction(function() use($request,$product,$buyer) {
            $product->quantity -= $request->quantity;
            $product->save();
            $transaction = Transaction::create([
                'quantity' => $request->quantity,
                'buyer_id' => $buyer->id,
                'product_id' => $product->id,
            ]);
            return $this->showOne($transaction);
        });
       

    }
}
