<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock_in;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function create(Request $request)
    {
        Product::addProduct($request);
        return redirect('/')->with('message', 'Product added successfully');
    }

    public function manage()
    {
         $products = Product::join('stock_ins', 'stock_ins.product_id', '=', 'products.id')
            ->leftjoin('stock_outs', 'stock_outs.product_id', '=', 'products.id')
            ->orderBy('products.id', 'desc')
            ->select('products.product_name', 'stock_ins.quantity', 'products.price', 'products.unit', 'stock_outs.stock_out_qty')
            ->get();
        return view('product.manage', ['products' => $products]);
    }
}
