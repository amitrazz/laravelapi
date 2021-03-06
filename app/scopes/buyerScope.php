<?php
namespace App\Scopes;

use Illuminate\DataBase\Eloquent\model;
use Illuminate\DataBase\Eloquent\Scope;
use Illuminate\DataBase\Eloquent\builder;


class BuyerScope implements Scope
{
  public function apply(Builder $builder,Model $model){
    $builder->has('transactions');
  }

}