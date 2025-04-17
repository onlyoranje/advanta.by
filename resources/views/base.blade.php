<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Bold - Multipurpose Business HTML Template.</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
    <!-- Place favicon.ico in the root directory -->

    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
{{--    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />--}}
    @vite(['resources/js/app.tsx'])
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please
    <a href="https://browsehappy.com/">upgrade your browser</a> to improve
    your experience and security.
</p>
<![endif]-->

<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- /End Preloader -->

<!-- Start Header Area -->
<header class="header">
    <div class="header-inner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html"><img src="assets/images/logo/logo.png"
                                                                       alt="#"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <i class="lni lni-menu open"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link active" href="#">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#">Services</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#">Portfolio</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        Pages
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="about-us.html">About Us</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contacts</a>
                                </li>
                            </ul>
                            <div class="button">
                                <a href="contact.html" class="btn">Get it now</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header Area -->

@yield('main')

<!-- Start Footer Area -->
<footer class="footer">
    <div class="call-action">
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
    </div>
    <!-- Start Middle Top -->
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Single Widget -->
                    <div class="f-about single-footer">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/footer-logo.png" alt="Logo"></a>
                        </div>
                        <p>Start building your creative website with our awesome template Bold.</p>
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="lni lni-facebook-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer sm-custom-border f-link">
                                <h3>Pages</h3>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Our Services</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Our Blog</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer sm-custom-border f-link">
                                <h3>Product</h3>
                                <ul>
                                    <li><a href="#">Features</a></li>
                                    <li><a href="#">Pricing</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Support</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer md-custom-border sm-custom-border f-link">
                                <h3>Services</h3>
                                <ul>
                                    <li><a href="#">Digital Marketing</a></li>
                                    <li><a href="#">Content Writing</a></li>
                                    <li><a href="#">SEO for Business</a></li>
                                    <li><a href="#">UI Design</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer md-custom-border sm-custom-border f-link">
                                <h3>Legal</h3>
                                <ul>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Support Team</a></li>
                                    <li><a href="#">Return Policy</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
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
                            <p>Designed and Developed by<a href="https://graygrids.com/" rel="nofollow"
                                                           target="_blank">GrayGrids</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Middle -->
</footer>
<!--/ End Footer Area -->

<!-- ========================= scroll-top ========================= -->
<a href="#" class="scroll-top btn-hover">
    <i class="lni lni-chevron-up"></i>
</a>

<!-- ========================= JS here ========================= -->
{{--<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/count-up.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/tiny-slider.js"></script>
<script src="assets/js/glightbox.min.js"></script>
<script src="assets/js/imagesloaded.min.js"></script>
<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/main.js"></script>--}}
<script type="text/javascript">
    //========= testimonial
    tns({
        container: '.testimonial-slider',
        items: 1,
        slideBy: 'page',
        autoplay: false,
        mouseDrag: true,
        gutter: 0,
        nav: false,
        controls: true,
        controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
    });

    //========= glightbox
    GLightbox({
        'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
        'type': 'video',
        'source': 'youtube', //vimeo, youtube or local
        'width': 900,
        'autoplayVideos': true,
    });

    //============== isotope masonry js with imagesloaded
    imagesLoaded('#container', function () {
        var elem = document.querySelector('.grid');
        var iso = new Isotope(elem, {
            // options
            itemSelector: '.grid-item',
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: '.grid-item'
            }
        });

        let filterButtons = document.querySelectorAll('.portfolio-btn-wrapper button');
        filterButtons.forEach(e =>
            e.addEventListener('click', () => {

                let filterValue = event.target.getAttribute('data-filter');
                iso.arrange({
                    filter: filterValue
                });
            })
        );
    });
</script>
</body>

</html>
