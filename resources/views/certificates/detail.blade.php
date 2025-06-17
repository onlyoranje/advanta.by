@section('title', $certificate->title)
{{--@section('description', $description)--}}
@extends('base')

@section('main')
    @include("blocks.header")
    <div class="breadcrumbs breadcrumbs-page overlay" style="background-image: url({{Storage::url('certificates/'.$certificate->url)}});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{$certificate->title}}</h1>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Главная</a></li>
                        <li><a href="{{route('certificates')}}">Сертификаты</a></li>
                        <li>{{$certificate->title}}</li>
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

                        <h3 class="overlay-text gray-bg">{{$certificate->title}}</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-12 align-self-center">
<img class="rounded mx-auto d-block" src="{{Storage::url('certificates/'.$certificate->url)}}">
                </div>

                <div class="col-4 mt-4" style="text-align: center">
                    <a href="{{route('certificates')}}">К списку</a>

                </div>
            </div>

        </div>
    </section>

    @include("blocks.footer")
@endsection('main')
