

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/icons/favicon.png') }}" />
    <title>Country Side</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="fonts/antonio-exotic/stylesheet.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.min.css') }}">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-slider.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/lightbox-plus-jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/instafeed.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap-slider.min.js') }}" type="text/javascript"></script>
    @stack('styles')
</head>

<body>
    <div id="page">
        <!---header top---->
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <!--                            <a href="#"> </a>
                                                            <div class="info-block"><i class="fa fa-map"></i>701 Old York Drive Richmond USA.</div>-->
                    </div>
                    <div class="col-md-6">
                        <div class="social-grid">
                            <ul class="list-unstyled text-right">
                                <li><a><i class="fa fa-facebook"></i></a></li>
                                <li><a><i class="fa fa-twitter"></i></a></li>
                                <li><a><i class="fa fa-linkedin"></i></a></li>
                                <li><a><i class="fa fa-instagram"></i></a></li>

                                @auth
                                <li>
                                    <a href="{{route('admin.home')}}">
                                        <i class="fal fa-user-circle"></i> {{ Auth::user()->name }}
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); this.closest('form').submit();">
                                           Logout
                                        </a>
                                    </form>
                                </li>
                            @else
                                <li><a href="{{ route('login') }}"><i class="fal fa-user"></i> Login</a></li>
                                <li><a href="{{ route('register') }}">Sign up</a></li>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header--->
        <header class="header-container">
            <div class="container">
                <div class="top-row">
                    <div class="row">
                        <div class="col-md-2 col-sm-6 col-xs-6">
                            <div id="logo">
                                <!--<a href="index.html"><img src="images/logo.png" alt="logo"></a>-->
                                <a href="index.html"><span>vacay</span>home</a>
                            </div>
                        </div>
                        <div class="col-sm-6 visible-sm">
                            <div class="text-right"><button type="button" class="book-now-btn">Book Now</button></div>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12 remove-padd">
                            <nav class="navbar navbar-default">
                                <div class="navbar-header page-scroll">
                                    <button data-target=".navbar-ex1-collapse" data-toggle="collapse"
                                        class="navbar-toggle" type="button">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>

                                </div>
                                <div class="collapse navigation navbar-collapse navbar-ex1-collapse remove-space">
                                    <ul class="list-unstyled nav1 cl-effect-10" style="margin-left: -24px;">
                                        <li><a data-hover="Home" class="active"><span>Home</span></a></li>
                                        <li><a data-hover="About" href="about.html"><span>About</span></a></li>
                                        <li><a data-hover="Rooms" href="rooms.html"><span>Rooms</span></a></li>
                                        <li><a data-hover="Gallery" href="gallery.html"><span>Gallery</span></a></li>
                                        {{--  <li><a data-hover="Dinning" href="dinning.html"><span>Dinning</span></a></li>
                                                <li><a data-hover="News" href="news.html"><span>News</span></a></li>
                                                <li><a data-hover="Contact Us" href="contact.html"><span>Contact Us</span></a></li>  --}}

                                    </ul>


                                </div>
                            </nav>
                        </div>
                        <div class="col-md-2  col-sm-4 col-xs-12 hidden-sm">
                            <div class="text-right"><button type="button" class="book-now-btn">Book Now</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
        <!-- Hero Slider Be


                <!---footer--->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 width-set-50">
                        <div class="footer-details">
                            <h4>Get in touch</h4>
                            <ul class="list-unstyled footer-contact-list">
                                <li>
                                    <i class="fa fa-map-marker fa-lg"></i>
                                    <p> Countyside Properties,Sector 20, Kharghar, 410210</p>
                                </li>
                                <li>
                                    <i class="fa fa-phone fa-lg"></i>
                                    <p><a href="tel:+1-202-555-0100"> +9503354466</a></p>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o fa-lg"></i>
                                    <p><a href="mailto:demo@info.com"> countrysidepropertiesinfo@gmail.com</a></p>
                                </li>
                            </ul>
                            <div class="footer-social-icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                            <div class="input-group" id="subscribe">
                                <input type="text" class="form-control subscribe-box" value=""
                                    name="subscribe" placeholder="EMAIL ID">
                                <span class="input-group-btn">
                                    <button type="button" class="btn subscribe-button"><i
                                            class="fa fa-paper-plane fa-lg"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 width-50 width-set-50">
                        <div class="footer-details">
                            <h4>explore</h4>
                            <ul class="list-unstyled footer-links">
                                <li class="active"><a>Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="rooms.html">Rooms</a></li>
                                <li><a href="gallery.html">Gallery</a></li>
                                <li><a href="#">Dinning</a></li>
                                <li> <a href="news.html">News</a></li>
                                <li> <a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="footer-details">
                            <h4>Now On Instagram</h4>
                            <div class="row">
                                <div class="instagram-images">
                                    <div id="instafeed"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="copyright">
                    &copy; 2017 All right reserved. Designed by <a href="http://www.themevault.net/"
                        target="_blank">Country Side.</a>
                </div>

            </div>
        </footer>

        <!--back to top--->
        <a style="display: none;" href="javascript:void(0);" class="scrollTop back-to-top" id="back-to-top">
            <span><i aria-hidden="true" class="fa fa-angle-up fa-lg"></i></span>
            <span>Top</span>
        </a>

    </div>
</body>

</html>
