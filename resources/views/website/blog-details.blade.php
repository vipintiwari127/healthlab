@extends('website.layout.header')
@section('main-content')
    <!--==============================
            Breadcumb
        ============================== -->
    <div class="breadcumb-wrapper ">
        <div class="parallax" data-parallax-image="{{ asset('website/assets/img/breadcurmb/breadcurmb-1-1.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Blog Details</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
                Blog Area
            ==============================-->
    <section class="vs-blog-wrapper blog-details space-top space-md-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="vs-blog blog-single">
                        <div class="blog-img">
                            <img src="{{ asset('website/assets/img/blog/blog-s-1-1.jpg') }}" alt="Blog Image">
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#"><i class="fal fa-eye"></i>232 Views</a>
                                <a href="#"><i class="fal fa-comments"></i>17 Comments</a>
                                <a href="#"><i class="fal fa-eye"></i>22 June, 2023</a>
                            </div>
                            <h2 class="blog-title h3">Efficiently monetize models transparent sources redefine distributed
                                innovation</h2>
                            <p>Conveniently whiteboard team building architectures without sticky partnerships.
                                Energistically redefine emerging paradigms after resource sucking bandwidth. Dramatically
                                supply transparent expertise whereas market-driven testing procedures. Professionally
                                visualize client-centric services via inexpensive models.</p>
                            <p>Conveniently whiteboard team building architectures without sticky partnerships.
                                Energistically redefine emerging paradigms after resource sucking bandwidth. Dramatically
                                supply transparent expertise whereas market-driven testing procedures.</p>
                        </div>
                        <div class="share-links clearfix  ">
                            <div class="row align-items-xl-center">
                                <div class="col-md-5 d-sm-flex align-items-center mb-20 mb-md-0">
                                    <span class="share-links-title">Tags:</span>
                                    <div class="tagcloud">
                                        <a href="#">Surgery</a>
                                        <a href="#">Operation</a>
                                    </div>
                                </div>
                                <div class="col-md-7 d-sm-flex justify-content-md-end align-items-center">
                                    <span class="share-links-title">Social Network:</span>
                                    <ul class="blog-social">
                                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    </ul><!-- End Social Share -->
                                </div><!-- Share Links Area end -->
                            </div>
                        </div>
                    </div>
                    <div class="vs-comment-form  ">
                        <div class="form-title">
                            <h3 class="h2 mb-0">Leave a Comment</h3>
                            <p class="text-theme mb-4">Your email address will not be published. Required fields are marked
                                *</p>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group mb-4">
                                <textarea placeholder="Write a Message" class="form-control style3"></textarea>
                                <i class="text-title far fa-pencil-alt"></i>
                            </div>
                            <div class="col-md-6 form-group mb-4">
                                <input type="text" placeholder="Your Name" class="form-control style3">
                                <i class="text-title far fa-user"></i>
                            </div>
                            <div class="col-md-6 form-group mb-4">
                                <input type="text" placeholder="Your Email" class="form-control style3">
                                <i class="text-title far fa-envelope"></i>
                            </div>
                            <div class="col-12 form-group mb-0">
                                <button class="vs-btn style2">Submit Comment<i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area pt-30 pt-lg-0 pl-30">
                        <div class="widget  ">
                            <h3 class="widget_title">Popular Posts</h3>
                            <div class="recent-post-wrap">

                                <div class="thumb-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img
                                                src="{{ asset('website/assets/img/widget/thumb-1-1.jpg') }}"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body ">
                                        <h4 class="post-title"><a href="blog-details.html">Extend market the driven
                                                results</a></h4>
                                        <a class="post-date" href="blog.html"><i class="fal fa-calendar-alt"></i>Mar 21,
                                            2023</a>
                                    </div>
                                </div>

                                <div class="thumb-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img
                                                src="{{ asset('website/assets/img/widget/thumb-1-2.jpg') }}"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body ">
                                        <h4 class="post-title"><a href="blog-details.html">The purpose lorem ipsum distract
                                            </a></h4>
                                        <a class="post-date" href="blog.html"><i class="fal fa-calendar-alt"></i>Mar 21,
                                            2023</a>
                                    </div>
                                </div>

                                <div class="thumb-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img
                                                src="{{ asset('website/assets/img/widget/thumb-1-3.jpg') }}"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body ">
                                        <h4 class="post-title"><a href="blog-details.html">Until recently, the prevailing
                                                view</a></h4>
                                        <a class="post-date" href="blog.html"><i class="fal fa-calendar-alt"></i>Mar 21,
                                            2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
