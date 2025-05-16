@extends('dashboard.dashboard')
@section('title',$title)
@php

    $id = ['pages'=>$page->id];
    $route = 'pages_destroy';
    $errors_form=[];
    @endphp
@section('main')
    @include('delete_form')

@endsection
