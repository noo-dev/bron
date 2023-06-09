<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Otel bron</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset("front/css/bootstrap.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("front/css/font-awesome.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("front/css/elegant-icons.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("front/css/flaticon.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("front/css/owl.carousel.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("front/css/nice-select.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("front/css/jquery-ui.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("front/css/magnific-popup.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("front/css/slicknav.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("front/css/style.css") }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <div class="language-option">
                <img src="img/flag.jpg" alt="">
                <span>EN <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">Zi</a></li>
                        <li><a href="#">Fr</a></li>
                    </ul>
                </div>
            </div>
            <a href="#" class="bk-btn">BRON</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Baş sahypa</a></li>
                <li><a href="./rooms.html">Otaglar</a></li>
                <li><a href="./about-us.html">Biz hakynda</a></li>
                {{-- <li><a href="./pages.html">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./room-details.html">Room Details</a></li>
                        <li><a href="#">Deluxe Room</a></li>
                        <li><a href="#">Family Room</a></li>
                        <li><a href="#">Premium Room</a></li>
                    </ul>
                </li> --}}
                <li><a href="./contact.html">Habarlaşmak</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Registrasiya</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-tripadvisor"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> (12) 345 67890</li>
            <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i> (+993) 6X XXXXXX</li>
                            <li><i class="fa fa-envelope"></i> bron.tm@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        {{-- <div class="tn-right">
                            <div class="top-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                            <a href="#" class="bk-btn">BRON</a>
                            <div class="language-option">
                                <img src="img/flag.jpg" alt="">
                                <span>EN <i class="fa fa-angle-down"></i></span>
                                <div class="flag-dropdown">
                                    <ul>
                                        <li><a href="#">TM</a></li>
                                        <li><a href="#">RU</a></li>
                                        <li><a href="#">TR</a></li>
                                        <li><a href="#">EN</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="{{-- asset("/front/img/logo.png") --}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="active"><a href="/">Baş sahypa</a></li>
                                    <li><a href="./rooms.html">Otaglar</a></li>
                                    <li><a href="./about-us.html">Biz hakynda</a></li>
                                    {{-- <li><a href="./pages.html">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="./room-details.html">Room Details</a></li>
                                            <li><a href="./blog-details.html">Blog Details</a></li>
                                            <li><a href="#">Family Room</a></li>
                                            <li><a href="#">Premium Room</a></li>
                                        </ul>
                                    </li> --}}
                                    <li><a href="./contact.html">Habarlaşmak</a></li>
                                    @if (session('customerLogin'))
                                        <li><a href="#">{{ session('user')['full_name'] }}</a></li>
                                        <li><a href="{{ route('front.dashboard') }}">Şahsy otag</a></li>
                                        <li><a href="/logout">Çykmak</a></li>
                                    @else
                                    <li><a href="/login">Login</a></li>
                                    <li><a href="/register">Registrasiya</a></li>
                                    @endif
                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Habarlaşmak</h6>
                            <ul>
                                <li>(+993) 61 234567</li>
                                <li>info.garagum@gmail.com</li>
                                <li>A. Nyýazow ş. 25j, Aşgabat ş.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>Täzelikler</h6>
                            <p>Täzeliklerden habardar boluň</p>
                            <form action="#" class="fn-form">
                                <input type="text" placeholder="Email">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{ asset("/front/js/jquery-3.3.1.min.js") }}"></script>
    <script src="{{ asset("/front/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("/front/js/jquery.magnific-popup.min.js") }}"></script>
    <script src="{{ asset("/front/js/jquery.nice-select.min.js") }}"></script>
    <script src="{{ asset("/front/js/jquery-ui.min.js") }}"></script>
    <script src="{{ asset("/front/js/jquery.slicknav.js") }}"></script>
    <script src="{{ asset("/front/js/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("/front/js/moment.js") }}"></script>
    <script src="{{ asset("/front/js/main.js") }}"></script>

    @yield('scripts')
</body>

</html>
