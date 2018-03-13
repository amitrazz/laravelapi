<?php

namespace App\Http\Controllers\category;

use App\category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CategoriesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return $this->ShowAll($categories);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'          => 'required',
            'description'   => 'required'
        ];
        $this->validate($request,$rules);
        $newCategory = Category::create($request->all()); 
        return $this->showOne($newCategory,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        return $this->showOne($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        if($request->has('name')){
            $category->name = $request->name;
        }
        if($request->has('description')){
            $category->description = $request->description;
        }
        
        if($category->isClean()){
            return $this->errorResponse('you need to specify different value to update',422);
        }
        $category->save();
        return $this->showOne($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        return $this->showOne($category);
    }
}
