<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <!-- <meta http-equiv="x-ua-compatible" content="ie=edge" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical and Health Care</title>


    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--==============================
 Google Web Fonts
 ============================== -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" /> -->
    <link
        href="{{ asset('website/assets/css/css2?family=Dancing+Script:wght@400;700&family=Quicksand:wght@400;700&family=Roboto:wght@400;500;700&display=swap') }}"
        rel="stylesheet" />

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="{{ asset('website/assets/img/favicon.ico') }}" type="image/x-icon" />
    <link rel="icon" href="{{ asset('website/assets/img/favicon.ico') }}" type="image/x-icon" />

    <!--==============================
 All CSS File
 ============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/bootstrap.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{asset('website/assets/css/app.min.css')}}"> --}}
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/fontawesome.min.css') }}" />

    <!-- Layerslider -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/layerslider.min.css') }}" />
    <!-- jQuery DatePicker -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/jquery.datetimepicker.min.css') }}" />
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/magnific-popup.min.css') }}" />
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/slick.min.css') }}" />
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/animate.min.css') }}" />
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/search.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/header.css') }}" />

</head>

<body>
    <!--==============================
     Preloader
  ==============================-->
    <div class="preloader">
        <div class="preloader-inner">
            <svg width="88px" height="108px" viewbox="0 0 54 64">
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <path class="beat-loader"
                        d="M0.5,38.5 L16,38.5 L19,25.5 L24.5,57.5 L31.5,7.5 L37.5,46.5 L43,38.5 L53.5,38.5"
                        id="Path-2" stroke-width="2"></path>
                </g>
            </svg>
        </div>
    </div>
    <!--==============================
    Mobile Menu
  ============================== -->
    <div class="vs-menu-wrapper">
        <div class="vs-menu-area text-center">
            {{-- <button class="vs-menu-"><i class="fal fa-times"></i></button> --}}
            <div class="mobile-logo">
                <a href="index.html"><img
                        src="{{ asset('website/assets/img/6543cdab7e963_youtube-removebg-preview.png') }}" /></a>
            </div>

            <div class="vs-mobile-menu">
                <ul>
                    <li class="menu-item-has-children">
                        <a href="{{ '/' }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ '/about' }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ '/blog' }}">Blog</a>
                    </li>
                    <li>
                        <a href="{{ '/lab' }}">Lab</a>
                    </li>
                    <li>
                        <a href="{{ '/fqa' }}">FAQ</a>
                    </li>
                    <li>
                        <a href="{{ '/contact' }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--==============================
        Header Area
    ==============================-->
    <header class="header-wrapper header-layout1">
        <!-- Header Top -->
        <div class="header-top bg-title py-2 d-none d-md-block">
            <div class="container container-style1 py-1">
                <div class="row justify-content-center justify-content-xl-between">
                    <div class="col-auto">

                    </div>
                    <div class="col-auto d-none d-xl-block">
                        <ul class="header-top-info list-unstyled m-0">
                            <li>
                                <ul class="header-social">
                                    <li>
                                        <i class="far fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:support@hospital.com"
                                            class="text-reset">support@hospital.com</a>
                                    </li>
                                    <li>
                                        <i class="far fa-phone-alt"></i>&nbsp;
                                        <a href="tel:9205394886" class="text-reset">+91 9205394886</a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- Sticky Active -->
        <div class="sticky-wrap">
            <div class="sticky-active">
                <!-- Header Main -->
                <div class="header-main" style="background-color: #FEC107;">
                    <div class="container container-style1 position-relative">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="header1-logo py-2">
                                    <a href="index.html"><img
                                            src="{{ asset('website/assets/img/6543cdab7e963_youtube-removebg-preview.png') }}"
                                            class="mobile-logo" alt="Logo" /></a>
                                </div>
                            </div>

                            <div class="col text-end text-lg-center">
                                <nav class="main-menu menu-style1 d-none d-lg-block">
                                    <ul>
                                        <li>
                                            <a href="{{ '/' }}">Home </a>
                                        </li>
                                        <li>
                                            <a href="{{ '/lab' }}">Lab Test</a>
                                        </li>
                                        <li>
                                            <a href="{{ '/health-package' }}">Health Packege</a>
                                        </li>

                                    </ul>
                                </nav>
                                </button>
                                <a href="#" class="d-inline-block d-lg-none"><i class="fas fa-map-marker-alt"
                                        style="font-size: 20px; margin-top: 10px; "></i></a>
                                <h6 class="d-lg-none selected-location">Delhi</h6>
                                </button>
                            </div>
                            <div
                                class="mobile-extra-navbar d-block d-md-none py-2 px-3 bg-light border-top border-bottom">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#" class="text-dark fw-semibold">Upload Prescription</a>
                                    <a href="#" class="text-dark fw-semibold">Lab Report</a>
                                </div>
                            </div>

                            <div class="col-auto gap-2 d-none d-lg-flex">
                                <a href="cart.html" class="icon-btn has-badge d-none d-xxl-inline-block"><i
                                        class="far fa-shopping-cart"></i><span class="badge">3</span></a>
                                <ol class="login" id="locationDisplay">
                                    <i class="far fa-map-marker-alt"></i>
                                    <span class="selected-location">36D Street Brooklyn, New York</span>
                                </ol>
                            </div>


                            <div class="col-auto d-none-xxxl">
                                <div class="header-call phone-box d-flex align-items-center style2">
                                    <a href="tel:66925682596" class="box-icon"><i class="fas fa-phone-alt"></i></a>
                                    <div class="media-body">
                                        <span class="fs-xs text-title">Call Anytime</span>
                                        <p class="h4 fw-bold lh-1 mb-0">
                                            <a href="tel:66925682596">669 2568 2596</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="header-top bg-title py-2 d-none d-md-block">
        <div class="container container-style1 py-1">
            <div class="row justify-content-center justify-content-xl-between">
                <div class="col-auto">
                    <ul class="header-top-info list-unstyled m-0">
                        <li>
                            <a href="#" class="text-reset">My Booking</a>
                        </li>
                        <li>

                            <a href="#" class="text-reset">Upload Preciption</a>
                        </li>

                        <li>
                            <a href="#" class="text-reset">Report Card</a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto d-none d-xl-block">

                </div>
            </div>
        </div>
    </div>

    @yield('main-content')

    <!--==============================
      Footer Area
    ==============================-->
    <footer class="footer-wrapper footer-layout1" style="background-color: #FEC107;">
        <div class="container">
            <div class="row justify-content-between align-items-start py-5">

                <!-- Logo and About -->
                <div class="col-md-6 col-lg-3">
                    <div class="footer1-logo bg-white text-center text-md-start mb-3">
                        <a href="index.html">
                            <img src="{{ asset('website/assets/img/6543cdab7e963_youtube-removebg-preview.png') }}"
                                alt="Logo"
                                style="background-color: #FEC107; max-height: 150px; margin-top:-59px; object-fit: contain;" />
                        </a>
                    </div>
                    <div class="widget footer-widget">
                        <h3 class="widget_title">About Us</h3>
                        <p>
                            Energistically reintermediate worldwide interfaces vis-a-vis
                            emerging integrate leadership skills.
                        </p>
                        <h4 class="mt-3">
                            <a class="text-theme hover-white" href="tel:693232512456">
                                <i class="fas fa-phone-volume me-2 pe-1"></i> 693 2325 12456
                            </a>
                        </h4>
                    </div>
                </div>

                <!-- Navigation Links 1 -->
                <div class="col-md-6 col-lg-2">
                    <div class="widget footer-widget widget_nav_menu">
                        <h3 class="widget_title">Quick Links</h3>
                        <ul class="menu">
                            <li><a href="{{ '/about' }}">About Us</a></li>
                            <li><a href="{{ '/blog' }}">Blog</a></li>
                            <li><a href="{{ '/lab' }}">Labs</a></li>
                            <li><a href="{{ '/health-package' }}">Health</a></li>
                            <li><a href="{{ '/fqa' }}">FAQ</a></li>
                            <li><a href="{{ '/contact' }}">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Navigation Links 2 -->
                <div class="col-md-6 col-lg-2">
                    <div class="widget footer-widget widget_nav_menu">
                        <h3 class="widget_title">Packages</h3>
                        <ul class="menu">
                            <li><a href="{{ '/lab' }}">Lab Test</a></li>
                            <li><a href="{{ '/health-package' }}">Health Package</a></li>
                            <li><a href="#">Medical Package</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact and Social -->
                <div class="col-md-6 col-lg-3">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Contact Info</h3>
                        <ul class="menu">
                            <li>Contact: +91 9205394886</li>
                            <li>Email: support@hospital.com</li>
                        </ul>
                    </div>
                    <div class="footer-social mt-3 text-center text-lg-start">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="far fa-basketball-ball"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="copyright bg-theme py-3">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-0 text-white">
                            &copy; 2024 <a class="text-white" href="#">PS.PathLab</a>. All rights reserved.
                        </p>
                    </div>
                    <div class="col-md-6 d-none d-md-block text-end">
                        <ul class="footer-bottom-menu">
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">About</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Mobile Footer Navbar -->
            <div class="mobile-footer-nav d-md-none d-flex justify-content-around mt-3 pb-3 border-top pt-3">
                <a href="index.html"><i class="fas fa-home"></i><span>Home</span></a>
                <a href="https://wa.me/XXXXXXXXXXX"><i class="fab fa-whatsapp"></i><span>WhatsApp</span></a>
                <a href="tel:XXXXXXXXXXX"><i class="fas fa-phone"></i><span>Call</span></a>
                <a href="login.html"><i class="fas fa-user"></i><span>Account</span></a>
                <a href="#" class="vs-menu-toggle"><i class="fas fa-bars"></i><span>Menu</span></a>
            </div>
        </div>
    </footer>


    <!--********************************
   Code End  Here
 ******************************** -->

    <!-- Scroll To Top -->
    <a href="#" class="scrollToTop scroll-bottom style2"><i class="fas fa-arrow-alt-up"></i></a>

    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="{{ asset('website/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('website/assets/js/slick.min.js') }}"></script>
    <!-- <script src="{{ asset('website/assets/js/app.min.js') }}"></script> -->
    <!-- Layerslider -->
    <script src="{{ asset('website/assets/js/layerslider.utils.js') }}"></script>
    <script src="{{ asset('website/assets/js/layerslider.transitions.js') }}"></script>
    <script src="{{ asset('website/assets/js/layerslider.kreaturamedia.jquery.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('website/assets/js/bootstrap.min.js') }}"></script>
    <!-- jQuery Datepicker -->
    <script src="{{ asset('website/assets/js/jquery.datetimepicker.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('website/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('website/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Parallax Scroll -->
    <script src="{{ asset('website/assets/js/universal-parallax.min.js') }}"></script>
    <!-- WOW Animation -->
    <script src="{{ asset('website/assets/js/wow.min.js') }}"></script>
    <!-- Custom Carousel -->
    <script src="{{ asset('website/assets/js/vscustom-carousel.min.js') }}"></script>
    <!-- Form Js -->
    <script src="{{ asset('website/assets/js/ajax-mail.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('website/assets/js/main.js') }}"></script>
    <script>
        // Simple form validation
        const searchInput = document.getElementById("searchInput");
        const continueBtn = document.getElementById("continueBtn");

        searchInput.addEventListener("input", function() {
            if (this.value.trim().length > 0) {
                continueBtn.disabled = false;
                continueBtn.style.backgroundColor = "#4caf50";
            } else {
                continueBtn.disabled = true;
                continueBtn.style.backgroundColor = "#cccccc";
            }
        });

        // Option buttons functionality
        const optionBtns = document.querySelectorAll(".option-btn");
        optionBtns.forEach((btn) => {
            btn.addEventListener("click", function() {
                // Remove active class from all buttons
                optionBtns.forEach((b) => {
                    b.classList.remove("option-btn-primary");
                    b.classList.add("option-btn-outline");
                });

                // Add active class to clicked button
                this.classList.remove("option-btn-outline");
                this.classList.add("option-btn-primary");

                // Update placeholder based on selected option
                if (this.textContent.includes("Test")) {
                    searchInput.placeholder = "Search Tests and Packages";
                } else if (this.textContent.includes("Lab")) {
                    searchInput.placeholder = "Search for Labs";
                } else {
                    searchInput.placeholder =
                        "No search needed for prescription upload";
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Show modal on page load
            const locationModal = new bootstrap.Modal(document.getElementById('locationModal'));
            locationModal.show();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const locationCards = document.querySelectorAll('.select-location');
            const locationTexts = document.querySelectorAll('.selected-location');
            const modalEl = document.getElementById('locationModal');
            let modalInstance;

            // Check if modal is already initialized
            if (bootstrap.Modal.getInstance(modalEl)) {
                modalInstance = bootstrap.Modal.getInstance(modalEl);
            } else {
                modalInstance = new bootstrap.Modal(modalEl);
            }

            const savedLocation = localStorage.getItem('selectedCity');

            if (savedLocation) {
                locationTexts.forEach(el => el.textContent = savedLocation);
            } else {
                // Show the modal only if no location is saved
                modalInstance.show();
            }

            // On city click
            locationCards.forEach(card => {
                card.addEventListener('click', function() {
                    const selectedCity = this.getAttribute('data-city');

                    // Update text
                    locationTexts.forEach(el => el.textContent = selectedCity);

                    // Save to localStorage
                    localStorage.setItem('selectedCity', selectedCity);

                    // Hide the modal
                    modalInstance.hide();
                });
            });
        });
    </script>




</body>

</html>
