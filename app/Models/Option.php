<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    private static $option;

    public static function updateOption($request)
    {
      self::$option = Option::find($request->id);
      self::$option->option = $request->option;
      self::$option->update();
    }

    public static function deleteOption($request)
    {
        self::$option = Option::find($request->id);
        if(self::$option)self::$option->delete();
    }
}
