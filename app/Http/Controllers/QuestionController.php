<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Qustion;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return view('question.index');
    }

    public function addquestion(Request $request)
    {

    $a = $request->key;

    if($a=='true'){
        $question = new Qustion();
        $question->save();
    }
    $questions = Qustion::get();
        return view('question.tableBody', compact('questions'));
    }

    public function create(Request $request)
    {
        Qustion::updateQuestion($request);
    }

    public function delete(Request $request)
    {
        Qustion::deleteQuestion($request);
    }
}
