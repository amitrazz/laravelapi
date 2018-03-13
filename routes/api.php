<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//buyer
Route::resource('buyers','buyer\buyersController',['only' => ['index','show']]);
Route::resource('buyers.transactions','buyer\buyerTransactionController',['only' => ['index']]);
Route::resource('buyers.products','buyer\buyerProductController',['only' => ['index']]);
Route::resource('buyers.sellers','buyer\buyerSellerController',['only' => ['index']]);
Route::resource('buyers.categories','buyer\buyerCategoryController',['only' => ['index']]);

//seller
Route::resource('sellers','seller\sellersController',['only' => ['index','show']]);
Route::resource('sellers.transactions','seller\SellerTransactionController',['only' => ['index']]);
Route::resource('sellers.categories','seller\SellerCategoryController',['only' => ['index']]);
Route::resource('sellers.buyers','seller\SellerBuyerController',['only' => ['index']]);
Route::resource('sellers.products','seller\SellerProductController',['only' => ['index','store','update','destroy']]);


//product
Route::resource('products','product\productsController',['only' => ['index','show']]);
Route::resource('products.transactions','product\productTransactionController',['only' => ['index']]);
Route::resource('products.buyers','product\productBuyerController',['only' => ['index']]);
Route::resource('products.categories','product\productCategoryController',['only' => ['index','update','destroy']]);
Route::resource('products.buyers.transactions','product\productBuyertransactionController',['only' => ['store']]);

//category
Route::resource('categories','category\categoriesController',['except' => ['create','edit']]);
Route::resource('categories.products','category\categoryProductController',['only' => 'index']);
Route::resource('categories.sellers','category\categorySellerController',['only' => 'index']);
Route::resource('categories.transactions','category\categoryTransactionController',['only' => 'index']);
Route::resource('categories.buyers','category\categoryBuyerController',['only' => 'index']);

//transaction
Route::resource('transactions','transaction\transactionController',['only' => ['index','show']]);
Route::resource('transactions.categories','transaction\transactionCategoryController',['only' => ['index']]);
Route::resource('transactions.sellers','transaction\transactionSellerController',['only' => ['index']]);

//users
Route::resource('users','user\UsersController',['except' => ['create','edit']]);


