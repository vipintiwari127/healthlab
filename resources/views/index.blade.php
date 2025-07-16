@extends('website.layout.header')
@section('main-content')
    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    <style>
        .modal-body-scroll {
            max-height: 400px;
            overflow-y: auto;
        }

        /* Optional: Add custom scrollbar styling */
        .modal-body-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .modal-body-scroll::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 4px;
        }

        .modal-body-scroll::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }
    </style>
    <!-- Hero Area -->
    <section class="vs-hero-wrapper position-relative">
        <div class="row g-0 d-md-flex align-items-stretch" style="background-color: var(--primary-color);">
            <div class="col-lg-4 my-auto order-2 order-md-1">
                <div class="container">
                    <h1 class="header-title hide-on-mobile" style="color: red;"><span>Drive</span> Your Health</h1>
                    <div class="search-card">
                        <div class="search-options">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <h5 style="margin-bottom: -29px;">The Best Labs & all your Health Need, All under
                                        One Place</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 mt-3">
                            <div class="col-md-8">
                                <input type="text" class="search-input form-control" placeholder="Search..."
                                    id="searchInput">
                            </div>
                            <div class="col-md-4">
                                <button class="continue-btn w-100" id="continueBtn" disabled>Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 order-1 order-md-2">
                <div class="vs-hero-carousel flex-grow-1" data-navprevnext="true" data-height="800" data-container="1900"
                    data-slidertype="responsive">
                    <!-- Slide 1 -->
                    <div class="ls-slide" data-ls="duration: 13000; transition2d: 5;">
                        <img src="{{ asset('website/assets/img/hero/h-bg-3-1.jpg') }}" alt="Hero Image" class="ls-bg" />
                        <h1 class="text-title ls-l ls-responsive"
                            data-ls="delayin: 600; easingin: easeInOutSine; texttransitionin: true; textstartatin: transitioninstart; textdurationin: 2000; texttypein: words_asc; textshiftin: 200; textoffsetyin: -100; offsetyout: -100; durationout: 2000;"
                            style="left: 335px; top: 208px; font-size: 82px; font-weight: 700">We always put the</h1>
                        <h1 class="text-white ls-l ls-responsive"
                            data-ls="delayin: 0; easingin: easeInOutSine; texttransitionin: true; textstartatin: transitioninstart; textdurationin: 2000; texttypein: words_asc; textshiftin: 200; textoffsetyin: -100; offsetyout: -100; durationout: 2000;"
                            style="left: 335px; top: 290px; font-size: 82px; font-weight: 700">patients first</h1>
                        <p class="ls-l text-white ls-responsive ls-hide-sm"
                            data-ls="delayin: 800; texttransitionin: true; textstartatin: transitioninstart; texttypein: lines_asc; textshiftin: 100; textoffsetyin: 100; textdurationin: 2000; offsetyout: 100; durationout: 2000;"
                            style="left: 335px; top: 400px; width: 605px; font-size: 16px; font-weight: 400; white-space: normal; letter-spacing: 0.02em; line-height: 28px;">
                            Conveniently drive go forward architectures with future-proof growth strategies. Energistically
                            supply low-risk high-yield process improvements for mission-critical testing procedures</p>
                    </div>
                    <!-- Slide 2 -->
                    <div class="ls-slide" data-ls="duration: 13000; transition2d: 5;">
                        <img src="{{ asset('website/assets/img/hero/h-bg-3-2.jpg') }}" alt="Hero Image" class="ls-bg" />
                        <h1 class="text-title ls-l ls-responsive"
                            data-ls="delayin: 600; easingin: easeInOutSine; texttransitionin: true; textstartatin: transitioninstart; textdurationin: 2000; texttypein: words_asc; textshiftin: 200; textoffsetyin: -100; offsetyout: -100; durationout: 2000;"
                            style="left: 335px; top: 208px; font-size: 82px; font-weight: 700">Best Treatment for</h1>
                        <h1 class="text-white ls-l ls-responsive"
                            data-ls="delayin: 0; easingin: easeInOutSine; texttransitionin: true; textstartatin: transitioninstart; textdurationin: 2000; texttypein: words_asc; textshiftin: 200; textoffsetyin: -100; offsetyout: -100; durationout: 2000;"
                            style="left: 335px; top: 290px; font-size: 82px; font-weight: 700">healthy life</h1>
                        <p class="ls-l text-white ls-responsive ls-hide-sm"
                            data-ls="delayin: 800; texttransitionin: true; textstartatin: transitioninstart; texttypein: lines_asc; textshiftin: 100; textoffsetyin: 100; textdurationin: 2000; offsetyout: 100; durationout: 2000;"
                            style="left: 335px; top: 400px; width: 605px; font-size: 16px; font-weight: 400; white-space: normal; letter-spacing: 0.02em; line-height: 28px;">
                            Conveniently drive go forward architectures with future-proof growth strategies. Energistically
                            supply low-risk high-yield process improvements for mission-critical testing procedures</p>
                    </div>
                    <!-- Slide 3 -->
                    <div class="ls-slide" data-ls="duration: 13000; transition2d: 5;">
                        <img src="{{ asset('website/assets/img/hero/h-bg-3-3.jpg') }}" alt="Hero Image" class="ls-bg" />
                        <h1 class="text-title ls-l ls-responsive"
                            data-ls="delayin: 600; easingin: easeInOutSine; texttransitionin: true; textstartatin: transitioninstart; textdurationin: 2000; texttypein: words_asc; textshiftin: 200; textoffsetyin: -100; offsetyout: -100; durationout: 2000;"
                            style="left: 335px; top: 208px; font-size: 82px; font-weight: 700">Best Medics, Doctors</h1>
                        <h1 class="text-white ls-l ls-responsive"
                            data-ls="delayin: 0; easingin: easeInOutSine; texttransitionin: true; textstartatin: transitioninstart; textdurationin: 2000; texttypein: words_asc; textshiftin: 200; textoffsetyin: -100; offsetyout: -100; durationout: 2000;"
                            style="left: 335px; top: 290px; font-size: 82px; font-weight: 700">and physicians</h1>
                        <p class="ls-l text-white ls-responsive ls-hide-sm"
                            data-ls="delayin: 800; texttransitionin: true; textstartatin: transitioninstart; texttypein: lines_asc; textshiftin: 100; textoffsetyin: 100; textdurationin: 2000; offsetyout: 100; durationout: 2000;"
                            style="left: 335px; top: 400px; width: 605px; font-size: 16px; font-weight: 400; white-space: normal; letter-spacing: 0.02em; line-height: 28px;">
                            Conveniently drive go forward architectures with future-proof growth strategies. Energistically
                            supply low-risk high-yield process improvements for mission-critical testing procedures</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="d-flex d-md-none justify-content-between px-2 py-3">
            <div class="card text-center mx-1" style="flex: 1;">
                <img src="{{ asset('website/assets/img/6543cdab7e963_youtube-removebg-preview.png') }}" class="card-img-top"
                    alt="Image 1">
                <div class="card-body">
                    <p class="card-text">Labs</p>
                </div>
            </div>
            <div class="card text-center mx-1" style="flex: 1;">
                <img src="{{ asset('website/assets/img/6543cdab7e963_youtube-removebg-preview.png') }}" class="card-img-top"
                    alt="Image 2">
                <div class="card-body">
                    <p class="card-text">Health Package</p>
                </div>
            </div>
            <div class="card text-center mx-1" style="flex: 1;">
                <img src="{{ asset('website/assets/img/6543cdab7e963_youtube-removebg-preview.png') }}" class="card-img-top"
                    alt="Image 3">
                <div class="card-body">
                    <p class="card-text">Medical package</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Location Selection Modal -->
    <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="locationModalLabel">Select Your Location</h5>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"
                        style="font-size: 24px; line-height: 1;">&times;</button>
                </div>
                <div class="modal-body modal-body-scroll"> <!-- Scroll added here -->
                    <div class="mb-2 d-flex gap-2">
                        <input type="text" class="form-control" id="currentLocationInput"
                            placeholder="Enter your current location" />
                        <button class="btn btn-primary">Current location</button>
                    </div>
                    <br>
                    <h5>Popular City</h5>
                    <div class="d-flex justify-content-start flex-wrap gap-3">
                        @foreach ($popularCities as $city)
                            <div class="location-card text-center select-location" data-city="{{ $city->city_name }}">
                                <img src="{{ asset($city->city_image ? 'uploads/city/' . $city->city_image : 'website/assets/img/default-city.png') }}"
                                    alt="{{ $city->city_name }}" class="img-fluid" style="width: 40px; height: 40px;" />
                                <h6>{{ $city->city_name }}</h6>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <h5>All City</h5>
                    <div class="mt-4 d-flex flex-wrap gap-3">
                        @foreach ($allCities as $city)
                            <p class="mb-0 select-location" data-city="{{ $city->city_name }}" style="cursor: pointer;">
                                {{ $city->city_name }}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dynamic Modal for Query or Announcement -->
    <div class="modal fade" id="announcementQueryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 181px;">
            <div class="modal-content" id="dynamicContent">
                <!-- Content will be injected via JS -->
            </div>
        </div>
    </div>

    <!-- Service Area -->
    <section class="vs-service-wrapper space-top space-md-bottom">
        <div class="parallax" data-parallax-image="{{ asset('website/assets/img/bg/bg-7.jpg') }}"></div>
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="section-title">
                        <span class="h3 text-theme sec-subtitle">Popular lab Test</span>
                        <p>Proactively revolutionize granular customer service after pandemic internal or "organic" sources
                            proactive human capital rather.</p>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel wow fadeIn" data-wow-delay="0.3s" data-slide-show="3">
                @foreach ($labTests as $test)
                    <div class="col-md-4 col-xl-4">
                        <div class="col-xl-12 mb-25">
                            <div class="service-box" style="background-color:#F3F6F7;">
                                <div class="sr-img">
                                    <img class="lab-imag"
                                        src="{{ asset('website/assets/img/6543cdab7e963_youtube.jpg') }}" alt="Image"
                                        class="w-100" style="width: 500px;" />
                                </div><br />
                                <div class="sr-content">
                                    <h3 class="h5">
                                        <a class="text-reset" href="{{ url('/lab-details/' . $test->id) }}">
                                            {{ $test->test->test_name ?? 'Test Name' }}
                                        </a>

                                    </h3>
                                    <h6 style="color: black;">{{ $test->partner->name ?? 'Lab' }}</h6>
                                    <h6 style="font-size: 10px;">
                                        <i class="fas fa-medal"></i>&nbsp;{{ $test->partner->city->city_name ?? 'N/A' }}
                                    </h6>

                                    <del style="color: red; font-size: 18px">₹{{ $test->lab_mrp_price }}</del>
                                    <span style="font-size: 22px">₹{{ $test->offer_price }}</span>
                                    </h6><br><br>
                                    {{-- <a href="{{ url('/lab-details/' . $test->id) }}"><button><i
                                                class="fas fa-eye"></i></button></a>
                                    <!-- Cart Button -->
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cartModal">
                                        <i class="fas fa-cart-plus"></i>
                                    </button> --}}

                                </div>
                                <a href="{{ url('/lab-details/' . $test->id) }}" class="icon-btn style4"><i
                                        class="far fa-long-arrow-alt-right"
                                        style="background-color: rgb(30, 8, 172);"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Repeat for other service boxes -->
            </div>

        </div>
    </section>

    <!-- Health Area -->
    <section class="vs-service-wrapper space-top space-md-bottom">
        <div class="parallax" data-parallax-image="{{ asset('website/assets/img/bg/bg-7.jpg') }}"></div>
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="section-title">
                        <span class="h3 text-theme sec-subtitle">Popular Health Packages</span>
                        <p>Proactively revolutionize granular customer service after pandemic internal or "organic" sources
                            proactive human capital rather.</p>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel wow fadeIn" data-wow-delay="0.3s" data-slide-show="3">
                @foreach ($packages as $package)
                    <div class="col-md-6 col-xl-4">
                        <div class="col-xl-12 mb-25">
                            <div class="service-box">
                                <div class="sr-img">
                                    <img src="{{ asset('' . $package->thumbnail) }}" alt="{{ $package->name }}"
                                        class="w-100" />
                                </div><br>

                                <div class="sr-content">
                                    <h3 class="h4">
                                        <a class="text-reset"
                                            href="{{ url('/health-package-details/' . $package->slug) }}">
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
                <!-- Repeat for other health packages -->
            </div>
        </div>
    </section>

    <!-- Brand Section -->
    <div class="brand-section-six" style="margin-bottom: 20px; padding-bottom: 20px; margin-top: 0;">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="section-title">
                        <span class="h3 text-theme sec-partner">Our Partner</span>
                        <p>Proactively revolutionize granular customer service after pandemic internal or "organic" sources
                            proactive human capital rather.</p>
                    </div>
                </div>
            </div>
            <div class="brand-slider text-center vs-carousel" data-slide-show="5" data-lg-slide-show="4"
                data-md-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="1">
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <!-- Repeat for other brand images -->
            </div>
        </div>
    </div>

    <!-- Service Section -->
    <div class="brand-section-six" style="margin-bottom: 20px; padding-bottom: 20px; margin-top: 0;">
        <div class="container" style="margin-top: 50px;">
            <div class="row text-center justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="section-title">
                        <span class="h3 text-theme sec-subtitle">Our Service</span>
                        <p>Proactively revolutionize granular customer service after pandemic internal or "organic" sources
                            proactive human capital rather.</p>
                    </div>
                </div>
            </div>
            <div class="brand-slider text-center vs-carousel" data-slide-show="5" data-lg-slide-show="4"
                data-md-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="1">
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <div class="brand-img-six">
                    <img src="{{ asset('website/assets/img/brand/brand-6-1.png') }}" alt="image" />
                </div>
                <!-- Repeat for other service images -->
            </div>
        </div>
    </div>

    <!-- Blog Area -->


    <section class="vs-service-wrapper space-top space-md-bottom" style="background-color: rgb(237, 237, 224);">
        <div class="parallax" data-parallax-image="{{ asset('website/assets/img/bg/bg-7.jpg') }}"></div>
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="section-title">
                        <span class="h3 text-theme sec-subtitle">Blog Posts</span>
                        <h2 class="h1">Latest News</h2>
                        <p style="margin-bottom: 20px;">Proactively revolutionize granular customer service after pandemic
                            internal or "organic" sources proactive human capital rather.</p>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel wow fadeInUp" data-wow-delay="0.3s" data-slide-show="3" data-lg-slide-show="2">
                @foreach ($blogs as $blog)
                    <div class="col-xl-4">
                        <div class="vs-blog blog-card">
                            <div class="blog-img">
                                <img class="w-100" src="{{ asset('uploads/blogs/' . $blog->image) }}"
                                    alt="{{ $blog->title }}" />
                            </div>
                            <div class="blog-content">

                                <h3 class="blog-title h5 font-body lh-base"><a class="text-reset"
                                        href="{{ url('blog-details/' . $blog->url) }}">{{ $blog->title }}</a></h3>
                                <span class="post-date d-block text-muted small">
                                    <i class="fal fa-calendar-alt me-1"></i>
                                    {{ \Carbon\Carbon::parse($blog->posting_date)->format('d M, Y') }}
                                </span>
                                <a href="{{ url('blog-details/' . $blog->url) }}" class="link-btn">Read More<i
                                        class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Repeat for other blog posts -->
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const locationModal = document.getElementById('locationModal');

            locationModal.addEventListener('hidden.bs.modal', function() {
                // Ajax call to fetch active home announcement
                fetch("{{ route('get.home.announcement') }}")
                    .then(response => response.json())
                    .then(data => {
                        const contentContainer = document.getElementById("dynamicContent");
                        const imageTemplate =
                            `<img src="__IMAGE_URL__" alt="Announcement Image" class="img-fluid mb-3" />`;
                        const fixedImageUrl = data.data.image_url.replace("uploads/home_announcement/",
                            ""); // clean the path
                        const imageTag = imageTemplate.replace('__IMAGE_URL__', fixedImageUrl);

                        if (data.status === 'success') {
                            let html = '';

                            // If announcement type
                            if (data.data.display_announcement == 1) {
                                html += `
                            <div class="modal-header">
                                <h5 class="modal-title">${data.data.title}</h5>
                                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                            </div>
                            <div class="modal-body text-center">
                                ${imageTag}
                                <div><a href="${data.data.link}" target="_blank" class="btn btn-primary">Link</a></div>
                            </div>`;
                            }
                            // If query form type
                            else if (data.data.display_query_form == 1) {
                                html += `
                            <div class="modal-header">
                                <h5 class="modal-title">${data.data.title}</h5>
                                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('submit.query.form') }}" method="POST">
                                    @csrf
                                    ${data.data.show_name_field ? `<div class="mb-2"><input type="text" name="name" class="form-control" placeholder="Name"></div>` : ''}
                                    ${data.data.show_email_field ? `<div class="mb-2"><input type="email" name="email" class="form-control" placeholder="Email"></div>` : ''}
                                    ${data.data.show_phone_field ? `<div class="mb-2"><input type="text" name="phone" class="form-control" placeholder="Phone"></div>` : ''}
                                    ${data.data.show_message_field ? `<div class="mb-2"><textarea name="message" class="form-control" placeholder="Message"></textarea></div>` : ''}
                                    <button type="submit" class="btn btn-success">${data.data.button_name || 'Submit'}</button>
                                </form>
                            </div>`;
                            }

                            contentContainer.innerHTML = html;

                            // Show the modal
                            const queryModal = new bootstrap.Modal(document.getElementById(
                                'announcementQueryModal'));
                            queryModal.show();
                        }
                    });
            });
        });
    </script>
@endsection
