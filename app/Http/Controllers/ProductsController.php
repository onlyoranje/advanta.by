<?php

namespace App\Http\Controllers;

use App\Models\Product_photo;
use App\Models\Products;
use App\Models\Rubrics;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

 public function products_db(){
     $context = [
         'products' => Products::all()

     ];
     return view('products.dashboard', $context);
 }
 public function addProduct()
 {
     $context = [
         'rubrics' => Rubrics::all()

     ];
     return view('products.add',$context);
 }
}
