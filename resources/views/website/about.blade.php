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
    <!--============================== Breadcumb  ============================== -->
    <div class="breadcumb-wrapper ">
        <div class="parallax" data-parallax-image="{{ asset('website/assets/img/breadcurmb/breadcurmb-1-1.jpg')}}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">About Us</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--==============================  About Area ==============================-->
    <section class="vs-about-wrapper space">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-6 mb-40 mb-lg-0">
                    <div class="vs-surface wow" data-wow-delay="0.3s">
                        <div class="about-img3 position-relative">
                            <img src="{{ asset('website/assets/img/about/about-4-1.jpg')}}" alt="About Image" class="w-100">
                            <div class="exp-box-bottom bg-white">
                                <div class="exp-year text-theme">
                                    <span class="counter">187</span>+
                                </div>
                                <p class="exp-text text-title mb-0">Years of Experience</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-content mb-2 ">
                        <span class="sec-subtitle text-theme h3 mb-2 mb-md-0">Medical & General Care!</span>
                        <div class="row">
                            <div class="col-xl-10">
                                <h2 class="h1 mb-3">Surprise your body with <span class="text-theme">extra
                                        care.</span>
                                </h2>
                            </div>
                            <div class="col-xl-10">
                                <p class="mb-4">Rapidiously evisculate user-centric functionalities for highly
                                    efficient
                                    interfaces. Competently leverage other's scalable technology before synergistic
                                    manufactured products.</p>
                            </div>
                        </div>
                        <div class="media-style1">
                            <div class="media-icon"><i class="fas fa-phone"></i></div>
                            <div class="media-body">
                                <h3 class="media-title">CALL ANYTIME 24/7</h3>
                                <p class="media-text"><a href="tel:+4412345996">+44-1234-5996</a></p>
                            </div>
                        </div>
                        <a href="about.html" class="vs-btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================== Skill Area ==============================-->
    <div class="pb-30 pb-lg-0">
        <div class="parallax" data-parallax-image="{{ asset('website/assets/img/bg/bg-8.jpg')}}"></div>
        <section class="vs-skill-wrapper  ">
            <div class="container">
                <div class="skill-wrap1 bg-white">
                    <div class="row justify-content-center justify-content-lg-between">
                        <div class="col-md-6 col-lg-auto  mb-30">
                            <div class="d-xl-flex text-center text-xl-start skill-box">
                                <span class="ripple-icon hover-style2  align-self-start mb-20 mb-xl-0 mr-20"><i
                                        class="flaticon-discuss"></i></span>
                                <div class="media-body">
                                    <h2 class="mt-n2 mb-0 text-theme">30+</h2>
                                    <p class="text-title fs-md fw-medium mt-1 mt-xl-0 mb-2 mb-xl-2">Years Of Experience
                                    </p>
                                    <p class="fs-xs mb-0">Incubate extensive scenarios without top-line quality
                                        vectors.
                                        Authoritatively engage</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-auto  mb-30">
                            <div class="d-xl-flex text-center text-xl-start skill-box">
                                <span class="ripple-icon  hover-style2 align-self-start mb-20 mb-xl-0 mr-20"><i
                                        class="flaticon-medical-equipment"></i></span>
                                <div class="media-body">
                                    <h2 class="mt-n2 mb-0 text-theme">100+</h2>
                                    <p class="text-title fs-md fw-medium mt-1 mt-xl-0 mb-2 mb-xl-2">Experienced
                                        Doctor's
                                    </p>
                                    <p class="fs-xs mb-0">Incubate extensive scenarios without top-line quality
                                        vectors.
                                        Authoritatively engage</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-auto  mb-30">
                            <div class="d-xl-flex text-center text-xl-start skill-box">
                                <span class="ripple-icon  hover-style2 align-self-start mb-20 mb-xl-0 mr-20"><i
                                        class="flaticon-healthcare"></i></span>
                                <div class="media-body">
                                    <h2 class="mt-n2 mb-0 text-theme">200+</h2>
                                    <p class="text-title fs-md fw-medium mt-1 mt-xl-0 mb-2 mb-xl-2">Happy Patients</p>
                                    <p class="fs-xs mb-0">Incubate extensive scenarios without top-line quality
                                        vectors.
                                        Authoritatively engage</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==============================
                            Accordion Area
                        ==============================-->
        <section class="vs-accordion-wrapper space-top space-md-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 mb-30 mb-xl-0">
                        <div class="about-content">
                            <span class="h3 text-theme sec-subtitle mb-2 mb-md-0">7 Star Care & Protection</span>
                            <h2 class="h1">Why Choose Us?</h2>
                            <p class="pe-xl-2 text-title">Proactively revolutionize granular customer service after
                                pandemic internal or "organic" sources. Distinctively impact proactive human capital
                                rather than client-centered benefits. </p>
                            <div class="row pt-3">
                                <div class="col-sm-6 col-lg-5 col-xl-6">
                                    <div class="d-flex mb-25">
                                        <span class="text-theme mr-20"><i class="flaticon-security fa-3x lh-1"></i></span>
                                        <div class="media-body">
                                            <h3 class="h5 mb-2 pb-1">100% Safe & Trused</h3>
                                            <p class="mb-0 fs-xs">Professional web-readiness via ubiquitous human
                                                capital.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-5 col-xl-6">
                                    <div class="d-flex mb-25">
                                        <span class="text-theme mr-20"><i
                                                class="flaticon-computer-mouse fa-3x lh-1"></i></span>
                                        <div class="media-body">
                                            <h3 class="h5 mb-2 pb-1">Specialist Surgery </h3>
                                            <p class="mb-0 fs-xs">Professional web-readiness via ubiquitous human
                                                capital.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-5 col-xl-6">
                                    <div class="d-flex mb-25">
                                        <span class="text-theme mr-20"><i
                                                class="flaticon-healthcare fa-3x lh-1"></i></span>
                                        <div class="media-body">
                                            <h3 class="h5 mb-2 pb-1">24/7 take care staff</h3>
                                            <p class="mb-0 fs-xs">Professional web-readiness via ubiquitous human
                                                capital.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-5 col-xl-6">
                                    <div class="d-flex mb-25">
                                        <span class="text-theme mr-20"><i
                                                class="flaticon-laboratory-equipment fa-3x lh-1"></i></span>
                                        <div class="media-body">
                                            <h3 class="h5 mb-2 pb-1">Medicine service</h3>
                                            <p class="mb-0 fs-xs">Professional web-readiness via ubiquitous human
                                                capital.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="vs-accordion accordion accordion-style2" id="vsaccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        Uniquely optimize reliable models before wireless results ofessionally impact
                                        progressive core.
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse show"
                                    data-bs-parent="#vsaccordion">
                                    <div class="accordion-body">
                                        <p>Professionally impact distributed data via value-added experiences. Proacti
                                            incentivize 24/365 applications whereas turnkey total linkage. whiteboard
                                            multifunctional channels with interoperable value.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries for
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#vsaccordion">
                                    <div class="accordion-body">
                                        <p>Professionally impact distributed data via value-added experiences. Proacti
                                            incentivize 24/365 applications whereas turnkey total linkage. whiteboard
                                            multifunctional channels with interoperable value.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        From its medieval origins to the digital era, learn everything there is to know
                                        about the ubiquitous
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#vsaccordion">
                                    <div class="accordion-body">
                                        <p>Professionally impact distributed data via value-added experiences. Proacti
                                            incentivize 24/365 applications whereas turnkey total linkage. whiteboard
                                            multifunctional channels with interoperable value.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--============================== Team Area ==============================-->
    <section class="vs-team-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row  text-center justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="section-title">
                        <div class="sec-icon">
                            <i class="flaticon-ecg"></i>
                        </div>
                        <h2 class="h1 ">Our Patient Says</h2>
                        <p>Proactively revolutionize granular customer service after pandemic internal or "organic"
                            sources istinctively impact proactive human</p>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel wow fadeIn" data-wow-delay="0.3s" data-arrows="true" data-slide-show="3"
                data-lg-slide-show="2">
                <div class="col-xl-4 mb-30">
                    <div class="team-card">
                        <div class="team-head">
                            <img src="{{ asset('website/assets/img/team/t-1-1.png')}}" alt="Team Area" class="w-100">
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
                            <h3 class="h4 mb-0"><a href="team-details.html" class="text-reset">David Smith</a></h3>
                            <p class="fs-xs degi text-theme mb-2">Specialist</p>
                            <p class="fs-xs">Conceptualize user-centric web-readiness via economically sound
                                e-services.
                                Interactively coordinate next-generation </p>
                            <div class="">
                                <p class="fs-xs team-info"><i class="fas fa-phone text-theme"></i><a class="text-reset"
                                        href="tel:+592201520156">+592 2015 20156</a></p>
                                <p class="fs-xs team-info"><i class="fas fa-envelope text-theme"></i><a
                                        class="text-reset" href="mailto:info.example@mail.com">info.example@mail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-30">
                    <div class="team-card">
                        <div class="team-head">
                            <img src="{{ asset('website/assets/img/team/t-1-2.png')}}" alt="Team Area" class="w-100">
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
                            <h3 class="h4 mb-0"><a href="team-details.html" class="text-reset">Vivi Marian</a></h3>
                            <p class="fs-xs degi text-theme mb-2">Osteopathic</p>
                            <p class="fs-xs">Conceptualize user-centric web-readiness via economically sound
                                e-services.
                                Interactively coordinate next-generation </p>
                            <div class="">
                                <p class="fs-xs team-info"><i class="fas fa-phone text-theme"></i><a class="text-reset"
                                        href="tel:+592201520156">+592 2015 20156</a></p>
                                <p class="fs-xs team-info"><i class="fas fa-envelope text-theme"></i><a
                                        class="text-reset" href="mailto:info.example@mail.com">info.example@mail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-30">
                    <div class="team-card">
                        <div class="team-head">
                            <img src="{{ asset('website/assets/img/team/t-1-3.png')}}" alt="Team Area" class="w-100">
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
                            <h3 class="h4 mb-0"><a href="team-details.html" class="text-reset">Farhan Moris</a></h3>
                            <p class="fs-xs degi text-theme mb-2">Pediatrician</p>
                            <p class="fs-xs">Conceptualize user-centric web-readiness via economically sound
                                e-services.
                                Interactively coordinate next-generation </p>
                            <div class="">
                                <p class="fs-xs team-info"><i class="fas fa-phone text-theme"></i><a class="text-reset"
                                        href="tel:+592201520156">+592 2015 20156</a></p>
                                <p class="fs-xs team-info"><i class="fas fa-envelope text-theme"></i><a
                                        class="text-reset" href="mailto:info.example@mail.com">info.example@mail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-30">
                    <div class="team-card">
                        <div class="team-head">
                            <img src="{{ asset('website/assets/img/team/t-1-4.png')}}" alt="Team Area" class="w-100">
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
                            <h3 class="h4 mb-0"><a href="team-details.html" class="text-reset">Jerzzy Lamot</a></h3>
                            <p class="fs-xs degi text-theme mb-2">Surgeon</p>
                            <p class="fs-xs">Conceptualize user-centric web-readiness via economically sound
                                e-services.
                                Interactively coordinate next-generation </p>
                            <div class="">
                                <p class="fs-xs team-info"><i class="fas fa-phone text-theme"></i><a class="text-reset"
                                        href="tel:+592201520156">+592 2015 20156</a></p>
                                <p class="fs-xs team-info"><i class="fas fa-envelope text-theme"></i><a
                                        class="text-reset" href="mailto:info.example@mail.com">info.example@mail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================== Blog Area ==============================-->
    <section class="vs-blog-wrapper space-md-bottom space-top">
        <div class="container">
            <div class="row  text-center justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="section-title">
                        <div class="sec-icon">
                            <i class="flaticon-ecg"></i>
                        </div>
                        <h2 class="h1 ">Latest Posts</h2>
                        <p>Proactively revolutionize granular customer service after pandemic internal or "organic"
                            sources istinctively impact proactive human</p>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel wow fadeIn" data-wow-delay="0.3s" data-slide-show="3" data-lg-slide-show="2">
                <div class="col-xl-4">
                    <div class="vs-blog blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('website/assets/img/blog/b-1-1.jpg')}}" alt="Blog Image" class="w-100">
                            <div class="blog-date">
                                <div class="day">22</div>
                                Jan 2023
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="far fa-folder"></i>Mental Health</a>
                                <a href="blog.html"><i class="fal fa-user"></i>David Smith</a>
                            </div>
                            <h3 class="blog-title h5 font-body lh-base"><a href="blog.html">Services enable process is
                                    tobe after user-centric schemas now</a></h3>
                            <a href="blog.html" class="link-btn">Read More<i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="vs-blog blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('website/assets/img/blog/b-1-2.jpg')}}" alt="Blog Image" class="w-100">
                            <div class="blog-date">
                                <div class="day">23</div>
                                Mar 2023
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="far fa-folder"></i>Therapy</a>
                                <a href="blog.html"><i class="fal fa-user"></i>Vivi Marian</a>
                            </div>
                            <h3 class="blog-title h5 font-body lh-base"><a href="blog.html">From its medieval origins
                                    to
                                    the digital era everything there</a></h3>
                            <a href="blog.html" class="link-btn">Read More<i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="vs-blog blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('website/assets/img/blog/b-1-3.jpg')}}" alt="Blog Image" class="w-100">
                            <div class="blog-date">
                                <div class="day">28</div>
                                Dec 2023
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="far fa-folder"></i>Acupressure </a>
                                <a href="blog.html"><i class="fal fa-user"></i>Moris John</a>
                            </div>
                            <h3 class="blog-title h5 font-body lh-base"><a href="blog.html">Latin derived from
                                    Cicero's
                                    1st-century BC text De Fini now with</a></h3>
                            <a href="blog.html" class="link-btn">Read More<i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="vs-blog blog-card">
                        <div class="blog-img">
                            <img src="{{ asset('website/assets/img/blog/b-1-4.jpg')}}" alt="Blog Image" class="w-100">
                            <div class="blog-date">
                                <div class="day">22</div>
                                Jan 2023
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="far fa-folder"></i>Mental Health</a>
                                <a href="blog.html"><i class="fal fa-user"></i>David Smith</a>
                            </div>
                            <h3 class="blog-title h5 font-body lh-base"><a href="blog.html">Creation timelines the
                                    standard lorem ipsum passage vary</a></h3>
                            <a href="blog.html" class="link-btn">Read More<i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================== Brand Area ==============================-->
    <div class="vs-brand-wrapper space-md bg-light">
        <div class="container">
            <div class="wow fadeInUp" data-wow-delay="0.3s">
                <div class="row vs-carousel text-center" data-slide-show="5" data-lg-slide-show="4"
                    data-md-slide-show="3" data-sm-slide-show="3" data-xs-slide-show="1">
                    <div class="col-auto">
                        <div class="brand">
                            <img src="{{ asset('website/assets/img/brand/brand-1-1.svg')}}" alt="Brand Image">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="brand">
                            <img src="{{ asset('website/assets/img/brand/brand-1-2.svg')}}" alt="Brand Image">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="brand">
                            <img src="{{ asset('website/assets/img/brand/brand-1-3.svg')}}" alt="Brand Image">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="brand">
                            <img src="{{ asset('website/assets/img/brand/brand-1-4.svg')}}" alt="Brand Image">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="brand">
                            <img src="{{ asset('website/assets/img/brand/brand-1-5.svg')}}" alt="Brand Image">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="brand">
                            <img src="{{ asset('website/assets/img/brand/brand-1-6.svg')}}" alt="Brand Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
