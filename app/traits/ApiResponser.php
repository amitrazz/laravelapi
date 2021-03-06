<?php
namespace App\traits;

use Illuminate\support\Collection;
use Illuminate\Database\Eloquent\Model;


  trait ApiResponser
  {
    private function successResponse($data,$code){
      return response()->json($data,$code);
    }
    protected function errorResponse($message,$code){
      return response()->json(['error' => $message, 'code' => $code], $code);
    }
    protected function showAll(collection $collection , $code = 200){
      return $this->successResponse(['data' => $collection ], $code);
    }
    protected function showOne(model $model , $code = 200){
      return $this->successResponse(['data' => $model ], $code);
    }

  }