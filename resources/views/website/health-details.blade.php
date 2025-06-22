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
                <h1 class="breadcumb-title">Health Package Details</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Health Package Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
                                                            Shop Products Details
                                                            ==============================-->
    <section class="vs-shop-details space-top space-md-bottom">
        <div class="container">
            <div class="shop-wrap1 mb-80 bg-smoke">
                <div class="row">
                    <div class="col-lg-3 col-xl-4 mb-30 mb-lg-0">
                        <div class="product-big-img mb-4">
                            <!-- <p class="price">₹989<del>₹799</del></p> -->
                            <div class="img-fullsize">
                                <img class="lab-imag" src="{{ asset('' . $package->thumbnail) }}" alt="{{ $package->name }}"
                                    style="width: 500px;" />
                            </div>
                        </div>
                        <div class="product-thumb-area gx-3 vs-carousel row" data-slide-show="4" data-md-slide-show="3"
                            data-sm-slide-show="4" data-xs-slide-show="2"></div>
                    </div>
                    <div class="col-lg-9 col-xl-8 align-self-center">
                        <div class="product-details mt-n1">
                            <div class="row">
                                <div class="col-xxl-10">
                                    <h2 class="product-title d-xl-inline-block h3">
                                        {{ $package->name }}
                                    </h2>

                                    <div class="product_meta text-dark">
                                        <p><strong>Lab Name:</strong> {{ $package->partnerLab->name ?? 'N/A' }}</p>

                                        <p>
                                            <strong>Address:</strong>
                                            <i class="far fa-map-marker-alt"></i>&nbsp;E-1083 SARASWATI VIHAR
                                        </p>

                                        <p>
                                            <strong>Net Price:</strong>
                                            <del class="text-danger">₹{{ $package->net_price }}</del>
                                        </p>

                                        <p><strong>Offer Price:</strong> ₹{{ $package->offer_price }}</p>

                                        <p><strong>Reporting Time:</strong> {{ $package->reporting_time }}</p>

                                        <p><strong>Specimen Requirement:</strong> {{ $package->specimen_requirement }}</p>

                                        <div class="mt-3">
                                            <a href="cart.html" class="vs-btn style2 me-2" style="background-color: blue;">
                                                Add To Cart <i class="fas fa-chevron-right"
                                                    style="background-color: blue;"></i>
                                            </a>
                                            <a href="cart.html" class="vs-btn style2" style="background-color: blue;">
                                                Get Call Back <i class="fas fa-chevron-right"
                                                    style="background-color: blue;"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
