<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DynamicTableController extends Controller
{
   public function index()
   {
    return view('product.newTable');
   }
   public function create(Request $request)
   {
     Product::updateproduct($request);
   }

   public function table(Request $request)
   {
    $a = $request->key;

    if($a=='true'){
        $product = new Product();
        $product->save();
    }
    $products = Product::get();


    return view('product.newTable2' , compact('products'));
   }
}
