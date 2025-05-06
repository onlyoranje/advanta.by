<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use App\Models\ParameterRubric;
use App\Models\Product_photo;
use App\Models\Products;
use App\Models\Rubrics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
         'rubrics' => Rubrics::all(),
         'parameters' => Parameter::all(),
         'parameter_rubric'=>ParameterRubric::all()
     ];
     return view('products.add',$context);
 }
    public function addProductToDB(Request $request){
        //dd($request->file());
        $validated = $request->validate(self::PRODUCT_VALIDATOR,self::PRODUCT_ERROR_MESSAGES);
        $description = $request->content;
$sort = 0;
        $product = Products::create(['title'=>$validated['title'],'content'=>$description,'rubric_id'=>$validated['rubric_id']]);


        if ($request->file) {
            if (is_array($request->file) ) {
                foreach ($request->file as $file_upload) {
                    if (!is_null($file_upload)) {
                        $filename = $file_upload->store('products');
                        $file_name = explode('/', $filename);
                        Product_photo::create(['products_id' => $product->id, 'url' => $file_name[0].'/'.$file_name[1],'type' => $file_upload->extension(),'size' => $file_upload->getSize(),'original_name' => $file_upload->getClientOriginalName(),'sort'=>$sort++]);
                    }
                }
            } else {

                $filename = $request->store('products');
                $file_name = explode('/', $filename);
                Product_photo::create(['products_id' => $product->id, 'url' => $file_name[0].'/'.$file_name[1],'type' => $request->file->extension(),'size' =>$request->file->getSize(),'original_name' => $request->file->getClientOriginalName(),'sort'=>$sort++]);

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
 public function editProduct(Products $product)
 {
     $context = [
         'rubrics' => Rubrics::all(),
         'product' => $product,
         'images' => Product_photo::where('products_id',$product->id)->orderBy('sort')->get()

     ];

     return view('products.edit',$context);

 }
    public function updateProduct(Request $request,Products $product){

        $validated = $request->validate(self::PRODUCT_VALIDATOR,self::PRODUCT_ERROR_MESSAGES);
        $description = $request->content;
        $product->fill(['title'=>$validated['title'],'content'=>$description]);
        $product->save();
        if ($request->rubric_id) {
            $product->fill(['rubric_id'=>$request->rubric_id]);
            $product->save();
        }
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

                $filename = $request->file->store('products');
                $file_name = explode('/', $filename);
                Product_photo::create(['products_id' => $product->id, 'url' => $file_name[0].'/'.$file_name[1],'type' => $request->file->extension(),'size' => $request->file->getSize(),'original_name' => $request->file->getClientOriginalName()]);

            }}
        $files_before_edit=Product_photo::where('products_id',$product->id)->pluck('id');
        foreach ($files_before_edit as $fid){
            $fida[] = $fid;
        }
        if ($request['fileuploader-list-file']){

            $old_files = json_decode($request['fileuploader-list-file'],true);
            $old_files_=Array();
            foreach ($old_files as $old_file_array){
                if (is_numeric($old_file_array['file'])){
                    $old_file = Product_photo::find($old_file_array['file']);
                    $old_file->fill(['sort' => $old_file_array['index']]);
                    $old_file->save();
                    $old_files_[]=$old_file_array['file'];
                } else {
                    $file_name = explode('/', $old_file_array['file']);
                    $old_file = Product_photo::where('original_name',$file_name[1])->firstWhere('products_id',$product->id);
                    $old_files_[]=$old_file->id;
                    $old_file->fill(['sort' => $old_file_array['index']]);

                    $old_file->save();
                }

            }
            if (count($old_files_)>0){$for_delete = array_diff($fida,$old_files_);} else {$for_delete=$fida;}


            foreach ($for_delete as $old_file_delete )
            {

                Storage::delete($old_file_delete);
                Product_photo::destroy($old_file_delete);

            }
        }
       /* if ($request->parameter) {
            $parameters_new = [];
            $parameters_old = BbParameters::where('bb_id',$bb->id)->pluck('parameter_id')->toArray();;

            foreach ($request->parameter as $parameter_id => $value) {
                if (!is_null($value)) {
                    $parameters_new[] = $parameter_id;
                    BbParameters::updateOrCreate(['bb_id' => $bb->id, 'parameter_id' => $parameter_id], ['value' => $value]);
                }

            }

            BbParameters::where('bb_id', $bb->id)->whereIn('parameter_id', array_diff($parameters_old,$parameters_new))->delete();
        }*/


        $product->save();



        return redirect()->route('product_dashboard');
    }
    public function deleteProduct(Products $product){
        return view('products.delete', ['product'=>$product]);
    }
    public function destroyProduct(Products $product){
        $product->delete();
        return redirect()->route('product_dashboard');
    }
}
