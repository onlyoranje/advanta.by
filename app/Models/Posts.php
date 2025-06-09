<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManager;

class Posts extends Model
{
    use HasFactory;
    protected $fillable=['title','content', 'image','preview_text','category','tags'];
    public function poststatistic(){
        return $this->hasMany(PostStatistic::class);
    }
    public function resizeImage($url,$w,$h)
    {
        $size = getimagesize(Storage::path('/media/').$url);
        $w_orig = $size[0];
        $h_orig = $size[1];
        $pr = $w_orig/$h_orig;
        if (!$w and $h){
            $w = ceil($h*$pr);
        }
        if ($w and !$h){
            $h = ceil($w/$pr);
        }

        if (!file_exists(Storage::path('/media/').'thumbnails/'.$w.'x'.$h.'/'.$url)){
            $save_path= Storage::path('/media/').'thumbnails/'.$w.'x'.$h.'/';
            if (!file_exists($save_path)) {
                mkdir($save_path, 755, true);
            }
            $image = ImageManager::imagick()->read(Storage::path('/media/').$url);

// resize to 300 x 200 pixel
            $image->coverDown($w, $h);
            $image->save(Storage::path('/media/').'thumbnails/'.$w.'x'.$h.'/'.$url)
            //$thumbnail = Image::make(Storage::path('/public/').$this->$url);
            /*$thumbnail = Image::make(Storage::path('/public/').$url);
            $thumbnail->fit($w, $h);
            $thumbnail->save(Storage::path('/public/').'thumbnails/'.$w.'x'.$h.'/'.$url)*/;
        }
        return 'media/thumbnails/'.$w.'x'.$h.'/'.$url;
    }
    public function count_views(){
        $views = PostStatistic::where('post_id',$this->id)->sum('views');
        return $views;
    }
}
