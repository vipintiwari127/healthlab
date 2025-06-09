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
        <div class="parallax" data-parallax-image="{{ asset('website/assets/img/breadcurmb/breadcurmb-1-1.jpg')}}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">lab</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Lab</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <header class="header-section">
        <div class="container">
            <!-- <div class="header-subtitle">Blood Test at Home in Delhi</div> -->
            <h1 class="header-title"><span>Drive</span> Your Health</h1>

            <!-- Search Card -->
            <div class="search-card">
                <!-- Search Options -->
                <div class="search-options">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <button class="option-btn option-btn-primary w-100">
                                <i class="fas fa-vial"></i> Search by Test
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button class="option-btn option-btn-outline w-100">
                                <i class="fas fa-flask"></i> Search by Lab
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Search Input -->
                <div class="row g-3">
                    <div class="col-md-8">
                        <input type="text" class="search-input form-control" placeholder="Search Tests and Packages"
                            id="searchInput" />
                    </div>
                    <div class="col-md-4">
                        <button class="continue-btn w-100" id="continueBtn" disabled>
                            Continue
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="feature-text">Choose from<br />3000+ Tests</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-microscope"></i>
                        </div>
                        <div class="feature-text">Choose from<br />1500+ Labs</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="feature-text">
                            Sample collection<br />at your convenience
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
                Service Area
                ==============================-->
    <section class="vs-service-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xl-4">
                    <div class="col-xl-12 mb-25">
                        <div class="service-box" style="background-color:#F3F6F7;">
                            <div class="sr-img">
                                <img src="{{ asset('website/assets/img/6543cdab7e963_youtube.jpg')}}" alt="Service Image" class="w-100" />
                            </div>
                            <br />
                            <!-- <div class="sr-icon">
                              <img
                                src="assets/img/service/sr-2-1.jpg"
                                alt="Service Image"
                                class="w-50"
                              />
                            </div> -->
                            <div class="sr-content">
                                <h3 class="h5">
                                    <a class="text-reset" href="single-lab.html">ANTI HEV IGG</a>
                                </h3>
                                <h6 style="color: black;">PS.PATHLAB SARASWATI VIHAR</h6>
                                <h6 style="font-size: 10px;"><i class="fas fa-medal"></i>&nbsp;Rohini</h6>
                                <h6>
                                    <del style="color: red; font-size: 18px">₹650</del>
                                    <span style="font-size: 22px">₹300</span>
                                </h6>
                                <button><i class="fas fa-eye"></i></button>
                                <button><i class="fas fa-cart-plus"></i></button>
                            </div>
                            <a href="single-lab.html" class="icon-btn style4"><i
                                    class="far fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="col-xl-12 mb-25">
                        <div class="service-box" style="background-color:#F3F6F7;">
                            <div class="sr-img">
                                <img src="{{ asset('website/assets/img/6543cdab7e963_youtube.jpg')}}" alt="Service Image" class="w-100" />
                            </div>
                            <br />
                            <!-- <div class="sr-icon">
                              <img
                                src="assets/img/service/sr-2-1.jpg"
                                alt="Service Image"
                                class="w-50"
                              />
                            </div> -->
                            <div class="sr-content">
                                <h3 class="h5">
                                    <a class="text-reset" href="single-lab.html">ANTI HEV IGG</a>
                                </h3>
                                <h6 style="color: black;">PS.PATHLAB SARASWATI VIHAR</h6>
                                <h6 style="font-size: 10px;"><i class="fas fa-medal"></i>&nbsp;Rohini</h6>
                                <h6>
                                    <del style="color: red; font-size: 18px">₹650</del>
                                    <span style="font-size: 22px">₹300</span>
                                </h6>
                                <button><i class="fas fa-eye"></i></button>
                                <button><i class="fas fa-cart-plus"></i></button>
                            </div>
                            <a href="single-lab.html" class="icon-btn style4"><i
                                    class="far fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="col-xl-12 mb-25">
                        <div class="service-box" style="background-color:#F3F6F7;">
                            <div class="sr-img">
                                <img src="{{ asset('website/assets/img/6543cdab7e963_youtube.jpg')}}" alt="Service Image" class="w-100" />
                            </div>
                            <br />
                            <!-- <div class="sr-icon">
                              <img
                                src="assets/img/service/sr-2-1.jpg"
                                alt="Service Image"
                                class="w-50"
                              />
                            </div> -->
                            <div class="sr-content">
                                <h3 class="h5">
                                    <a class="text-reset" href="single-lab.html">ANTI HEV IGG</a>
                                </h3>
                                <h6 style="color: black;">PS.PATHLAB SARASWATI VIHAR</h6>
                                <h6 style="font-size: 10px;"><i class="fas fa-medal"></i>&nbsp;Rohini</h6>
                                <h6>
                                    <del style="color: red; font-size: 18px">₹650</del>
                                    <span style="font-size: 22px">₹300</span>
                                </h6>
                                <button><i class="fas fa-eye"></i></button>
                                <button><i class="fas fa-cart-plus"></i></button>
                            </div>
                            <a href="single-lab.html" class="icon-btn style4"><i
                                    class="far fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="col-xl-12 mb-25">
                        <div class="service-box" style="background-color:#F3F6F7;">
                            <div class="sr-img">
                                <img src="{{ asset('website/assets/img/6543cdab7e963_youtube.jpg')}}" alt="Service Image" class="w-100" />
                            </div>
                            <br />
                            <!-- <div class="sr-icon">
                              <img
                                src="assets/img/service/sr-2-1.jpg"
                                alt="Service Image"
                                class="w-50"
                              />
                            </div> -->
                            <div class="sr-content">
                                <h3 class="h5">
                                    <a class="text-reset" href="single-lab.html">ANTI HEV IGG</a>
                                </h3>
                                <h6 style="color: black;">PS.PATHLAB SARASWATI VIHAR</h6>
                                <h6 style="font-size: 10px;"><i class="fas fa-medal"></i>&nbsp;Rohini</h6>
                                <h6>
                                    <del style="color: red; font-size: 18px">₹650</del>
                                    <span style="font-size: 22px">₹300</span>
                                </h6>
                                <button><i class="fas fa-eye"></i></button>
                                <button><i class="fas fa-cart-plus"></i></button>
                            </div>
                            <a href="single-lab.html" class="icon-btn style4"><i
                                    class="far fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="col-xl-12 mb-25">
                        <div class="service-box" style="background-color:#F3F6F7;">
                            <div class="sr-img">
                                <img src="{{ asset('website/assets/img/6543cdab7e963_youtube.jpg')}}" alt="Service Image" class="w-100" />
                            </div>
                            <br />
                            <!-- <div class="sr-icon">
                              <img
                                src="assets/img/service/sr-2-1.jpg"
                                alt="Service Image"
                                class="w-50"
                              />
                            </div> -->
                            <div class="sr-content">
                                <h3 class="h5">
                                    <a class="text-reset" href="single-lab.html">ANTI HEV IGG</a>
                                </h3>
                                <h6 style="color: black;">PS.PATHLAB SARASWATI VIHAR</h6>
                                <h6 style="font-size: 10px;"><i class="fas fa-medal"></i>&nbsp;Rohini</h6>
                                <h6>
                                    <del style="color: red; font-size: 18px">₹650</del>
                                    <span style="font-size: 22px">₹300</span>
                                </h6>
                                <button><i class="fas fa-eye"></i></button>
                                <button><i class="fas fa-cart-plus"></i></button>
                            </div>
                            <a href="single-lab.html" class="icon-btn style4"><i
                                    class="far fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="col-xl-12 mb-25">
                        <div class="service-box" style="background-color:#F3F6F7;">
                            <div class="sr-img">
                                <img src="{{ asset('website/assets/img/6543cdab7e963_youtube.jpg')}}" alt="Service Image" class="w-100" />
                            </div>
                            <br />
                            <!-- <div class="sr-icon">
                              <img
                                src="assets/img/service/sr-2-1.jpg"
                                alt="Service Image"
                                class="w-50"
                              />
                            </div> -->
                            <div class="sr-content">
                                <h3 class="h5">
                                    <a class="text-reset" href="single-lab.html">ANTI HEV IGG</a>
                                </h3>
                                <h6 style="color: black;">PS.PATHLAB SARASWATI VIHAR</h6>
                                <h6 style="font-size: 10px;"><i class="fas fa-medal"></i>&nbsp;Rohini</h6>
                                <h6>
                                    <del style="color: red; font-size: 18px">₹650</del>
                                    <span style="font-size: 22px">₹300</span>
                                </h6>
                                <button><i class="fas fa-eye"></i></button>
                                <button><i class="fas fa-cart-plus"></i></button>
                            </div>
                            <a href="single-lab.html" class="icon-btn style4"><i
                                    class="far fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="col-xl-12 mb-25">
                        <div class="service-box" style="background-color:#F3F6F7;">
                            <div class="sr-img">
                                <img src="{{ asset('website/assets/img/6543cdab7e963_youtube.jpg')}}" alt="Service Image" class="w-100" />
                            </div>
                            <br />
                            <!-- <div class="sr-icon">
                              <img
                                src="assets/img/service/sr-2-1.jpg"
                                alt="Service Image"
                                class="w-50"
                              />
                            </div> -->
                            <div class="sr-content">
                                <h3 class="h5">
                                    <a class="text-reset" href="single-lab.html">ANTI HEV IGG</a>
                                </h3>
                                <h6 style="color: black;">PS.PATHLAB SARASWATI VIHAR</h6>
                                <h6 style="font-size: 10px;"><i class="fas fa-medal"></i>&nbsp;Rohini</h6>
                                <h6>
                                    <del style="color: red; font-size: 18px">₹650</del>
                                    <span style="font-size: 22px">₹300</span>
                                </h6>
                                <button><i class="fas fa-eye"></i></button>
                                <button><i class="fas fa-cart-plus"></i></button>
                            </div>
                            <a href="single-lab.html" class="icon-btn style4"><i
                                    class="far fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="col-xl-12 mb-25">
                        <div class="service-box" style="background-color:#F3F6F7;">
                            <div class="sr-img">
                                <img src="{{ asset('website/assets/img/6543cdab7e963_youtube.jpg')}}" alt="Service Image" class="w-100" />
                            </div>
                            <br />
                            <!-- <div class="sr-icon">
                              <img
                                src="assets/img/service/sr-2-1.jpg"
                                alt="Service Image"
                                class="w-50"
                              />
                            </div> -->
                            <div class="sr-content">
                                <h3 class="h5">
                                    <a class="text-reset" href="single-lab.html">ANTI HEV IGG</a>
                                </h3>
                                <h6 style="color: black;">PS.PATHLAB SARASWATI VIHAR</h6>
                                <h6 style="font-size: 10px;"><i class="fas fa-medal"></i>&nbsp;Rohini</h6>
                                <h6>
                                    <del style="color: red; font-size: 18px">₹650</del>
                                    <span style="font-size: 22px">₹300</span>
                                </h6>
                                <button><i class="fas fa-eye"></i></button>
                                <button><i class="fas fa-cart-plus"></i></button>
                            </div>
                            <a href="single-lab.html" class="icon-btn style4"><i
                                    class="far fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="col-xl-12 mb-25">
                        <div class="service-box" style="background-color:#F3F6F7;">
                            <div class="sr-img">
                                <img src="{{ asset('website/assets/img/6543cdab7e963_youtube.jpg')}}" alt="Service Image" class="w-100" />
                            </div>
                            <br />
                            <!-- <div class="sr-icon">
                              <img
                                src="assets/img/service/sr-2-1.jpg"
                                alt="Service Image"
                                class="w-50"
                              />
                            </div> -->
                            <div class="sr-content">
                                <h3 class="h5">
                                    <a class="text-reset" href="single-lab.html">ANTI HEV IGG</a>
                                </h3>
                                <h6 style="color: black;">PS.PATHLAB SARASWATI VIHAR</h6>
                                <h6 style="font-size: 10px;"><i class="fas fa-medal"></i>&nbsp;Rohini</h6>
                                <h6>
                                    <del style="color: red; font-size: 18px">₹650</del>
                                    <span style="font-size: 22px">₹300</span>
                                </h6>
                                <button><i class="fas fa-eye"></i></button>
                                <button><i class="fas fa-cart-plus"></i></button>
                            </div>
                            <a href="single-lab.html" class="icon-btn style4"><i
                                    class="far fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
@endsection
