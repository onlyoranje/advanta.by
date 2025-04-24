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
    public function addRubricToDB(Request $request){
        //dd($request);
        $validated = $request->validate(self::BB_VALIDATOR,self::BB_ERROR_MESSAGES);
        $description = $request->description;

        $bb = Products::create(['title'=>$validated['title'],'content'=>$description,'rubric_id'=>$validated['rubric_id']]);
        if ($request->file) {
            if (is_array($request->file) ) {
                foreach ($request->file as $file_upload) {
                    if (!is_null($file_upload)) {
                        $filename = $file_upload->store('public/products');
                        $file_name = explode('/', $filename);
                        UserFile::create(['product_id' => $bb->id, 'url' => $file_name[1].'/'.$file_name[2],'type' => $file_upload->extension(),'size' => $file_upload->getSize(),'original_name' => $file_upload->getClientOriginalName()]);
                    }
                }
            } else {

                $filename = $request->file->store('public/products');
                $file_name = explode('/', $filename);
                UserFile::create(['product_id' => $bb->id, 'url' => $file_name[1].'/'.$file_name[2],'type' => $request->file->extension(),'size' => $request->file->getSize(),'original_name' => $request->file->getClientOriginalName()]);

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
        $bb->save();


        return redirect()->route('product_dashboard');
    }
}
