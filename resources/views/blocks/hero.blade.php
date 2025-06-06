<!-- Start Hero Area -->
<section class="hero-area">
    <div class="verticle-lines">
        <div class="vlines one"></div>
        <div class="vlines two"></div>
        <div class="vlines three"></div>
        <div class="vlines four"></div>
    </div>
    <!-- Single Slider -->
    <div class="hero-inner">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 co-12">
                    <div class="home-slider">
                        <div class="hero-text">
                            <h5 class="wow fadeInUp" data-wow-delay=".3s"></h5>
                            <h1 class="wow fadeInUp" data-wow-delay=".5s">{{$contact->banner_title}}
                            </h1>
                            <p class="wow fadeInUp" data-wow-delay=".7s">{{$contact->banner_desc}}</p>
                            <div class="button wow fadeInUp" data-wow-delay=".9s">
                                <a href="{{$contact->banner_url}}" class="btn">{{$contact->banner_button}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="hero-image" style="background-image: url({{Storage::url('media/'.$contact->banner_img)}});">
                        <img class="shape3" src="assets/images/hero/shape3.png" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Single Slider -->
</section>
<!--/ End Hero Area -->
