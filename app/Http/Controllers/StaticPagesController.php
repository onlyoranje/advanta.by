<?php

namespace App\Http\Controllers;

use App\Models\StaticPages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StaticPagesController extends Controller
{
    public function pages(Request $request)
    {
        $pages=StaticPages::where('active','Y')->get();

        $title = 'Новости';

        if ($request->page>1) $title.='. Страница '.$request->page;
        return view('pages.list',['pages'=>$pages,'title'=>$title]);
    }
    public function pages_dashboard(){
        $pages=StaticPages::orderBy('id','desc')->paginate(10);
        return view('pages.dashboard',['pages'=>$pages,'title'=>'Новости']);
    }
    public function pages_add(){

        return view('pages.add',['title'=>'Новости']);
    }
    public function pages_add_db(Request $request){
        $active = 'N';
        if ($request->active=='Y') $active = 'Y';
        $pages = StaticPages::create(['title'=>$request->title,'content'=>$request->text,'sort'=>$request->sort,'active'=>$active, 'url'=>$request->url ]);

        if ($request->img) {

            $filename = $request->img->store('media');
            $file_name = explode('/', $filename);
            $pages->fill(['image'=> $file_name[1]]);
            $pages->save();

        }
        return redirect()->route('pages_dashboard');

    }
    public function pages_edit(StaticPages $pages){

        $title = 'Редактирование страницы '.$pages->title;
        return view('pages.edit',['title'=>$title,'page'=>$pages]);
    }
    public function post(StaticPages $pages){
        $title = $post->title;
        /* //$stat = PostStatistic::updateOrCreate(['post_id'=>$post->id,'user_token'=> Session::getId()]);
         if ($stat->updated_at < date('Y-m-d H:i:s',strtotime('-1 day')) and $stat->user_token==Session::getId())
      /* {
             $stat->fill(['views'=>$stat->views+1]);
             $stat->save();
         }
         elseif ($stat->user_token!=Session::getId())
         {
             $stat->fill(['views'=>1]);
             $stat->save();
         }*/
        $breadcrumbs['list'][] = Array('route'=>'posts','title'=>'Новости');
        $breadcrumbs['list'][] = Array('route'=>'posts','title'=>$post->category,'param'=>'?category='.$post->category);
        return view('post.detail',['title'=>$title,'post'=>$post,'breadcrumbs'=>$breadcrumbs]);
    }
    public function pages_update(StaticPages $pages,Request $request){

        $active = 'N';
        if ($request->active=='Y') $active = 'Y';
        $pages->fill(['title'=>$request->title,'content'=>$request->text,'sort'=>$request->sort,'active'=>$active, 'url'=>$request->url ]);
        $pages->save();

        if ($request->img) {

            $filename = $request->img->store('media');
            $file_name = explode('/', $filename);
            $pages->fill(['image'=> $file_name[1]]);
            $pages->save();

        }
        return redirect()->route('pages_dashboard');
    }
    public function pages_delete(StaticPages $pages){
        $title = "Удалить новость ".$post->title;
        return view('post.delete',['title'=>$title,'post'=>$post]);
    }
    public function pages_destroy(StaticPages $pages){
        $post->delete();
        return redirect()->route('posts_dashboard');
    }
}
