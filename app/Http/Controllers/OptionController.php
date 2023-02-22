<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function addOption(Request $request)
    {
        $a = $request->id;
        $option = new Option();
        $option->question_id = $a;
        $option->save();
    }
}
