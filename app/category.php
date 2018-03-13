<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name','description'];
    protected $hidden = ['pivot'];
    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
