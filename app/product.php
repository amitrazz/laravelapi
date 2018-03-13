<?php

namespace App;

use App\category;
use App\Transaction;
use App\Seller;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    const AVAILABLE_PRODUCT = 'available';
    const UNAVAILABLE_PRODUCT = 'unavailable';
    protected $fillable = ['name','description','quantity','status','image','seller_id'];
    protected $hidden = ['pivot'];

    public function isAvailable(){
        return $this->status == product::AVAILABLE_PRODUCT;
    }
    public function seller(){
        return $this->belongsto(Seller::class);
    }
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
