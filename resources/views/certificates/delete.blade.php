@extends('dashboard.dashboard')
@section('title',' Удаление файла')
@php
    $title= "Удалить файл".$media->title;
    $id = ['media'=>$media->id];
    $route = 'media_destroy';
    $errors_form=[];
@endphp
@section('main')
    @include('delete_form')

@endsection
