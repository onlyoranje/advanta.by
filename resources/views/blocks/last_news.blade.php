<div class="latest-news-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <span class="wow fadeInDown" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">#Новости</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Новости компании</h2>
                    <h3 class="gray-bg">Новости</h3>
                    {{--<p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form.</p>--}}
                </div>
            </div>
        </div>
        <div class="row">

            @if (count($posts)>0)
                @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Single News -->
                <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                    <div class="image">
                        <img class="thumb" src="{{Storage::url($post->resizeImage($post->image,null,277))}}" alt="#">
                    </div>
                    <div class="content-body">
                        <a class="cat" href="{{route('post',$post->id)}}">{{$post->category}}</a>
                        <h4 class="title"><a href="blog-single-sidebar.html">{{$post->title}}</a></h4>
                        <p>{{$post->preview_text}}</p>
                        <div class="button">
                            <a href="{{route('post',$post->id)}}" class="btn">Читать</a>
                        </div>
                    </div>
                </div>
                <!-- End Single News -->
            </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
