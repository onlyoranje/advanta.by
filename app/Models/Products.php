<?php

namespace App\Models;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['title', 'content', 'rubrics_id','sort','on_main'];
    public function rubrics() {
        return $this->belongsTo(Rubrics::class);
    }
    public function product_photo() {
        return $this->hasMany(Product_photo::class)->orderBy('sort', 'asc');
    }
    public function parameters()
    {
        return $this->hasMany(ProductParameters::class,'products_id');
    }
    public function getProductParameter($parameter_id){
        $result = ProductParameters::where('products_id',$this->id)->where('parameter_id',$parameter_id)->limit(1)->get();
        if (isset($result[0])) return $result[0]->value;
    }

}
