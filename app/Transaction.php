<?php

namespace App;

use App\buyer;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['quantity','buyer_id','product_id'];
    public function buyer(){
        return $this->belongsTo(Buyer::class);
    }
    public function product(){
        return $this->belongsTo(product::class);
    }
}
