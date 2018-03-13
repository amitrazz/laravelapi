<?php

namespace App;
use App\Scopes\SellerScope;
use App\Product;


class seller extends User
{
    protected static function boot(){
        parent::boot();
        static::addGlobalScope(new SellerScope);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
