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
    <div class="breadcumb-wrapper ">
        <div class="parallax" data-parallax-image="{{ asset('website/assets/img/breadcurmb/breadcurmb-1-1.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Services Details</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Services Details</li>
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
                <div class="col-12">
                    <div class="service-content mb-30">
                        <div class="vs-surface wow" data-wow-delay="0.3s">
                            <img src="{{ asset('website/assets/img/service/sr-d-1.jpg') }}" alt="Service Image"
                                class="w-100">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-11 col-xxl-10 ">
                                <div class="service-bar">
                                    <div
                                        class="row justify-content-between align-items-center gy-4 text-center text-lg-start">
                                        <div class="col-sm-6 col-lg-auto">
                                            <span class="fs-xs">Treatment Name</span>
                                            <h2 class="h5 mb-0">Heart Transplant</h2>
                                        </div>
                                        <div class="col-sm-6 col-lg-auto">
                                            <span class="fs-xs">Time Duration</span>
                                            <h2 class="h5 mb-0">More Than 12 Hour</h2>
                                        </div>
                                        <div class="col-sm-6 col-lg-auto">
                                            <span class="fs-xs">Doctor Name</span>
                                            <h2 class="h5 mb-0">Dr. David Smith</h2>
                                        </div>
                                        <div class="col-sm-6 col-lg-auto">
                                            <a href="appointment.html" class="vs-btn style2">Appointment<i
                                                    class="fal fa-calendar-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="fs-md text-title mb-4 pb-2">Professionally iterate out-of-the-box relationships without
                            scalable "outside the box" thinking. Intrinsicly revolutionize team building customer service
                            before cross-platform portals. Quickly plagiarize resource maximizing mindshare and state of the
                            art deliverables. Phosfluorescently reintermediate sustainable architectures for enterprise
                            relationships. Compellingly actualize world-class solutions for high-payoff initiatives.</p>
                        <p>Monotonectally foster alternative technology vis-a-vis multifunctional leadership. Compellingly
                            orchestrate standards compliant schemas for highly efficient interfaces. Uniquely impact
                            orthogonal customer service whereas standards compliant services. Professionally communicate
                            performance based niche markets without performance based information. Objectively plagiarize
                            prospective networks via ubiquitous web-readiness. Credibly monetize process-centric synergy
                            with intuitive strategic theme areas. Professionally provide access to optimal portals without
                            dynamic supply chains. Enthusiastically re-engineer equity invested imperatives without
                            leveraged alignments. Monotonectally scale parallel methods of empowerment rather than wireless
                            sources. Competently scale robust relationships without maintainable synergy. Completely enhance
                            best-of-breed models for ubiquitous applications. Quickly underwhelm bricks-and-clicks bandwidth
                            with resource maximizing e-services. Appropriately incentivize out-of-the-box relationships
                            after customized users. Continually productivate real-time testing procedures and
                            backward-compatible scenarios. Holisticly predominate enabled ideas whereas future-proof
                            content.</p>
                        <div class="row mt-40 mb-20">
                            <div class="col-lg-4 mb-30">
                                <img src="{{ asset('website/assets/img/service/sr-d-2.jpg') }}" alt="Service Image"
                                    class="w-100">
                            </div>
                            <div class="col-lg-4 mb-30">
                                <img src="{{ asset('website/assets/img/service/sr-d-3.jpg') }}" alt="Service Image"
                                    class="w-100">
                            </div>
                            <div class="col-lg-4 mb-30">
                                <img src="{{ asset('website/assets/img/service/sr-d-4.jpg') }}" alt="Service Image"
                                    class="w-100">
                            </div>
                        </div>
                        <h3>Granular potentialities oriented</h3>
                        <p>Authoritatively disseminate multimedia based total linkage through market-driven methodologies.
                            Continually transform integrated results vis-a-vis multidisciplinary manufactured products.
                            Appropriately foster fully researched innovation rather than backend supply chains results
                            vis-a-vis multidisciplin ary manufactured. Synergistically underwhelm distinctive strategic
                            theme areas for low-risk high-yield vortals. Seamlessly fabricate high-quality portals and
                            next-generation human capital. Progressively network extensive leadership for client-focused
                            e-markets. Interactively whiteb ilers for cost effective synergy.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
