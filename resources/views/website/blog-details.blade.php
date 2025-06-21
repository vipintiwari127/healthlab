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
                            <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}"
                                style="width: 100%; height: 400px;">
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#"><i class="fal fa-eye"></i>
                                    {{ \Carbon\Carbon::parse($blog->posting_date)->format('d M, Y') }}</a>
                            </div>
                            <h2 class="blog-title h3">{{ $blog->title }}</h2>
                            <p>{!! $blog->description !!}</p>

                        </div>
                    </div>

                    {{-- Comment Form --}}
                    <div class="vs-comment-form">
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
                        <div class="widget">
                            <h3 class="widget_title">Popular Posts</h3>
                            <div class="recent-post-wrap">
                                @foreach ($blogs as $blog)
                                    <div class="thumb-post d-flex mb-3">
                                        <div class="media-img me-3">
                                            <a href="{{ url('blog-details/' . $blog->url) }}">
                                                <img src="{{ asset('uploads/blogs/' . $blog->image) }}"
                                                    alt="{{ $blog->title }}" style="width: 80px; height: 80px;">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="post-title mb-1">
                                                <a class="text-reset" href="{{ url('blog-details/' . $blog->url) }}">
                                                    {{ \Illuminate\Support\Str::limit($blog->title, 50) }}
                                                </a>
                                            </h4>
                                            <span class="post-date d-block text-muted small">
                                                <i class="fal fa-calendar-alt me-1"></i>
                                                {{ \Carbon\Carbon::parse($blog->posting_date)->format('d M, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>

            </div>
        </div>
    </section>
@endsection
