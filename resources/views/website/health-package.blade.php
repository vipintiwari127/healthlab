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
                @foreach ($packages as $package)
                    <div class="col-md-6 col-xl-4">
                        <div class="col-xl-12 mb-25">
                            <div class="service-box">
                                <div class="sr-img">
                                    <img src="{{ asset('' . $package->thumbnail) }}"
                                        alt="{{ $package->name }}" class="w-100" />
                                </div><br>

                                <div class="sr-content">
                                    <h3 class="h4">
                                        <a class="text-reset" href="{{ url('/health-package-details/' . $package->slug) }}">
                                            {{ $package->name }}
                                        </a>
                                    </h3>
                                    <h4>₹{{ $package->offer_price ?? $package->net_price }}</h4>
                                </div>
                                <a href="{{ url('/health-package-details/' . $package->slug) }}" class="icon-btn style4">
                                    <i class="far fa-long-arrow-alt-right" style="background-color: blue;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
