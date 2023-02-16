<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock_out;
use Illuminate\Http\Request;


class Stock_outController extends Controller
{
    private $product;
    public function index()
    {
        $this->product = Product::all();
        return view('stock-out.index', ['products' => $this->product]);
    }

    public function create(Request $request)
    {
        Stock_out::addStockout($request);
        $this->product = Product::all();
        return redirect('/product/manage');
    }
}
