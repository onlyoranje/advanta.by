@section('title', $title)
{{--@section('description', $description)--}}
@extends('base')

@section('main')
    @include("blocks.header")
<div class="breadcrumbs breadcrumbs-page overlay" style="background-image: url({{Storage::url('media/'.$page->image)}});">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">{{$page->title}}</h1>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="/">Главная</a></li>
                    <li>{{$page->title}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

    <section class="why-choose section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">

                        <h3 class="overlay-text gray-bg">{{$page->title}}</h3>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                {!! $page->content !!}
            </div>
        </div>
    </section>

    @include("blocks.footer")
@endsection('main')
