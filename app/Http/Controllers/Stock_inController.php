<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock_in;
use App\Models\Stock_out;
use Illuminate\Http\Request;

class Stock_inController extends Controller
{
    private $product, $stockins;
    public function index()
    {
        $this->product = Product::all();
        return view('stock-in.index', ['products' => $this->product]);
    }

    public function create(Request $request)
    {
        Stock_in::addStockin($request);
        $this->product = Product::all();
        return redirect('/product/manage');
    }

    public function manage()
    {
       $this->stockins = Stock_in::orderBy('id', 'desc')->get();
       return view('stock-in.manage', ['stockins' => $this->stockins]);
    }

    

}
