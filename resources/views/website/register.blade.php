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
                <h1 class="breadcumb-title">Registeration Page</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Registeration Page</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
                  Contact Form Area
                ==============================-->
    <section class="vs-contact-wrapper vs-contact-layout1 space-top space-md-bottom">
        <div class="container">
            <div class="row gx-60 align-items-center">
                <div class="col-lg-1"></div>
                <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.3s">
                    <form action="mail.php" method="POST" class="ajax-contact form-wrap3 mb-30" data-bg-color="#f3f6f7">
                        <div class="form-title">
                            <h3 class="mt-n2 fls-n2 mb-0" style="text-align: center;">Registration</h3>
                            <p class="text-theme mb-4"style="text-align: center;">Create a new account </p>
                        </div>

                        <div class="row">
                            <!-- Title -->
                            <div class="col-md-4 mb-3">
                                <select class="form-control style3" name="gender" required>
                                    <option value="">Select Title*</option>
                                    <option>Mr.</option>
                                    <option>Mrs.</option>
                                </select>
                            </div>

                            <!-- First Name -->
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control style3" name="first_name"
                                    placeholder="First Name*" required />
                            </div>

                            <!-- Middle Name -->
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control style3" name="middle_name"
                                    placeholder="Middle Name" />
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control style3" name="last_name" placeholder="Last Name*"
                                    required />
                            </div>

                            <!-- Mobile Number -->
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control style3" name="mobile"
                                    placeholder="Mobile Number*" required readonly />
                            </div>

                            <!-- Email ID -->
                            <div class="col-md-4 mb-3">
                                <input type="email" class="form-control style3" name="email" placeholder="Email ID*"
                                    required />
                            </div>

                            <!-- Date of Birth -->
                            <div class="col-md-4 mb-3">
                                <input type="date" class="form-control style3" name="dob"
                                    placeholder="Date of Birth*" required />
                            </div>

                            <!-- Gender -->
                            <div class="col-md-4 mb-3">
                                <select class="form-control style3" name="gender" required>
                                    <option value="">Select Gender*</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>

                            <!-- Marital Status -->
                            <div class="col-md-4 mb-3">
                                <select class="form-control style3" name="marital_status">
                                    <option value="">Select Marital Status</option>
                                    <option>Single</option>
                                    <option>Married</option>
                                    <option>Divorced</option>
                                    <option>Widowed</option>
                                </select>
                            </div>

                            <!-- Blood Group -->
                            <div class="col-md-4 mb-3">
                                <select class="form-control style3" name="blood_group" required>
                                    <option value="">Blood Group*</option>
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                </select>
                            </div>

                            <!-- Emergency Contact -->
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control style3" name="emergency_contact"
                                    placeholder="Emergency Contact" />
                            </div>
                            <!-- Country -->
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control style3" name="country" placeholder="Country*"
                                    required />
                            </div>

                            <!-- State -->
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control style3" name="state" placeholder="State*"
                                    required />
                            </div>

                            <!-- City -->
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control style3" name="city" placeholder="City*"
                                    required />
                            </div>

                            <!-- Pin Code -->
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control style3" name="pin_code" placeholder="Pin Code*"
                                    required />
                            </div>
                            <!-- Address Line 1 -->
                            <div class="col-md-12 mb-3">
                                <textarea rows="2" class="form-control style3" name="address1" placeholder="Address Line 1*" required /></textarea>
                            </div>

                            <!-- Address Line 2 -->
                            <div class="col-md-12 mb-3">
                                <textarea rows="2" class="form-control style3" name="address2" placeholder="Address Line 2" /></textarea>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="form-btn pt-15">
                            <div class="form-btn pt-15" style="display: flex; justify-content: center;">
                                <button class="vs-btn style2">
                                    Submit <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                            <br />
                            <h6 style="text-align: center;">Create Account &nbsp;<a href="login.html">Sign in</a></h6>
                        </div>

                        <!-- <p class="form-messages mb-0 mt-3"></p> -->
                    </form>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </section>
@endsection