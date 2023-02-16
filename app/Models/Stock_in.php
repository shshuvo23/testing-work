<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_in extends Model
{
    use HasFactory;

    private static $stockin;

    public static function addStockin($request)
    {
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $existing_stockin = Stock_in::where('product_id', $product_id)->first();

        if(!$existing_stockin){
            self::$stockin = new Stock_in();
            self::$stockin->product_id = $request->product_id;
            self::$stockin->quantity = $request->quantity;
            self::$stockin->save();
        } else{
            $existing_stockin->quantity += $quantity;
            $existing_stockin->save();
        }


    }

}
