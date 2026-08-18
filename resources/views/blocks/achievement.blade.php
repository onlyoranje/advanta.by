<section class="our-achievement section">
    <div class="container">
        <div class="row">
            @if (is_array($achievements ))
            @foreach($achievements as $achievement)
            <div class="col-lg-4 col-md-4 col-12">
                <div class="single-achievement wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <h3 class="counter">{{$achievement['title']}}</h3>
                    <p>{{$achievement['desc']}}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
