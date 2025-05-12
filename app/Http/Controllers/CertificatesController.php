<?php

namespace App\Http\Controllers;

use App\Models\Certificates;
use Illuminate\Http\Request;

class CertificatesController extends Controller
{
    public function certificates_dashboard(){
        $certificates=Certificates::orderBy('id','desc')->paginate(10);
        return view('certificates.dashboard',['certificates'=>$certificates,'title'=>'Фото и видео']);
    }
    public function certificates_add(){

        return view('certificates.add');
    }
    public function certificates_add_db(Request $request){
        if ($request->certificates) {

            $filename = $request->certificates->store('certificates');
            $file_name = explode('/', $filename);
            Certificates::create(['title'=>$request->title,'sort'=>$request->sort,'url'=> $file_name[1],'type'=> $request->certificates->getMimeType(),'size' =>$request->certificates->getSize()]);
        }
        return redirect()->route('certificates_dashboard');
    }
    public function certificates_edit(Certificates $certificates){

        return view('certificates.edit',['certificates'=>$certificates]);
    }

    public function certificates_update(Certificates $certificates,Request $request)
    {
        $certificates->update(['title'=>$request->title,'sort'=>$request->sort]);


        if (isset($request->certificates1)){
            $filename = $request->certificates1->store('certificates');
            $file_name = explode('/', $filename);
            $certificates->fill(['url'=> $file_name[1],'type'=> $request->certificates1->getMimeType(),'size' =>$request->certificates1->getSize()]);
            $certificates->save();
        }
        return redirect()->route('certificates_dashboard');
    }
    public function certificates_delete(Certificates $certificates){
        $title = "Удалить файл ".$certificates->title;
        return view('certificates.delete',['title'=>$title,'certificates'=>$certificates]);
    }
    public function certificates_destroy(Certificates $certificates){
        $certificates->delete();
        return redirect()->route('certificates_dashboard');
    }
}
