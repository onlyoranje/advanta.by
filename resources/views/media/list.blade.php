@extends('base')
@section('title', $title)
@section('main')
    @include("blocks.header")
    @include("blocks.menu")

    <section class="section latest-news-area blog-list">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5"><h1>{{$title}}</h1></div>
                <div class="col-12">
                    @if (count($medias)>0)

                        <div class="row">
                            @foreach($medias as $media)
                                <div class="col-lg-4 col-12">
                                    <!-- Single News -->
                                    <div class="single-news wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <div class="image">
                                            <a href="{{route('media',$media->id)}}">
                                                @if (isset($media->url))
                                                    <img class="thumb" src="{{Storage::url($media->resizeImage($media->url,480,480))}}" alt="{{ $media->title }}">
                                                @else
                                                    <img src="/storage/test/image.jpg" alt="{{ $media->title }}">

                                                @endif
                                            </a>
                                        </div>
                                        <div class="content-body">
                                            <h4 class="title"><a href="{{route('media',$media->id)}}">{{$media->title}}</a></h4>
                                            <p>{{$media->preview_text}}</p>

                                        </div>
                                    </div>
                                    <!-- End Single News -->
                                </div>
                            @endforeach
                        </div>
                        <!-- Pagination -->
                        <div class="col-12">
                            <!-- Pagination -->
                            {{ $medias->onEachSide(1)->appends(request()->input())->links() }}
                            <!--/ End Pagination -->
                        </div>
                    @endif
                    <!--/ End Pagination -->
                </div>


            </div>
        </div>
    </section>
    @include("blocks.footer")
@endsection

