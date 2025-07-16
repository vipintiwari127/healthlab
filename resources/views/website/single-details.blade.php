@extends('website.layout.header')
@section('main-content')
    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
            // or use toastr.success('{{ session('success') }}');
        </script>
    @endif

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
    <!--==============================  Breadcumb ============================== -->
    <div class="breadcumb-wrapper">
        <div class="parallax" data-parallax-image="{{ asset('website/assets/img/breadcurmb/breadcurmb-1-1.jpg') }}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Lab Details</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Lab Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--============================== Shop Products Details ==============================-->
    <section class="vs-shop-details space-top space-md-bottom">
        <div class="container">
            <div class="shop-wrap1 mb-80 bg-smoke">
                <div class="row">
                    <div class="col-lg-3 col-xl-4 mb-30 mb-lg-0">
                        <div class="product-big-img mb-4">
                            <!-- <p class="price">₹989<del>₹799</del></p> -->
                            <div class="img-fullsize">
                                <img class="lab-imag" src="{{ asset('website/assets/img/6543cdab7e963_youtube.jpg') }}"
                                    alt="Image" class="w-100" style="width: 500px;" />
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
                                        {{ $labTest->test_name }}
                                    </h2>

                                    <div class="product_meta">
                                        <span style="color: black;"><b>Lab Name:</b>
                                            <span class="sku" style="color: black;">
                                                {{ $labTest->partner->name ?? 'N/A' }}</span> <br>
                                            <span style="color: black;"><b>Address: </b>
                                                <span class="sku" style="color: black;"> <i
                                                        class="far fa-map-marker-alt"></i>&nbsp;{{ $labTest->partner->address ?? 'N/A' }}</span>
                                                <br>
                                                <span style="color: black;"><b>Net Price:</b> <del style="color:red;">₹
                                                        {{ $labTest->lab_net_price }}</del></span><br>
                                                <span style="color: black;"><b>Offer Price:</b> ₹
                                                    {{ $labTest->offer_price }}</span><br>
                                                <span style="color: black;"><b>Reporting Time :</b>
                                                    {{ $labTest->reporting_time }}</span><br>
                                                <span style="color: black;"><b>Specimen Requirement:</b>
                                                    {{ $labTest->specimen_requirement }}</span><br>
                                                <br />
                                                <a href="#" class="vs-btn style2"
                                                    style="background-color: blue; color: white;" data-bs-toggle="modal"
                                                    data-bs-target="#cartModal"
                                                    data-labname="{{ $labTest->partner->name ?? 'N/A' }}"
                                                    data-address="{{ $labTest->partner->address ?? 'N/A' }}"
                                                    data-netprice="{{ $labTest->lab_net_price }}"
                                                    data-offerprice="{{ $labTest->offer_price }}"
                                                    data-reporttime="{{ $labTest->reporting_time }}">
                                                    Add To Cart
                                                    <i class="fas fa-chevron-right" style="background-color: blue;"></i>
                                                </a>

                                                <!-- Button to open modal -->
                                                <a href="#" class="vs-btn style2"
                                                    style="background-color: blue; color: white;" data-bs-toggle="modal"
                                                    data-bs-target="#callbackModal">
                                                    Get Call Back <i class="fas fa-chevron-right"
                                                        style="background-color: blue;"></i>
                                                </a>

                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="callbackModal" tabindex="-1" aria-labelledby="callbackModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="callbackModalLabel">Request a Call Back</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form action="{{ route('submit.callback') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                required>
                                        </div>

                                        <div class="mb-2">
                                            <label for="mobile" class="form-label">Mobile Number</label>
                                            <input type="tel" id="mobile" name="mobile" class="form-control"
                                                required>
                                        </div>

                                        <div class="mb-2">
                                            <label for="location" class="form-label">Location</label>
                                            <input type="text" id="location" name="location" class="form-control"
                                                required>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="cartModalLabel">Add to Cart</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div id="labDetails" class="mb-3" style="font-size: 14px; color: black;">
                                        <p><b>Lab Name:</b> <span id="labNameText">N/A</span></p>
                                        <p><b>Address:</b> <span id="labAddressText">N/A</span></p>
                                        <p><b>Net Price:</b> ₹ <del style="color:red;" id="labNetPriceText">0.00</del></p>
                                        <p><b>Offer Price:</b> ₹ <span id="labOfferPriceText">0.00</span></p>
                                        <p><b>Reporting Time:</b> <span id="labReportTimeText">--</span></p>
                                    </div>

                                    <!-- Lab/Home Buttons -->
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-outline-primary"
                                            onclick="showFields('lab')">Lab</button>
                                        <button type="button" class="btn btn-outline-success"
                                            onclick="showFields('home')">Home</button>
                                    </div>

                                    <!-- LAB FORM -->
                                    <div id="labFields" style="display: none;">
                                        <form action="{{ route('submit.labcart') }}" method="POST"
                                            class="needs-validation" novalidate>
                                            @csrf
                                            <input type="hidden" name="type" value="lab">
                                            <!-- Lab Detail Hidden Inputs -->
                                            <input type="hidden" name="lab_name" id="labNameInput">
                                            <input type="hidden" name="lab_address" id="labAddressInput">
                                            <input type="hidden" name="lab_net_price" id="labNetPriceInput">
                                            <input type="hidden" name="lab_offer_price" id="labOfferPriceInput">
                                            <input type="hidden" name="lab_report_time" id="labReportTimeInput">

                                            <div class="modal-header">
                                                <h5 class="modal-title">Lab Test</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body row g-3 px-4">
                                                <div class="col-md-12">
                                                    <label class="form-label">Patient Name</label>
                                                    <input name="patient_name" type="text" class="form-control"
                                                        required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Age</label>
                                                    <input name="age" type="number" class="form-control" required
                                                        min="0">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Gender</label>
                                                    <select name="gender" class="form-control" required>
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Date</label>
                                                    <input name="date" type="date" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Time</label>
                                                    <input name="time" type="time" class="form-control" required>
                                                </div>
                                                <div class="col-md-12 text-end pt-3">
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- HOME FORM -->
                                    <div id="homeFields" style="display: none;">
                                        <form action="{{ route('submit.labcart') }}" method="POST"
                                            class="needs-validation" novalidate>
                                            @csrf
                                            <input type="hidden" name="type" value="home">
                                            <!-- Lab Detail Hidden Inputs -->
                                            <input type="hidden" name="lab_name" id="labNameInput">
                                            <input type="hidden" name="lab_address" id="labAddressInput">
                                            <input type="hidden" name="lab_net_price" id="labNetPriceInput">
                                            <input type="hidden" name="lab_offer_price" id="labOfferPriceInput">
                                            <input type="hidden" name="lab_report_time" id="labReportTimeInput">

                                            <div class="modal-header">
                                                <h5 class="modal-title">Home Test</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body row g-3 px-4">
                                                <div class="col-md-12">
                                                    <label class="form-label">Patient Name</label>
                                                    <input name="patient_name" type="text" class="form-control"
                                                        required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Age</label>
                                                    <input name="age" type="number" class="form-control" required
                                                        min="0">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Gender</label>
                                                    <select name="gender" class="form-control" required>
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label class="form-label">Date</label>
                                                    <input name="date" type="date" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Time</label>
                                                    <input name="time" type="time" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">PinCode</label>
                                                    <input name="pincode" type="number" class="form-control" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Address</label>
                                                    <input name="address" type="text" class="form-control" required>
                                                </div>
                                                <div class="col-md-12 text-end pt-3">
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // function showFields(option) {
        //     if (option === 'lab') {
        //         document.getElementById('labFields').style.display = 'block';
        //         document.getElementById('homeFields').style.display = 'none';
        //     } else if (option === 'home') {
        //         document.getElementById('labFields').style.display = 'none';
        //         document.getElementById('homeFields').style.display = 'block';
        //     }
        // }
        // Initialize the modal with the labFields hidden
        const cartModal = document.getElementById('cartModal');
        cartModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;

            const labName = button.getAttribute('data-labname');
            const address = button.getAttribute('data-address');
            const netPrice = button.getAttribute('data-netprice');
            const offerPrice = button.getAttribute('data-offerprice');
            const reportTime = button.getAttribute('data-reporttime');

            document.getElementById('labNameText').textContent = labName;
            document.getElementById('labAddressText').textContent = address;
            document.getElementById('labNetPriceText').textContent = netPrice;
            document.getElementById('labOfferPriceText').textContent = offerPrice;
            document.getElementById('labReportTimeText').textContent = reportTime;
        });

        function copyLabDetailsToInputs() {
            document.querySelectorAll("#labNameInput").forEach(el => el.value = document.getElementById("labNameText")
                .textContent);
            document.querySelectorAll("#labAddressInput").forEach(el => el.value = document.getElementById(
                "labAddressText").textContent);
            document.querySelectorAll("#labNetPriceInput").forEach(el => el.value = document.getElementById(
                "labNetPriceText").textContent);
            document.querySelectorAll("#labOfferPriceInput").forEach(el => el.value = document.getElementById(
                "labOfferPriceText").textContent);
            document.querySelectorAll("#labReportTimeInput").forEach(el => el.value = document.getElementById(
                "labReportTimeText").textContent);
        }

        // Attach before each form submits
        document.querySelectorAll("form").forEach(form => {
            form.addEventListener("submit", copyLabDetailsToInputs);
        });

        // Show/Hide logic
        function showFields(type) {
            document.getElementById('labFields').style.display = type === 'lab' ? 'block' : 'none';
            document.getElementById('homeFields').style.display = type === 'home' ? 'block' : 'none';
        }
    </script>
@endsection
