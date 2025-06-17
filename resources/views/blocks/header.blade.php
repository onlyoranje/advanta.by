<?php

use App\Models\Contacts;

$contact = Contacts::first();
$phones = unserialize($contact->phones);
?>
    <!-- Start Header Area -->
<header class="header">
    <div class="header-inner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="/"><img src="{{Storage::url('media/'.$contact->logo)}}"                                                              alt="#"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <i class="lni lni-menu open"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link active" href="/">Главная</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        О нас
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @php($about_menu = \App\Models\StaticPages::orderBy('sort')->orderBy('title')->get())
                                        @if (count($about_menu)>0)
                                            @foreach ($about_menu as $about)
                                                <li><a class=dropdown-item'
                                                       href='{{route('static_page',$about->url)}}'> {{$about->title}}</a>
                                                </li>

                                            @endforeach
                                        @endif

                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{route('certificates')}}">Сертификаты</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{route('medias')}}">Фото и видео</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        Продукция
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @php($rubrics_menu = \App\Models\Rubrics::orderBy('sort')->orderBy('title')->get()->toTree())
                                        @if (count($rubrics_menu)>0)
                                                <?
                                                $traverse = function ($rubrics_menu, $prefix = '-') use (&$traverse) {
                                                    foreach ($rubrics_menu as $rubric) {
                                                        echo '<li><a  class=dropdown-item';
                                                        echo "  href='" . route('rubric', $rubric->id) . "'";
                                                        echo ">" . PHP_EOL . $prefix . ' ' . $rubric->title . "</a></li>";

                                                        $traverse($rubric->children, $prefix . '-');
                                                    }
                                                };

                                                $traverse($rubrics_menu);
                                                ?>
                                        @endif

                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{route('posts')}}">Новости</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('contacts')}}">Контакты</a>
                                </li>
                            </ul>
                            <div class="button">
                                <a href="contact.html" class="btn">{{$phones[0]}}</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header Area -->
