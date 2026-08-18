<?php

use App\Models\Contacts;

$contact = Contacts::first();
$phones = unserialize($contact->phones);
?>
<!-- Start Footer Area -->
<footer class="footer">
<!--    <div class="call-action">
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-8 col-12">
                        <h2>Ready to launch your next project?</h2>
                        <p>With lots of unique blocks, you can easily build a page without<br> coding. Build your
                            next landing page.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="button">
                            <a href="#" class="btn">Get started on a project</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Start Middle Top -->
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">

                    <div class="f-about single-footer">
                        <div class="logo">
                            <a href="index.html"><img src="{{Storage::url('media/'.$contact->logo)}}" alt="Advanta"></a>
                        </div>
                        <p>Превращаем воду в совершенство</p>
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="lni lni-facebook-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="row">
                                                <div class="col-lg-4 col-md-6 col-12">

                            <div class="single-footer sm-custom-border f-link">
                                <h3>Продукция</h3>
                                <ul>
                                @php($rubrics_menu = \App\Models\Rubrics::orderBy('sort')->orderBy('title')->get()->toTree())
                                        @if (count($rubrics_menu)>0)
                                                <?php
                                                $traverse = function ($rubrics_menu, $prefix = '-') use (&$traverse) {
                                                    foreach ($rubrics_menu as $rubric) {
                                                        echo '<li><a ';
                                                        echo "  href='" . route('rubric', $rubric->id) . "'";
                                                        echo ">" . PHP_EOL . $prefix . ' ' . $rubric->title . "</a></li>";

                                                        $traverse($rubric->children, $prefix . '-');
                                                    }
                                                };

                                                $traverse($rubrics_menu);
                                                ?>
                                        @endif



                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6 col-12">

                            <div class="single-footer md-custom-border sm-custom-border f-link">
                                <h3>Полезное</h3>
                                <ul>
                                    <li><a href="{{route('medias')}}">Фото и видео</a></li>
                                    <li><a href="{{route('certificates')}}">Сертификаты</a></li>
                                    <li><a href="{{route('posts')}}">Статьи</a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6 col-12">

                            <div class="single-footer md-custom-border sm-custom-border f-link">
                                <h3> </h3>
                                <ul>
                                    <li>Общество с ограниченной ответственностью «Адванта Технолоджи»</li>
                                    <li>Республика Беларусь, г. Брест, Красногвардейская улица, 114Б/5</li>
                                    <li>+375 33 612-44-04</li>
                                    <li>advanta_system@mail.ru</li>


                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Footer Middle -->
    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-12">
                        <div class="left">
                            <p>Общество с ограниченной ответственностью «Адванта Технолоджи»
УНП 291859037</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Middle -->
</footer>
<!--/ End Footer Area -->
<a href="#" class="scroll-top btn-hover">
    <i class="lni lni-chevron-up"></i>
</a>
