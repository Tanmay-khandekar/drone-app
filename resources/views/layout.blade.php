<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DronConnect</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png')}}">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Owl Carousel  main css -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ asset('css/core.css') }}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ asset('css/shortcode/shortcodes.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- User style -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">


    <!-- Modernizr JS -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <style>
        .login__register__menu li.active a {
            color: #ffffff !important;
        }
        .login__register__menu li.active{
            border-radius: 10px;
            background-color: #3c7fb6;
        }
        .header-right{
            top: 45px;
            align-items: center;
            background: #ffffff none repeat scroll 0 0;
            color: #3c7fb6 !important;
            display: flex !important;
            font-weight: 700 !important;
            height: 45px !important;
            text-transform: uppercase !important;
            transition: all 0.4s ease 0s;
            padding: 0 13px;
            border-radius: 10px;
        }
        .scroll-header .header-right {
            top: 10px
        }
        @media (min-width: 767px) {
            .slider__inner h1{
                font-size: 40px;
            }
            .banner-title{
                position: relative;
                top: -200px;
            }
        }
    </style>
    <style>
    .header-right {
        top: 45px;
        align-items: center;
        background: #ffffff none repeat scroll 0 0;
        color: #3c7fb6 !important;
        display: flex !important;
        font-weight: 700 !important;
        height: 45px !important;
        text-transform: uppercase !important;
        transition: all 0.4s ease 0s;
        padding: 0 13px;
        border-radius: 10px;
    }

    .scroll-header .header-right {
        top: 10px
    }

    .htc__testimonial__area .section__title p {
        margin-bottom: unset !important;
    }

    .fact__count span.count {
        z-index: 5;
        position: relative;
    }

    .fact__title h2 {
        z-index: 5;
        position: relative;
    }

    @media (min-width: 767px) {
        .htc__offer__thumb {
            width: 50%;
        }

        .htc__offer__thumb2 {
            left: 0 !important;
            max-width: 50% !important;
        }

        .htc__offer__thumb img {
            height: 360px;
            width: 100%;
        }

        .float-right-desktop {
            float: right;
        }
    }

    @media (max-width: 767px) {
        .htc__mission__area2 {
            display: flex;
            flex-direction: column-reverse;
        }
    }
</style>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <div id="header" class="htc-header">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header" style="background-color: #1e1e2d;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-6 col-xs-7">
                            <div class="logo">
                                <a href="/">
                                    <img src="assets/media/logos/logo3.png" style="height: 62px; width:150x;" alt="logo image">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-5">
                            <nav class="main__menu__nav  hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li><a href="/">HOME</a></li>
                                    <li><a href="how-it-works">How it works</a></li>
                                    <li><a href="javascript:void(0)">Browse Pilots</a></li>
                                    <li><a href="#">Shop</a></li>
                                    <li><a href="blog">BLOG</a></li>
                                    <li><a href="about">About Us</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="index">Home</a></li>
                                        <li><a href="how-it-works">How it works</a></li> 
                                        <li><a href="#">Browse Pilots</a></li> 
                                        <li><a href="javascript:void(0)">Shop</a></li>
                                        <li><a href="blog">BLOG</a></li>
                                        <li><a href="about">About Us</a></li>
                                        @guest
                                            <li><a href="{{ route('login') }}">Login / Join us</a></li>
                                        @else
                                            <li><a href="{{ url('dashboard') }}">{{ Auth::user()->first_name }}</a></li>
                                        @endguest   
                                    </ul>
                                </nav>
                            </div> 
                        </div>
                        <div class="col-md-2 col-sm-6 hidden-xs">
                            <div class="main__menu__nav  hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    @guest
                                        <li><a href="{{ route('login') }}" class="header-right">Login / Join us</a></li>
                                    @else
                                        <li><a href="{{ url('dashboard') }}" class="header-right">{{ Auth::user()->first_name }}</a></li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </div>
        <!-- End Header Style -->
        @yield('content')
        <!-- Start Footer Area -->
        <footer class="htc__footer__area">
            <div class="footer__top ptb--130" data--1f2d30__overlay="9.5" style="background: rgba(0, 0, 0, 0) url(images/drone-bg/4.jpg) no-repeat fixed center center / cover ;">
                <div class="container">
                    <div class="row">
                        <div class="htc__footer__wrap clearfix">
                            <!-- Start Single Footer -->
                            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                <div class="footer foo">
                                    <div class="footer__widget">
                                        <h2 class="ft__title">ABOUT</h2>
                                    </div>
                                    <div class="ft__details">
                                        <p>We are helping businesses to connect with highly skilled UAV (Drones) operators in Europe. </p>
                                        <a href="about.html" class="htc__btn--transparent" style="padding: 0 10px; margin: 0; height: 35px; line-height: 35px;">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Footer -->
                            <!-- Start Single Footer -->
                            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 xmt-40">
                                <div class="footer quick__link foo">
                                    <div class="footer__widget">
                                        <h2 class="ft__title">QUICK LINKS</h2>
                                    </div>
                                    <div class="footer__link">
                                        <ul class="ft__menu">
                                            <li><a href="/">Home</a></li>
                                            <li><a href="how-it-works">How it works</a></li>
                                            <li><a href="javascript:void(0)">Browse Pilots</a></li>
                                        </ul>
                                        <ul class="ft__menu">
                                            <li><a href="javascript:void(0)">Shop</a></li>
                                            <li><a href="blog">BLOG</a></li>
                                            <li><a href="about">About Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Footer -->
                            <!-- Start Single Footer -->
                            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 smt-40 xmt-40">
                                <div class="footer foo">
                                    <div class="footer__widget">
                                        <h2 class="ft__title">INSTAGRAM</h2>
                                    </div>
                                    <ul class="footer__instagram">
                                        <li><a href="#"><img src="images/blog/sm-img/1.jpg" alt="images"></a></li>
                                        <li><a href="#"><img src="images/blog/sm-img/2.jpg" alt="images"></a></li>
                                        <li><a href="#"><img src="images/blog/sm-img/3.jpg" alt="images"></a></li>
                                        <li><a href="#"><img src="images/blog/sm-img/4.jpg" alt="images"></a></li>
                                        <li><a href="#"><img src="images/blog/sm-img/5.jpg" alt="images"></a></li>
                                        <li><a href="#"><img src="images/blog/sm-img/6.jpg" alt="images"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Footer -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright bg__theme">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="copyright__inner">
                                <p>Copyright <a href="#" target="_blank">Drone Connect</a>
                                All Rights Reserved 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="{{ asset('js/vendor/jquery-1.12.0.min.js') }}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!-- Waypoints.min.js. -->
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
    $(document).ready(function(){
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    });
</script>
<style>
        .header-right{
            top: 45px;
            align-items: center;
            background: #ffffff none repeat scroll 0 0;
            color: #3c7fb6 !important;
            display: flex !important;
            font-weight: 700 !important;
            height: 45px !important;
            text-transform: uppercase !important;
            transition: all 0.4s ease 0s;
            padding: 0 13px;
            border-radius: 10px;
        }
        .scroll-header .header-right {
            top: 10px
        }
        .htc__testimonial__area .section__title p {
            margin-bottom: unset !important;
        }
        .checked {
            color: orange;
        }
        .contact-box select {
            border: 1px solid #ebebeb;
            height: 35px;
            padding: 0 10px;
            border: 1px solid #3c7fb6;
        }
        @media (min-width: 767px){
            .htc__offer__thumb{
                width: 50%;
            }
            .htc__offer__thumb2{
                left: 0 !important;
                max-width: 50% !important;
            }
            .select{
                padding: 0 30px;
            }
        }
        @media (max-width: 767px){
            .htc__mission__area2{
                display: flex;
                flex-direction: column-reverse;
            }
            .select{
                padding: 0 0px;
                margin-bottom: 10px;
            }
            .input-search{
                margin-bottom: 10px;
            }
        }
    </style>

</body>



</html>