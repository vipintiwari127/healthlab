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
                <h1 class="breadcumb-title">Blog</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Blog</li>
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
                    <div class="service-thumb">
                        <div class="sr-img">
                            <img class="w-100" src="{{ asset('website/assets/img/service/sr-3-1.jpg') }}"
                                alt="Serivce Image" />
                        </div>
                        <div class="sr-body">
                            <span class="sr-icon"><i class="flaticon-discuss fa-3x"></i></span>
                            <h3 class="h4 sr-title">
                                <a class="text-reset" href="{{"/blog-details"}}">Haematology</a>
                            </h3>
                            <div class="sr-content">
                                <p class="sr-text">
                                    Appropriately customize excellent imperatives for products.
                                </p>
                                <a href="{{"/blog-details"}}" class="link-btn">Read More<i
                                        class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="service-thumb">
                        <div class="sr-img">
                            <img class="w-100" src="{{ asset('website/assets/img/service/sr-3-2.jpg') }}"
                                alt="Serivce Image" />
                        </div>
                        <div class="sr-body">
                            <span class="sr-icon"><i class="flaticon-group fa-3x"></i></span>
                            <h3 class="h4 sr-title">
                                <a class="text-reset" href="{{"/blog-details"}}">Family Physician</a>
                            </h3>
                            <div class="sr-content">
                                <p class="sr-text">
                                    Appropriately customize excellent imperatives for products.
                                </p>
                                <a href="{{"/blog-details"}}" class="link-btn">Read More<i
                                        class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="service-thumb">
                        <div class="sr-img">
                            <img class="w-100" src="{{ asset('website/assets/img/service/sr-3-3.jpg') }}"
                                alt="Serivce Image" />
                        </div>
                        <div class="sr-body">
                            <span class="sr-icon"><i class="flaticon-quality-of-life fa-3x"></i></span>
                            <h3 class="h4 sr-title">
                                <a class="text-reset" href="{{"/blog-details"}}">Pediatrician</a>
                            </h3>
                            <div class="sr-content">
                                <p class="sr-text">
                                    Appropriately customize excellent imperatives for products.
                                </p>
                                <a href="{{"/blog-details"}}" class="link-btn">Read More<i
                                        class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="service-thumb">
                        <div class="sr-img">
                            <img class="w-100" src="{{ asset('website/assets/img/service/sr-3-4.jpg') }}"
                                alt="Serivce Image" />
                        </div>
                        <div class="sr-body">
                            <span class="sr-icon"><i class="flaticon-healthcare fa-3x"></i></span>
                            <h3 class="h4 sr-title">
                                <a class="text-reset" href="{{"/blog-details"}}">Gynecologist</a>
                            </h3>
                            <div class="sr-content">
                                <p class="sr-text">
                                    Appropriately customize excellent imperatives for products.
                                </p>
                                <a href="{{"/blog-details"}}" class="link-btn">Read More<i
                                        class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="service-thumb">
                        <div class="sr-img">
                            <img class="w-100" src="{{ asset('website/assets/img/service/sr-3-5.jpg') }}"
                                alt="Serivce Image" />
                        </div>
                        <div class="sr-body">
                            <span class="sr-icon"><i class="flaticon-medical-symbol fa-3x"></i></span>
                            <h3 class="h4 sr-title">
                                <a class="text-reset" href="{{"/blog-details"}}">Expert Surgeon</a>
                            </h3>
                            <div class="sr-content">
                                <p class="sr-text">
                                    Appropriately customize excellent imperatives for products.
                                </p>
                                <a href="{{"/blog-details"}}" class="link-btn">Read More<i
                                        class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="service-thumb">
                        <div class="sr-img">
                            <img class="w-100" src="{{ asset('website/assets/img/service/sr-3-6.jpg') }}"
                                alt="Serivce Image" />
                        </div>
                        <div class="sr-body">
                            <span class="sr-icon"><i class="flaticon-stethoscope fa-3x"></i></span>
                            <h3 class="h4 sr-title">
                                <a class="text-reset" href="{{"/blog-details"}}">Nephrologist</a>
                            </h3>
                            <div class="sr-content">
                                <p class="sr-text">
                                    Appropriately customize excellent imperatives for products.
                                </p>
                                <a href="{{"/blog-details"}}" class="link-btn">Read More<i
                                        class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
                    Features Area
                    ==============================-->
    <section class="vs-accordion-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="about-content">
                        <span class="h3 text-theme sec-subtitle mb-2 mb-md-0">7 Star Care & Protection</span>
                        <h2 class="h1">Why Choose Us?</h2>
                        <p class="pe-xl-2 text-title">
                            Proactively revolutionize granular customer service after
                            pandemic internal or "organic" sources. Distinctively impact
                            proactive human capital rather than client-centered benefits.
                        </p>
                        <div class="row pt-3">
                            <div class="col-sm-6 col-lg-5 col-xl-6">
                                <div class="d-flex mb-25">
                                    <span class="text-theme mr-20"><i class="flaticon-security fa-3x lh-1"></i></span>
                                    <div class="media-body">
                                        <h3 class="h5 mb-2 pb-1">100% Safe & Trused</h3>
                                        <p class="mb-0 fs-xs">
                                            Professional web-readiness via ubiquitous human capital.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-5 col-xl-6">
                                <div class="d-flex mb-25">
                                    <span class="text-theme mr-20"><i
                                            class="flaticon-computer-mouse fa-3x lh-1"></i></span>
                                    <div class="media-body">
                                        <h3 class="h5 mb-2 pb-1">Specialist Surgery</h3>
                                        <p class="mb-0 fs-xs">
                                            Professional web-readiness via ubiquitous human capital.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-5 col-xl-6">
                                <div class="d-flex mb-25">
                                    <span class="text-theme mr-20"><i class="flaticon-healthcare fa-3x lh-1"></i></span>
                                    <div class="media-body">
                                        <h3 class="h5 mb-2 pb-1">24/7 take care staff</h3>
                                        <p class="mb-0 fs-xs">
                                            Professional web-readiness via ubiquitous human capital.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-5 col-xl-6">
                                <div class="d-flex mb-25">
                                    <span class="text-theme mr-20"><i
                                            class="flaticon-laboratory-equipment fa-3x lh-1"></i></span>
                                    <div class="media-body">
                                        <h3 class="h5 mb-2 pb-1">Medicine service</h3>
                                        <p class="mb-0 fs-xs">
                                            Professional web-readiness via ubiquitous human capital.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="vs-surface wow" data-wow-delay="0.3s">
                        <div class="about-img3 position-relative">
                            <img src="{{ asset('website/assets/img/about/about-4-1.jpg') }}" alt="About Image"
                                class="w-100" />
                            <div class="exp-box-bottom bg-white">
                                <div class="exp-year text-theme">
                                    <span class="counter">187</span>+
                                </div>
                                <p class="exp-text text-title mb-0">Years of Experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
                    Team Area
                    ==============================-->
    <section class="vs-team-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="section-title">
                        <div class="sec-icon">
                            <i class="flaticon-ecg"></i>
                        </div>
                        <h2 class="h1">Our Patient Says</h2>
                        <p>
                            Proactively revolutionize granular customer service after
                            pandemic internal or "organic" sources istinctively impact
                            proactive human
                        </p>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel wow fadeIn" data-wow-delay="0.3s" data-arrows="true" data-slide-show="3"
                data-lg-slide-show="2">
                <div class="col-xl-4 mb-30">
                    <div class="team-card">
                        <div class="team-head">
                            <img src="{{ asset('website/assets/img/team/t-1-1.png') }}" alt="Team Area" class="w-100" />
                            <div class="team-card-links">
                                <a class="team-links-toggler" href="#"><i class="fas fa-share-alt"></i></a>
                                <div class="team-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fas fa-basketball-ball"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-body">
                            <h3 class="h4 mb-0">
                                <a href="team-details.html" class="text-reset">David Smith</a>
                            </h3>
                            <p class="fs-xs degi text-theme mb-2">Specialist</p>
                            <p class="fs-xs">
                                Conceptualize user-centric web-readiness via economically
                                sound e-services. Interactively coordinate next-generation
                            </p>
                            <div class="">
                                <p class="fs-xs team-info">
                                    <i class="fas fa-phone text-theme"></i><a class="text-reset"
                                        href="tel:+592201520156">+592 2015 20156</a>
                                </p>
                                <p class="fs-xs team-info">
                                    <i class="fas fa-envelope text-theme"></i><a class="text-reset"
                                        href="mailto:info.example@mail.com">info.example@mail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-30">
                    <div class="team-card">
                        <div class="team-head">
                            <img src="{{ asset('website/assets/img/team/t-1-2.png') }}" alt="Team Area" class="w-100" />
                            <div class="team-card-links">
                                <a class="team-links-toggler" href="#"><i class="fas fa-share-alt"></i></a>
                                <div class="team-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fas fa-basketball-ball"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-body">
                            <h3 class="h4 mb-0">
                                <a href="team-details.html" class="text-reset">Vivi Marian</a>
                            </h3>
                            <p class="fs-xs degi text-theme mb-2">Osteopathic</p>
                            <p class="fs-xs">
                                Conceptualize user-centric web-readiness via economically
                                sound e-services. Interactively coordinate next-generation
                            </p>
                            <div class="">
                                <p class="fs-xs team-info">
                                    <i class="fas fa-phone text-theme"></i><a class="text-reset"
                                        href="tel:+592201520156">+592 2015 20156</a>
                                </p>
                                <p class="fs-xs team-info">
                                    <i class="fas fa-envelope text-theme"></i><a class="text-reset"
                                        href="mailto:info.example@mail.com">info.example@mail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-30">
                    <div class="team-card">
                        <div class="team-head">
                            <img src="{{ asset('website/assets/img/team/t-1-3.png') }}" alt="Team Area"
                                class="w-100" />
                            <div class="team-card-links">
                                <a class="team-links-toggler" href="#"><i class="fas fa-share-alt"></i></a>
                                <div class="team-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fas fa-basketball-ball"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-body">
                            <h3 class="h4 mb-0">
                                <a href="team-details.html" class="text-reset">Farhan Moris</a>
                            </h3>
                            <p class="fs-xs degi text-theme mb-2">Pediatrician</p>
                            <p class="fs-xs">
                                Conceptualize user-centric web-readiness via economically
                                sound e-services. Interactively coordinate next-generation
                            </p>
                            <div class="">
                                <p class="fs-xs team-info">
                                    <i class="fas fa-phone text-theme"></i><a class="text-reset"
                                        href="tel:+592201520156">+592 2015 20156</a>
                                </p>
                                <p class="fs-xs team-info">
                                    <i class="fas fa-envelope text-theme"></i><a class="text-reset"
                                        href="mailto:info.example@mail.com">info.example@mail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-30">
                    <div class="team-card">
                        <div class="team-head">
                            <img src="{{ asset('website/assets/img/team/t-1-4.png') }}" alt="Team Area"
                                class="w-100" />
                            <div class="team-card-links">
                                <a class="team-links-toggler" href="#"><i class="fas fa-share-alt"></i></a>
                                <div class="team-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fas fa-basketball-ball"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-body">
                            <h3 class="h4 mb-0">
                                <a href="team-details.html" class="text-reset">Jerzzy Lamot</a>
                            </h3>
                            <p class="fs-xs degi text-theme mb-2">Surgeon</p>
                            <p class="fs-xs">
                                Conceptualize user-centric web-readiness via economically
                                sound e-services. Interactively coordinate next-generation
                            </p>
                            <div class="">
                                <p class="fs-xs team-info">
                                    <i class="fas fa-phone text-theme"></i><a class="text-reset"
                                        href="tel:+592201520156">+592 2015 20156</a>
                                </p>
                                <p class="fs-xs team-info">
                                    <i class="fas fa-envelope text-theme"></i><a class="text-reset"
                                        href="mailto:info.example@mail.com">info.example@mail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
