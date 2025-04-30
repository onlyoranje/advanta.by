@extends('dashboard.dashboard')
@section('title',' Удаление продукта')
@section('main')
    @php
        $title= "Удалить  ".$product->title;
        $id = ['product'=>$product->id];
        $route = 'product_destroy';

        $errors_form=[];

    @endphp
    @include('delete_form')
@endsection
