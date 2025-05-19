@section('title', $title)
@extends('base')

@section('main')
    @include("blocks.header")
    @include("blocks.breadcrumbs_overlay")

    @include("blocks.footer")
@endsection('main')
