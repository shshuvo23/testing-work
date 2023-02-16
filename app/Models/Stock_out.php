<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class Stock_out extends Model
{
    use HasFactory;
    private static $stockout;

    public static function addStockout($request)
    {
        $product_id = $request->product_id;
        $quantity = $request->stock_out_qty;

        $existing_stockout = Stock_out::where('product_id', $product_id)->first();
        if ($existing_stockout) {
            $existing_stockout->stock_out_qty += $quantity;
            $existing_stockout->save();
        } else {
            self::$stockout = new Stock_out();
            self::$stockout->product_id = $product_id;
            self::$stockout->stock_out_qty = $quantity;
            self::$stockout->save();
        }


        $stock_in = Stock_in::where('product_id', $product_id)->first();
        if ($stock_in) {
            $total_quantity = $stock_in->quantity - $quantity;
            if ($total_quantity < 0) {
                throw new Exception("Insufficient stock for product ID $product_id");
            }
            $stock_in->quantity = $total_quantity;
            $stock_in->save();
        } else {
            throw new Exception("Product ID $product_id not found in stock_in table");
        }
    }

}
