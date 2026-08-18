<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $contacts = Contacts::first();
        $products_onmain = Products::where('on_main','Y')->limit(4)->get();

        return view('home',['contacts'=>$contacts,'products_onmain'=>$products_onmain]);
    }
}
