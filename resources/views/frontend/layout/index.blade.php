<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Esamachar</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('logo/logo.png')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/ticker-style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60bcd237901dfb0011a54437&product=inline-share-buttons" async="async"></script>

    @yield('facebook')
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" nonce="3goQIBSP"></script>
<!-- Preloader Start -->
<!--    <div id="preloader-active">-->
<!--        <div class="preloader d-flex align-items-center justify-content-center">-->
<!--            <div class="preloader-inner position-relative">-->
<!--                <div class="preloader-circle"></div>-->
<!--                <div class="preloader-img pere-text">-->
<!--                    <img src="assets/img/logo/logo.png" alt="">-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!-- Preloader Start -->

<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top black-bg d-none d-md-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li>
                                        <script>
                                            const timeElapsed = Date.now();
                                            const today = new Date(timeElapsed);
                                            document.write(today.toDateString())
                                        </script>
                                    </li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid d-none d-md-block">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="{{route('frontend.home')}}"><img src="{{asset('logo/logo.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner f-right ">
                                <img src="{{asset('assets/img/hero/header_card.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="{{route('frontend.home')}}"><img src="{{asset('logo/logo.png')}}" alt="" style="height: 70px;width: 100px"></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{route('frontend.home')}}">समाचार</a></li>
                                        <li><a href="#">मुख्य समाचार</a></li>
                                        <li><a href="#">वर्गीकरण</a></li>
                                        <li><a href="#">बारेमा</a></li>
                                        <li><a href="#">सम्पर्क</a></li>
                                        <!-- <li><a href="#">पृष्ठहरु</a>
                                            <ul class="submenu">
                                                <li><a href="elements.html">Element</a></li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                                <li><a href="details.html">Categori Details</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form action="#">
                                        <input type="text" placeholder="Search">

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

<main>
    @yield('content')
</main>

<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding fix">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                    <div class="single-footer-caption">
                        <div class="single-footer-caption">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="{{route('frontend.home')}}"><img src="{{asset('logo/logo.png')}}" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>
                                        तपाईंहरुको  सूचना पाउने अधिकार  , हाम्रो  प्रदान गर्ने दायित्व र कर्तव्य । देश तथा विस्वमा भएको समसामयिक विषय वस्तुको  सम्प्रेषणमा निरन्तर दत्तचित्त भएर लागीपरिरहेको छ esamchar.com nepal , न्यायिक ,निस्पक्ष ,स्वतन्त्र पत्रकारिताको धर्मलाई शिराेधार्य  गर्दै  मुलुकको आचारसंहिता , लोकतान्त्रिक विचार र विमर्श , नागरिक हक अधिकार र राष्ट्रियताप्रती आभार प्रकट गर्दै  अघि
                                        बढने छ  सूचना र सन्देसको सारथि ( esamachar.com nepal )
                                    </p>
                                </div>
                            </div>
                            <!-- social -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4  col-sm-6">
                    <div class="single-footer-caption mt-60">
                        <div class="footer-tittle">
{{--                            <h4>Newsletter</h4>--}}
{{--                            <p>Heaven fruitful doesn't over les idays appear creeping</p>--}}
{{--                            <!-- Form -->--}}
{{--                            <div class="footer-form" >--}}
{{--                                <div id="mc_embed_signup">--}}
{{--                                    <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"--}}
{{--                                          method="get" class="subscribe_form relative mail_part">--}}
{{--                                        <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"--}}
{{--                                               class="placeholder hide-on-focus" onfocus="this.placeholder = ''"--}}
{{--                                               onblur="this.placeholder = ' Email Address '">--}}
{{--                                        <div class="form-icon">--}}
{{--                                            <button type="submit" name="submit" id="newsletter-submit"--}}
{{--                                                    class="email_icon newsletter-submit button-contactForm"><img src="assets/img/logo/form-iocn.png" alt=""></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-10 info"></div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50 mt-60">
                        <div class="footer-tittle">
                            <h4>Our Facebook Page</h4>
                        </div>
                        <div class="instagram-gellay">
                            <div class="fb-page" data-href="https://www.facebook.com/Esamachar100" data-tabs="timeline" data-width="" data-height="300px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Esamachar100" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Esamachar100">E Samachar</a></blockquote></div>                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom aera -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="footer-border">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="footer-copy-right">
                            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | esamachar.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="footer-menu f-right">
                            <ul>
                                <li><a href="#">Terms of use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<!-- Date Picker -->
<script src="{{asset('assets/js/gijgo.min.js')}}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script src="{{asset('assets/js/animated.headline.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.js')}}"></script>

<!-- Breaking New Pluging -->
<script src="{{asset('assets/js/jquery.ticker.js')}}"></script>
<script src="{{asset('assets/js/site.js')}}"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.sticky.js')}}"></script>

<!-- contact js -->
<script src="{{asset('assets/js/contact.js')}}"></script>
<script src="{{asset('assets/js/jquery.form.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/mail-script.js')}}"></script>
<script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{asset('assets/js/plugins.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>