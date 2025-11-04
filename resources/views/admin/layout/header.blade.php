<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<!-- Mirrored from html.dynamiclayers.net/dl/saasbiz/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Oct 2025 09:14:31 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Multipurpose Saas Startup HTML Template">
    <meta name="author" content="DynamicLayers">

    <title>Saasbiz | Multipurpose Saas Startup HTML Template</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin_assets/img/favicon.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/venobox/venobox.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/responsive.css') }}">

    <script src="{{ asset('admin_assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
</head>

<body data-spy="scroll" data-target="#navmenu" data-offset="70">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    {{-- <div class="site-preloader-wrap">
            <div class="spinner"></div>
        </div><!-- Preloader --> --}}

    <header id="header" class="header-section">
        <div class="container">
            <nav class="navbar ">
                <a href="index.html" class="navbar-brand"><img src="{{ asset('admin_assets/img/logo-dark.png') }}"
                        alt="Saasbiz"></a>
                <div class="d-flex menu-wrap">
                    <div id="mainmenu" class="mainmenu">
                        <ul class="nav">
                            <li><a data-scroll class="nav-link active" href="{{ route('home') }}">Home<span
                                        class="sr-only">(current)</span></a>
                                {{-- <ul>
                                    <li><a href="index.html">Home Design Studio</a></li>
                                    <li><a href="index-2.html">Home Web hosting</a></li>
                                    <li><a href="index-3.html">Home Support Desk</a></li>
                                    <li><a href="index-4.html">Home Apps Landing</a></li>
                                    <li><a href="index-5.html">Home Cloud Based Saas</a></li>
                                </ul> --}}
                            </li>
                            
                                @auth
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                @endauth
                            

                            <li><a href="{{ route('about') }}">About</a>
                                {{-- <ul>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="about-company.html">About Company</a></li>
                                </ul> --}}
                            </li>
                              <li><a href="{{ route('plan') }}">Pricing Plans</a>
                               
                            </li>
                           
                            {{-- <li><a href="#">Pages</a>
                                <ul>
                                    <li><a href="job-listing.html">Job Listing</a></li>
                                    <li><a href="job-details.html">Job Details</a></li>
                                    <li><a href="team.html">Our Team</a></li>
                                    <li><a href="pricing-plans.html">Pricing Plans</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="faq.html">FAQ's</a></li>
                                    <li><a href="404.html">404 Error</a></li>
                                </ul>
                            </li> --}}
                            {{-- <li><a href="#">Blog</a>
                                <ul>
                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                    <li><a href="blog-classic.html">Blog Classic</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li> --}}
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                    <div class="header-right">
                        <div class="cart-icon"><i class="fa fa-shopping-basket"></i><span class="count">0</span></div>
                    </div>
                </div>
            </nav>
        </div>
    </header> <!--.header-section -->
