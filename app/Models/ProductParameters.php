<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductParameters extends Model
{
    protected $fillable = ['products_id','parameter_id','value'];
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
    public function parameters(){
        return $this->belongsTo(Parameter::class,'parameter_id');
    }
}
