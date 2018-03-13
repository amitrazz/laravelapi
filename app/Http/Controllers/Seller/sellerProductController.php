<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Exception;
use Illuminate\Database\Eloquent\Model;
use App\user;
use App\seller;
use App\Product;

class sellerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(seller $seller)
    {
        $products = $seller->products;
        return $this->showAll($products);
    }
    public function store(Request $request, User $seller)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer|min:1',
            'image' => 'required|image',
        ];
        $this->validate($request,$rules);
        $data = $request->all();

        $data['status'] = product::UNAVAILABLE_PRODUCT;
        $data['image']  = '1.jpeg';
        $data['seller_id']  =   $seller->id;

        $product = product::create($data);
        return $this->showOne($product, 201);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, seller $seller,Product $product)
    {
        $rules = [
            'quantity' => 'integer|min:1',
            'status'   => 'in:' .Product::AVAILABLE_PRODUCT . ',' . Product::UNAVAILABLE_PRODUCT,
            'image' => 'image',
        ];
        $this->validate($request,$rules);
        $this->checkSeller($seller,$product);
        $product = fill($reques->intersect([
            'name','description','quantity'
        ]));
        if($reques->has('status')){
            $product->status = $reques->status;
            if($product->isAvailable() && $product->categories()->count == 0){
                return $this->errorResponse('Active Product must have at least one category',409);
            }
        }
        if($product->isClean()){
            return $this-errorResponse('you need to specify a differnet value to update', 422);
        }
        $product->save();
        return $this->showOne($product);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller, Product $product)
    {
        $this->checkSeller($seller,$product);
        $product->delete();
        return $this->showOne($product);
    }
    protected function checkSeller(Seller $seller, Product $product)
    {
        if($seller->id != $product->seller_id){
            throw new HttpException(422, 'Your error message'); //have to check why throw new HttpException is not working
        }

    }
}
