@extends('dashboard.dashboard')
@section('title',' Удаление параметра')
@section('main')
    @php
        $title= "Удалить параметр ".$parameter->name;
        $id = ['parameter'=>$parameter->id];
        $route = 'parameter_dashboard_destroy';
        $used = App\Models\ProductParameters::Where('parameter_id',$parameter->id)->pluck('products_id')->toArray();
        $errors_form = [];
        if (count($used)>0) $errors_form[] = "Данный параметр используется в ".count($used)." объявлениях  ";
    @endphp
    @include('delete_form')
@endsection
