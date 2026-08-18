@section('title', $title)
@section('description', $description)
@extends('base')

@section('main')
    @include("blocks.header")
    @include("blocks.breadcrumbs_overlay")

    <div class="portfolio-details section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="content">
                        <div class="thumb">
                            <div class="product-images">
                            <main id="gallery">
                                <div id="carouselExampleIndicators" class="carousel  /*carousel-dark*/ slide "  data-bs-interval="false">

                                    <div class="carousel-inner main-img" {{--style="height: 480px"--}}>
                                        @foreach($product->product_photo as $key=>$image)
                                            <div class="carousel-item @if ($key==0) active @endif ratio ratio-16x9"
                                            >

                                                <img src="{{ Storage::url($image->resize(null, 800, function ($constraint) { $constraint->aspectRatio();})) }}" class="" alt="{{ $title }}" style="object-fit: contain" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            </div>
                                        @endforeach
                                        <span class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </span>
                                        <span class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </span>
                                    </div>

                                    @if (count($product->product_photo)>0)
                                        <div class="images mt-3">
                                            @foreach($product->product_photo as $key=>$image)
                                                <img  src="{{ Storage::url($image->resize(false, 120, function ($constraint) { $constraint->aspectRatio();})) }}" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" id="carousel-thumb-{{$key}}"
                                                      @if ($key==0)
                                                          aria-current="true" class=" carousel-thumbs"
                                                      @else
                                                          class="carousel-thumbs"
                                                      @endif
                                                      aria-label="1"  style="object-fit: contain">
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </main>
                        </div>
                        </div>
                        <h3>Описание </h3>

                        <p>{{$product->content}}</p>



                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="pf-details-sidebar">
                        <h4>Технические характеристики</h4>
                        <ul>
                            <li><span>Категория: </span><a href="{{route('rubric',$product->rubrics->id)}}">{{$product->rubrics->title}}</a></li>
                            @if (count($product->parameters)>0)
                                @foreach($product->parameters as $parameter)
                                    <li><span>{{$parameter->parameters->name}}</span>: {{$parameter->value}}</li>

                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>


@include("blocks.footer")
@endsection('main')
