@extends('website.layout.header')
@section('main-content')
    <style>
        .mobile-footer-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background-color: #FEC107;
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: space-around;
            align-items: center;
            z-index: 999;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        .mobile-footer-nav a {
            flex: 1;
            text-align: center;
            text-decoration: none;
            color: #333;
            font-size: 12px;
        }

        .mobile-footer-nav i {
            display: block;
            font-size: 18px;
            margin-bottom: 2px;
        }

        @media (min-width: 769px) {
            .mobile-footer-nav {
                display: none;
            }
        }
    </style>
    <!--==============================
                    Breadcumb
                ============================== -->
    <div class="breadcumb-wrapper">
        <div class="parallax" data-parallax-image="{{ asset('website/assets/img/breadcurmb/breadcurmb-1-1.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Health Package</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Health Package</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
                    Service Area
                    ==============================-->
    <section class="vs-service-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="col-xl-12 mb-25">
                        <div class="service-box">
                            <div class="sr-img">
                                <img src="{{ asset('website/assets/img/service/sr-2-1.jpg') }}" alt="Service Image"
                                    class="w-100" />
                            </div>
                            <div class="sr-icon">
                                <i class="flaticon-computer-mouse"></i>
                            </div>
                            <div class="sr-content">
                                <h3 class="h4">
                                    <a class="text-reset" href="service.html">Medical Advices & Checkup</a>
                                </h3>
                                <h4>₹650</h4>
                            </div>
                            <a href="service.html" class="icon-btn style4"><i class="far fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="col-xl-12 mb-25">
                        <div class="service-box">
                            <div class="sr-img">
                                <img src="{{ asset('website/assets/img/service/sr-2-1.jpg') }}" alt="Service Image"
                                    class="w-100" />
                            </div>
                            <div class="sr-icon">
                                <i class="flaticon-computer-mouse"></i>
                            </div>
                            <div class="sr-content">
                                <h3 class="h4">
                                    <a class="text-reset" href="service.html">Medical Advices & Checkup</a>
                                </h3>
                                <h4>₹650</h4>
                            </div>
                            <a href="service.html" class="icon-btn style4"><i class="far fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="col-xl-12 mb-25">
                        <div class="service-box">
                            <div class="sr-img">
                                <img src="{{ asset('website/assets/img/service/sr-2-1.jpg') }}" alt="Service Image"
                                    class="w-100" />
                            </div>
                            <div class="sr-icon">
                                <i class="flaticon-computer-mouse"></i>
                            </div>
                            <div class="sr-content">
                                <h3 class="h4">
                                    <a class="text-reset" href="service.html">Medical Advices & Checkup</a>
                                </h3>
                                <h4>₹650</h4>
                            </div>
                            <a href="service.html" class="icon-btn style4"><i class="far fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="col-xl-12 mb-25">
                        <div class="service-box">
                            <div class="sr-img">
                                <img src="{{ asset('website/assets/img/service/sr-2-1.jpg') }}" alt="Service Image"
                                    class="w-100" />
                            </div>
                            <div class="sr-icon">
                                <i class="flaticon-computer-mouse"></i>
                            </div>
                            <div class="sr-content">
                                <h3 class="h4">
                                    <a class="text-reset" href="service.html">Medical Advices & Checkup</a>
                                </h3>
                                <h4>₹650</h4>
                            </div>
                            <a href="service.html" class="icon-btn style4"><i class="far fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="col-xl-12 mb-25">
                        <div class="service-box">
                            <div class="sr-img">
                                <img src="{{ asset('website/assets/img/service/sr-2-1.jpg') }}" alt="Service Image"
                                    class="w-100" />
                            </div>
                            <div class="sr-icon">
                                <i class="flaticon-computer-mouse"></i>
                            </div>
                            <div class="sr-content">
                                <h3 class="h4">
                                    <a class="text-reset" href="service.html">Medical Advices & Checkup</a>
                                </h3>
                                <h4>₹650</h4>
                            </div>
                            <a href="service.html" class="icon-btn style4"><i class="far fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
