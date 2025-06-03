<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Posts;
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
        $contacts = Contacts::first();
        $posts= Posts::orderBy('created_at','desc')->limit(3)->get();
        return view('home',['rubrics'=>$rubrics,'contact'=>$contacts,'posts'=>$posts]);
    }
}
