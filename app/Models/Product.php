<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product;

    public static function addProduct($request)
    {
        self::$product = new Product();
        self::$product->product_name = $request->product_name;
        self::$product->price = $request->price;
        self::$product->unit = $request->unit;
        self::$product->save();
    }

    
}
