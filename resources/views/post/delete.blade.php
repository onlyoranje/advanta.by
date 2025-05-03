@extends('dashboard.dashboard')
@section('title',' Удаление новости')
@php
    $title= "Удалить статью ".$post->title;
    $id = ['post'=>$post->id];
    $route = 'destroy_post';
    $errors_form=[];
    @endphp
@section('main')
    @include('delete_form')

@endsection
