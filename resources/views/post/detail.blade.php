@section('title', $title)
{{--@section('description', $description)--}}
@extends('base')

@section('main')
    @include("blocks.header")
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{$post->title}}</h1>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Главная</a></li>
                        <li><a href="{{route('posts')}}">Новости</a></li>
                        <li>{{$post->title}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="section blog-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="single-inner">
                        <div class="post-thumbnils">
                            <img src="{{Storage::url($post->resizeImage($post->image,640,480))}}" alt="#">
                        </div>
                        <div class="post-details">
                            <div class="detail-inner">
                                <!-- post meta -->
                                <ul class="custom-flex post-meta">
                                    <li>
                                        <a href="#">
                                            <i class="lni lni-calendar"></i>
                                            {{date('d.m.Y',strtotime($post->created_at))}}
                                        </a>
                                    </li>
                                {!! $post->content !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
