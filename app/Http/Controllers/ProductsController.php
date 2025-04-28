<?php

namespace App\Http\Controllers;

use App\Models\Product_photo;
use App\Models\Products;
use App\Models\Rubrics;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private const PRODUCT_VALIDATOR = [
        'title' => 'required|max:50',

        'rubric_id' => 'required',

    ];

    private const PRODUCT_ERROR_MESSAGES = [
        'required' => 'Заполните это поле',
        'max' => 'Значение не должно быть длиннее :max символов',
        'numeric' => 'Введите число'
    ];

 public function products_db(){
     $context = [
         'products' => Products::orderBy('id','desc')->get()

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
    public function addProductToDB(Request $request){
        //dd($request);
        $validated = $request->validate(self::PRODUCT_VALIDATOR,self::PRODUCT_ERROR_MESSAGES);
        $description = $request->content;

        $product = Products::create(['title'=>$validated['title'],'content'=>$description,'rubric_id'=>$validated['rubric_id'],'sort'=>$request->sort]);


        if ($request->file) {
            if (is_array($request->file) ) {
                foreach ($request->file as $file_upload) {
                    if (!is_null($file_upload)) {
                        $filename = $file_upload->store('products');
                        $file_name = explode('/', $filename);
                        Product_photo::create(['products_id' => $product->id, 'url' => $file_name[0].'/'.$file_name[1],'type' => $file_upload->extension(),'size' => $file_upload->getSize(),'original_name' => $file_upload->getClientOriginalName()]);
                    }
                }
            } else {

                $filename = $request->store('products');
                $file_name = explode('/', $filename);
                Product_photo::create(['products_id' => $product->id, 'url' => $file_name[0].'/'.$file_name[1],'type' => $request->file->extension(),'size' =>$request->file->getSize(),'original_name' => $request->file->getClientOriginalName()]);

            }}
        /*if ($request->parameter){
            foreach ($request->parameter as $parameter_id=>$value){
                if (!is_null($value))  BbParameters::create(['bb_id' => $bb->id,'value'=>$value, 'parameter_id'=>$parameter_id]);
            }
        }*/

       /* $bbprice = BbPrice::create(['bb_id' => $bb->id, 'price_type_id'=>$validated['price_type']]);
        $price = str_replace(',','.',$request->price);
        $bbprice->fill(['price'=>$price]);
        $bbprice->save();*/

        /*if (is_array($request->contact)) {
            foreach ($request->contact as $contact_type_id=>$contact_value) {
                if ($contact_value)  BbContact::create(['value'=>$contact_value,'bb_id'=>$bb->id,'contact_type_id'=>$contact_type_id]);
            }

        }*/

        /*$bb->fill(['organization_id'=>Auth::user()->organization->id]);*/
        $product->save();


        return redirect()->route('product_dashboard');
    }
}
