<section class="features style2 section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <span class="wow fadeInDown" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">Наши возможности</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">У нас есть основные возможности для производства</h2>
                    {{--<p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form.</p>--}}
                    <h3 class="overlay-text">Наши возможности</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach(unserialize($contact->features )as $feature)
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Feature -->
                <div class="single-feature wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <i class="lni lni-comments-alt"></i>
                    <h3><a href="#">Communication</a></h3>
                    <p>Duis autem vel eum iriure dolor in hendrerit in vul esse molestie consequat vel illum.</p>
                </div>
                <!-- End Single Feature -->
                @endforeach
            </div>

        </div>
    </div>
</section>
