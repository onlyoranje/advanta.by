<?php

namespace App\Http\Controllers;

use App\Models\Medias;
use Illuminate\Http\Request;

class MediasController extends Controller
{
    public function medias_dashboard(){
        $medias=Medias::orderBy('id','desc')->paginate(10);
        return view('media.dashboard',['medias'=>$medias,'title'=>'Фото и видео']);
    }
    public function media_add(){

        return view('media.add');
    }
    public function media_add_db(Request $request){
         if ($request->media) {

            $filename = $request->media->store('media');
            $file_name = explode('/', $filename);
            Medias::create(['title'=>$request->title,'content'=>$request->text,'sort'=>$request->sort,'url'=> $file_name[1],'type'=> $request->media->getMimeType(),'size' =>$request->media->getSize()]);
        }
        return redirect()->route('medias_dashboard');
    }
    public function media_edit(Medias $media){

        return view('media.edit',['media'=>$media]);
    }

    public function media_update(Medias $media,Request $request)
    {
        $media->update(['title'=>$request->title,'content'=>$request->text,'sort'=>$request->sort]);


        if (isset($request->media1)){
            $filename = $request->media1->store('media');
            $file_name = explode('/', $filename);
            $media->fill(['url'=> $file_name[1],'type'=> $request->media1->getMimeType(),'size' =>$request->media1->getSize()]);
            $media->save();
        }
        return redirect()->route('medias_dashboard');
    }
    public function media_delete(Medias $media){
        $title = "Удалить файл ".$media->title;
        return view('media.delete',['title'=>$title,'media'=>$media]);
    }
    public function media_destroy(Medias $media){
        $media->delete();
        return redirect()->route('medias_dashboard');
    }
    public function medias(Request $request)
    {
        $medias= Medias::orderBy('sort','asc')->paginate(10);
        $title = 'Фото и видео';
        if ($request->category) $title.='. Категория "'.$request->category.'"';
        if ($request->tag) $title.='. #'.$request->tag;
        if ($request->page>1) $title.='. Страница '.$request->page;
        return view('media.list',['medias'=>$medias,'title'=>$title]);
    }
}
