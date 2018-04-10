<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
use App\Product;
class searchController extends Controller
{
    public function index()

    {

    	return view('autocomplete');

    }

    public function search(Request $request){

        if($request->ajax())
 
        {
        
        $output="";
        
        $products = DB::table('products')->where('name','LIKE','%'.$request->search."%")->get();
        
        if($products)
        
        {
        
        foreach ($products as $key => $product) {
        
        $output.='<tr>'.
        
        '<td>'.$product->id.'</td>'.
        
        '<td>'.$product->name.'</td>'.
        
        '<td>'.$product->description.'</td>'.
        
        '<td>'.$product->quantity.'</td>'.
        
        '</tr>';
        
        } 
        return Response($output); 
       }
        
    }
        
    }
}
