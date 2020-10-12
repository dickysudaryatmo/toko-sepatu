<!DOCTYPE HTML>
<html>

<head>
    <title>Footwear</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
    <meta name="baseImage" content="{{ url('storage') }}" />
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <!-- Ion Icon Fonts-->
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>

    <div class="colorlib-loader"></div>

    <div id="page">
        @include('main.navbar')
        <aside id="colorlib-hero">
            <div class="flexslider">
                <ul class="slides">
                    <li style="background-image: url(images/img_bg_1.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 offset-sm-3 text-center slider-text">
                                    <div class="slider-text-inner">
                                        <div class="desc">
                                            <h1 class="head-1">Men's</h1>
                                            <h2 class="head-2">Shoes</h2>
                                            <h2 class="head-3">Collection</h2>
                                            <p class="category"><span>New trending shoes</span></p>
                                            <p><a href="#" class="btn btn-primary">Shop Collection</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url(images/img_bg_2.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 offset-sm-3 text-center slider-text">
                                    <div class="slider-text-inner">
                                        <div class="desc">
                                            <h1 class="head-1">Huge</h1>
                                            <h2 class="head-2">Sale</h2>
                                            <h2 class="head-3"><strong class="font-weight-bold">50%</strong> Off</h2>
                                            <p class="category"><span>Big sale sandals</span></p>
                                            <p><a href="#" class="btn btn-primary">Shop Collection</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url(images/img_bg_3.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 offset-sm-3 text-center slider-text">
                                    <div class="slider-text-inner">
                                        <div class="desc">
                                            <h1 class="head-1">New</h1>
                                            <h2 class="head-2">Arrival</h2>
                                            <h2 class="head-3">up to <strong class="font-weight-bold">30%</strong> off</h2>
                                            <p class="category"><span>New stylish shoes for men</span></p>
                                            <p><a href="#" class="btn btn-primary">Shop Collection</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="colorlib-intro">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="intro">It started with a simple idea: Create quality, well-designed products that I wanted myself.</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="colorlib-product">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class="featured">
                            <a href="#" class="featured-img" style="background-image: url(images/men.jpg);"></a>
                            <div class="desc">
                                <h2><a href="#">Shop Men's Collection</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="featured">
                            <a href="#" class="featured-img" style="background-image: url(images/women.jpg);"></a>
                            <div class="desc">
                                <h2><a href="#">Shop Women's Collection</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="colorlib-product">
            <div class="container">
                @yield('content')
            </div>
        </div>

        <!-- <div class="colorlib-partner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                        <h2>Trusted Partners</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col partner-col text-center">
                        <img src="images/brand-1.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
                    </div>
                    <div class="col partner-col text-center">
                        <img src="images/brand-2.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
                    </div>
                    <div class="col partner-col text-center">
                        <img src="images/brand-3.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
                    </div>
                    <div class="col partner-col text-center">
                        <img src="images/brand-4.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
                    </div>
                    <div class="col partner-col text-center">
                        <img src="images/brand-5.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
                    </div>
                </div>
            </div>
        </div> -->
        @include('main.footer')

    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
    </div>

    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- popper -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- bootstrap 4.1 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- jQuery easing -->
    <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
    <!-- Waypoints -->
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <!-- Flexslider -->
    <script src="{{asset('js/jquery.flexslider-min.js')}}"></script>
    <!-- Owl carousel -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <!-- Magnific Popup -->
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/magnific-popup-options.js')}}"></script>
    <!-- Date Picker -->
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <!-- Stellar Parallax -->
    <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
    <!-- Main -->
    <script src="{{asset('js/main.js')}}"></script>

</body>

</html>