<?php

namespace App\Http\Controllers\category;

use App\category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class categorySellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $sellers = $category->products()->with('seller')->get()->pluck('seller')->unique()->values();
        return $this->showAll($sellers);
    }
}
