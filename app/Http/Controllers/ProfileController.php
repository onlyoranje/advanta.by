<?php

namespace App\Http\Controllers;

use App\Models\Rubrics;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function dashboard(){

        return view('dashboard.dashboard');
    }
    public function home ()
    {
        $rubrics = Rubrics::all();
        return view('home',['rubrics'=>$rubrics]);
    }
}
