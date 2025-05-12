@extends('dashboard.dashboard')
@section('title',' Удаление сертификата')
@php
    $title= "Удалить сертификат ".$certificates->title;
    $id = ['certificates'=>$certificates->id];
    $route = 'certificates_destroy';
    $errors_form=[];
@endphp
@section('main')
    @include('delete_form')

@endsection
