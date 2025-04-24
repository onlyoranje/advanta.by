<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_photo extends Model
{
    public function rubric() {
        return $this->belongsTo(Rubrics::class);
    }
    public function product_photo() {
        return $this->hasMany(Product_photo::class)->orderBy('sort', 'asc');
    }
}
