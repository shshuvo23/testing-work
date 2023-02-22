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
        //  return $request;
        self::$product = new Product();
        self::$product->product_name = $request->product_name;
        self::$product->brand = $request->brand;
        self::$product->price = $request->price;
        self::$product->unit = $request->unit;
        self::$product->save();
    }

    public static function searchProduct($request)
    {
        // return $request->search;
        $req = explode(" ", $request->search);
        // echo count($req);
        $ln = count($req);
        if ($req) {
            for ($i = 0; $i < 3 - $ln; $i++) {
                array_push($req, "");
                // return $req;
            }
        }
        // return $req;
        // return $req;
        // foreach ([2, 1, 0] as $i) {
        //     if (!isset($req[$i])) {
        //         $req[$i] = '';
        //     }
        // }


        $products = Product::join('stock_ins', 'stock_ins.product_id', '=', 'products.id')
            ->leftjoin('stock_outs', 'stock_outs.product_id', '=', 'products.id')
            ->orderBy('products.id', 'desc')
            // ->where(function ($query) use ($req) {
            //     $query->where(function ($query) use ($req) {
            //         $query->where('products.product_name', 'LIKE', '%' . $req[0] . '%');
            //         $query->orWhere('products.price', 'LIKE', '%' . $req[0] . '%');
            //         $query->orWhere('products.unit', 'LIKE', '%' . $req[0] . '%');
            //     });
            //     $query->where(function ($query) use ($req) {
            //         $query->where('products.product_name', 'LIKE', '%' . $req[1] . '%');
            //         $query->orWhere('products.price', 'LIKE', '%' . $req[1] . '%');
            //         $query->orWhere('products.unit', 'LIKE', '%' . $req[1] . '%');
            //     });
            //     $query->where(function ($query) use ($req) {
            //         $query->where('products.product_name', 'LIKE', '%' . $req[2] . '%');
            //         $query->orWhere('products.price', 'LIKE', '%' . $req[2] . '%');
            //         $query->orWhere('products.unit', 'LIKE', '%' . $req[2] . '%');
            //     });
            // })
            ->where(function ($query) use ($req) {
                return $query->where('products.product_name', 'LIKE', '%' . $req[0] . '%')
                    ->where('products.price', 'LIKE', '%' .  $req[1] . '%')
                    ->where('products.unit', 'LIKE', '%' . $req[2] . '%');
            })
            ->orWhere(function ($query) use ($req) {
                $query->where('products.product_name', 'LIKE', '%' .  $req[0] . '%')
                    ->where('products.price', 'LIKE', '%' . $req[2] . '%')
                    ->where('products.unit', 'LIKE', '%' .  $req[1] . '%');
            })
            ->orWhere(function ($query) use ($req) {
                $query->where('products.product_name', 'LIKE', '%' .  $req[1] . '%')
                    ->where('products.price', 'LIKE', '%' . $req[0] . '%')
                    ->where('products.unit', 'LIKE', '%' .  $req[2] . '%');
            })
            ->orWhere(function ($query) use ($req) {
                $query->where('products.product_name', 'LIKE', '%' .  $req[1] . '%')
                    ->where('products.price', 'LIKE', '%' . $req[2] . '%')
                    ->where('products.unit', 'LIKE', '%' .  $req[0] . '%');
            })
            ->orWhere(function ($query) use ($req) {
                $query->where('products.product_name', 'LIKE', '%' .  $req[2] . '%')
                    ->where('products.price', 'LIKE', '%' . $req[0] . '%')
                    ->where('products.unit', 'LIKE', '%' .  $req[1] . '%');
            })
            ->orWhere(function ($query) use ($req) {
                $query->where('products.product_name', 'LIKE', '%' .  $req[2] . '%')
                    ->where('products.price', 'LIKE', '%' . $req[1] . '%')
                    ->where('products.unit', 'LIKE', '%' .  $req[0] . '%');
            })
            ->select('products.id', 'products.product_name', 'stock_ins.quantity', 'products.price', 'products.unit', 'stock_outs.stock_out_qty', 'stock_outs.payment')
            ->get();
        return $products;
    }

    public static function updateproduct($request)
    {
        self::$product =Product::find($request->id);
        self::$product->product_name = $request->product_name;
        self::$product->brand = $request->brand;
        self::$product->price = $request->price;
        self::$product->unit = $request->unit;
        self::$product->update();

    }
}
