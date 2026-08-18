<?php

namespace App\Http\Controllers;

use App\Models\Posts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    //
    public function posts(Request $request)
    {
        $posts=Posts::where('active','Y')->where(function($query)
        {
            global $request;
            if (isset($request->category)) $query->where('category', $request->category );
            if (isset($request->tag)) $query->where('tags', 'like', '%' .$request->tag. '%' );

        })->orderBy('id','desc')->paginate(10);
        $title = 'Статьи';
        if ($request->category) $title.='. Категория "'.$request->category.'"';
        if ($request->tag) $title.='. #'.$request->tag;
        if ($request->page>1) $title.='. Страница '.$request->page;
        return view('post.list',['posts'=>$posts,'title'=>$title]);
    }
    public function posts_dashboard(){
        $posts=Posts::orderBy('id','desc')->paginate(10);
        return view('post.dashboard',['posts'=>$posts,'title'=>'Статьи']);
    }
    public function post_add(){
        $categories = Posts::whereNotNull('category')->groupBy('category')->pluck('category');
        return view('post.add',['title'=>'Статьи','categories'=>$categories]);
    }
    public function post_add_db(Request $request){
        $trim_tag=Array();
        $tags = explode(',',$request->tags);
        foreach ($tags as $tag){
            $trim_tag[]=trim($tag);
        }
        $trim_tag = implode(',',$trim_tag);
        $post = Posts::create(['title'=>$request->title,'preview_text'=>$request->preview_text,'content'=>$request->text,'user_id'=>Auth::id(),'tags'=>$trim_tag]);
        if ($request->new_category){
            $post->fill(['category'=> $request->new_category]);
            $post->save();
        } else {
            $post->fill(['category'=> $request->category]);
            $post->save();
        }
        if ($request->file) {

            $filename = $request->file[0]->store('media');
            $file_name = explode('/', $filename);
            $post->fill(['image'=> $file_name[1]]);
            $post->save();

        }
        return redirect()->route('posts_dashboard');

    }
    public function post_dashboard(Posts $post){
        $categories = Posts::whereNotNull('category')->groupBy('category')->pluck('category');
        $title = 'Редактирование статьи '.$post->title;
        return view('post.edit',['title'=>$title,'post'=>$post,'categories'=>$categories]);
    }
    public function post(Posts $post){
        $title = $post->title;


        $breadcrumbs['list'][] = Array('route'=>'posts','title'=>'Статьи');
        $breadcrumbs['list'][] = Array('route'=>'posts','title'=>$post->category,'param'=>'?category='.$post->category);
        return view('post.detail',['title'=>$title,'post'=>$post,'breadcrumbs'=>$breadcrumbs]);
    }
    public function edit_post(Posts $post,Request $request){
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
    public function delete_post(Posts $post){
        $title = "Удалить статью ".$post->title;
        return view('post.delete',['title'=>$title,'post'=>$post]);
    }
    public function destroy_post(Posts $post){
        $post->delete();
        return redirect()->route('posts_dashboard');
    }
}
