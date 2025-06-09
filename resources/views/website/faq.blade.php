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
    <!--============================== Breadcumb ============================== -->
    <div class="breadcumb-wrapper">
        <div class="parallax" data-parallax-image="{{ asset('website/assets/img/breadcurmb/breadcurmb-1-1.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">FAQ's</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">FAQ's</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--============================== About Area ==============================-->

    <div class="pb-30 pb-lg-0">
        {{-- <div class="parallax" data-parallax-image="{{ asset('website/assets/img/bg/bg-8.jpg') }}"></div> --}}
        <!--============================== Accordion Area ==============================-->
        <section class="vs-accordion-wrapper space-top space-md-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="vs-accordion accordion accordion-style2" id="vsaccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        Uniquely optimize reliable models before wireless results ofessionally impact
                                        progressive core.
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#vsaccordion">
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
@endsection
