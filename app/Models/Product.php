<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product, $query, $products;

    public static function addProduct($request)
    {
        self::$product = new Product();
        self::$product->product_name = $request->product_name;
        self::$product->price = $request->price;
        self::$product->unit = $request->unit;
        self::$product->save();
    }

    public static function searchProduct($request)
    {
        // return $request->search;
        $req = explode(" ", $request->search);
        if ($req) {
            for ($i = 0; $i < 2 - count($req); $i++) {
                array_push($req, "");
                // return $req;
            }
        }


        $products = Product::join('stock_ins', 'stock_ins.product_id', '=', 'products.id')
            ->leftjoin('stock_outs', 'stock_outs.product_id', '=', 'products.id')
            ->orderBy('products.id', 'desc')
            ->where(function ($query) use ($req) {
                return $query->where('products.product_name', 'LIKE', '%' . $req[0] . '%')
                    ->where('products.price', 'LIKE', '%' .  $req[1] . '%');
            })
            ->orWhere(function ($query) use ($req) {
                $query->where('products.product_name', 'LIKE', '%' .  $req[1] . '%')
                    ->where('products.price', 'LIKE', '%' .  $req[0] . '%');
            })
            ->select('products.product_name', 'stock_ins.quantity', 'products.price', 'products.unit', 'stock_outs.stock_out_qty', 'stock_outs.payment')
            ->get();
        return $products;
    }
}
