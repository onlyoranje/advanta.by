@section('title', $title)
@section('description', $description)
@extends('base')

@section('main')
    @include("blocks.header")
    @include("blocks.breadcrumbs_overlay")

    <section id="team" class="team section">
        <div class="container">

            <div class="row">
                <!-- Single Team -->
                @if (count($products)>0)
                    @foreach($products as $product)
                        @php
                            $main_photos = \App\Models\Product_photo::where('products_id',$product->id)->orderBy('sort')->limit(1)->get();
                            if (count($main_photos)>0) $main_photo = $main_photos[0];
                        @endphp
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-team wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <!-- Image -->
                        <div class="image">
                            @if (isset($main_photo))
                                <img src="{{Storage::url($main_photo->resize(360, 360))}}" alt="{{$product->title}}">
                            @endif
                            <!-- Social -->

                            <!-- End Social -->
                        </div>
                        <!-- End Image -->
                        <div class="info-head">
                            <!-- Info Box -->
                            <div class="info-box">
                                <h4 class="name"><a href="team-single.html">{{$product->title}}</a></h4>
                                <span class="designation">{{$product->rubrics->title}}</span>
                            </div>
                            <!-- End Info Box -->
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
                    @endforeach
              @endif
            </div>
        </div>
    </section>


    @include("blocks.footer")
@endsection('main')
