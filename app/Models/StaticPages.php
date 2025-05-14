<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class StaticPages extends Model
{
    use HasFactory;
    protected $fillable=['title','content', 'image','url','sort','active','original_name'];

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
            $image->resize($w, $h);
            $image->save(Storage::path('/media/').'thumbnails/'.$w.'x'.$h.'/'.$url);

        }
        return 'media/thumbnails/'.$w.'x'.$h.'/'.$url;
    }

}
