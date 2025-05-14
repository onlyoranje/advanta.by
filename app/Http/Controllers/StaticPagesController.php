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

        $url =
        $pages = StaticPages::create(['title'=>$request->title,'content'=>$request->text,'sort'=>$request->sort,'active'=>$request->active, 'url'=>$url ]);

        if ($request->img) {

            $filename = $request->img[0]->store('media');
            $file_name = explode('/', $filename);
            $pages->fill(['image'=> $file_name[1]]);
            $pages->save();

        }
        return redirect()->route('pages_dashboard');

    }
    public function post_dashboard(StaticPages $post){
        $categories = StaticPages::whereNotNull('category')->groupBy('category')->pluck('category');
        $title = 'Редактирование новости '.$post->title;
        return view('post.edit',['title'=>$title,'post'=>$post,'categories'=>$categories]);
    }
    public function post(StaticPages $post){
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
    public function edit_post(StaticPages $post,Request $request){
        $trim_tag=Array();
        $tags = explode(',',$request->tags);
        foreach ($tags as $tag){
            $trim_tag[]=trim($tag);
        }
        $trim_tag = implode(',',$trim_tag);
        $post->fill(['title'=>$request->title,'preview_text'=>$request->preview_text,'content'=>$request->text,'tags'=>$trim_tag]);
        $post->save();
        if ($request->new_category){
            $post->fill(['category'=> $request->new_category]);
            $post->save();
        } else {
            $post->fill(['category'=> $request->category]);
            $post->save();
        }
        if ($request->file) {

            $filename = $request->file->store('media');
            $file_name = explode('/', $filename);
            $post->fill(['image'=> $file_name[1]]);
            $post->save();

        }
        return redirect()->route('posts_dashboard');
    }
    public function delete_post(StaticPages $post){
        $title = "Удалить новость ".$post->title;
        return view('post.delete',['title'=>$title,'post'=>$post]);
    }
    public function destroy_post(StaticPages $post){
        $post->delete();
        return redirect()->route('posts_dashboard');
    }
}
