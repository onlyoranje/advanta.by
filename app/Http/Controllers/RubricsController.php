<?php

namespace App\Http\Controllers;
use App\Models\Rubrics;
use Illuminate\Http\Request;

class RubricsController extends Controller
{
    public function rubrics(){

        $rubrics = Rubrics::orderBy('sort')->orderBy('title')->get()->toTree();
        return view('rubric.dashboard',compact('rubrics'));

    }
}
