<?php

namespace App\Models;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['title', 'content', 'rubric_id','sort'];
    public function rubric() {
        return $this->belongsTo(Rubrics::class);
    }
    public function product_photo() {
        return $this->hasMany(Product_photo::class)->orderBy('sort', 'asc');
    }
}
