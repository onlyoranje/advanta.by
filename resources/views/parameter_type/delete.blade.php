@extends('dashboard.dashboard')
@section('title',' Удаление типа параметра')
@php
    $title= "Удалить тип ".$type->type_name;
    $id = ['type'=>$type->id];
    $route = 'parameter_type_destroy';
    $errors_form=[];
@endphp
@section('main')
    @include('delete_form')

@endsection

