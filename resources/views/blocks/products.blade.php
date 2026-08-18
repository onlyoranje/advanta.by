<?php
use App\Models\Products;
$products_onmain = Products::where('on_main','Y')->limit(4)->get();
?>
<style>
/* Выравнивание высоты карточек товаров */
#team .row {
    display: flex;
    flex-wrap: wrap;
}
#team .row > [class*="col-"] {
    display: flex;
    flex-direction: column;
}
.single-team {
    flex: 1;
    display: flex;
    flex-direction: column;
    height: 100%;
}
.single-team .info-head {
    flex: 1;
    display: flex;
    flex-direction: column;
}
.single-team .info-head .info-box {
    flex: 1;
}
</style>
<section id="team" class="team section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title align-center gray-bg">
                    <span class="wow fadeInDown" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">Выпускаемая продукция</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Картриджи</h2>
                    <h3 class="gray-bg">Производство</h3>
                    <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Большое многообразие производства фильтрующих элементов</p>
                </div>
            </div>
        </div>
        <div class="row">
            @if(count($products_onmain)>0)
            @foreach($products_onmain as $product)
            @php
                            $main_photos = \App\Models\Product_photo::where('products_id',$product->id)->orderBy('sort')->limit(1)->get();
                            if (count($main_photos)>0) $main_photo = $main_photos[0];
                        @endphp
            <!-- Single Team -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-team wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <!-- Image -->
                    <div class="image">
                        <img src="{{Storage::url($main_photo->resize(false, 360))}}" alt="{{$product->title}}" style="object-fit: contain">

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
