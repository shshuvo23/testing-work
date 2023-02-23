<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qustion extends Model
{
    use HasFactory;

    private static $question;

    public static function updateQuestion($request)
    {
        self::$question = Qustion::find($request->id);
        self::$question->question = $request->question;
        self::$question->update();
    }
    public static function deleteQuestion($request)
    {
        self::$question = Qustion::find($request->id);
        if(self::$question)
        self::$question->delete();
    }
}
