<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hotel Al-Istiqamah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico" type="{{URL::asset('img/logo-hi.png')}}">

    <link rel="canonical" href="https://demohotel.hilfideveloper.com/">
    <meta name=title content="Hotel Reservasi Al-Istiqamah">
    <meta name=author content="https://demohotel.hilfideveloper.com/">
    <meta name=language content="Indonesia">
    <meta name=googlebot-news content="noindex">
    <meta name=googlebot content="noindex">
    <meta name=robots content="noindex">
    <meta name=description
        content="Cukup dengan merogoh kocek mulai dari Rp350.000, Anda sudah bisa mendapat penginapan dengan kualitas mantap tapi harga bersahabat. Hotel ini cocok bagi wisatawan yang ingin jalan-jalan.">
    <meta name=keywords content="hotel, hotelterbaik, pesaman barat, sulawesi, padang, hotel bintang lima, mantap">
    <meta name=twitter:card content="summary">
    <meta property="og:url" content="https://demohotel.hilfideveloper.com/">
    <meta property="og:title" content="Hotel Reservasi - Al-Istiqamah">
    <meta property="og:description"
        content="Cukup dengan merogoh kocek mulai dari Rp350.000, Anda sudah bisa mendapat penginapan dengan kualitas mantap tapi harga bersahabat. Hotel ini cocok bagi wisatawan yang ingin jalan-jalan.">
    <meta property="og:image" content="{{URL::asset('img/logo-hi.png')}}">
    <meta property="og:type" content="website" />
    <meta property="og:image:type" content="{{URL::asset('img/logo-hi.png')}}">
    <meta property='og:image:width' content='300' />
    <meta property='og:image:height' content='300' />
    <meta property="og:image:alt" content="Hotel Reservasi - Al-Istiqamah">



    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('img/logo-hi.png')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ URL::asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/slicknav.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('front/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/slick.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('front/css/responsive.css')}}">
</head>

<body>

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <strong style="font-size: 10px;">Hotel<br></strong>
                    <strong style="font-size: 11px;">Al-Istiqamah</strong>
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
        <div class="header-area header-sticky">
            <div class="main-header ">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="{{ url('/')}}">
                                    <img src="{{ asset('img/logo-hi.png')}}" class="rounded" width="70" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <!-- main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ url('/')}}">Beranda</a></li>
                                        <li><a href="{{ url('/about')}}">Tentang Kami</a></li>
                                        <li><a href="{{ url('/service')}}">Pelayanan</a></li>
                                        <li><a href="#">Fasilitas</a>
                                            <ul class="submenu">
                                                <li><a href="{{ url('/room')}}">Kamar</a>
                                                <li><a href="{{ url('/ruang-makan')}}">Ruang Makan</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ url('contact') }}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 d-flex">
                            <!-- header-btn -->
                            <div class="header-btn">
                                <a href="#" class="btn btn1 d-none d-lg-block"
                                    style="font-size: 14px; margin-right:5px; padding-top:23px; padding-bottom:23px; padding-right: 10px; padding-left:10px;">Booking
                                    Online</a>
                            </div>
                            <div class="header-btn">
                                <a href="{{ url('/login')}}" class="btn btn1 d-none d-lg-block"
                                    style="font-size: 14px; margin-right:5px; padding-top:23px; padding-bottom:23px; padding-right: 10px; padding-left:10px;">login</a>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class=" col-12" style="margin-top:-45px;">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>