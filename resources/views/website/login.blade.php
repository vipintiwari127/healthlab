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

        .form-wrap3 {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f3f6f7;
            border-radius: 12px;
            margin-top: -70px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-title h3 {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
            font-weight: bold;
            color: #333;
        }

        .form-title p {
            text-align: center;
            color: #666;
            font-size: 14px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-control.style3 {
            width: 100%;
            padding: 12px 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .form-group i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }

        .form-btn {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .vs-btn.style2 {
            background-color: #007bff;
            color: #fff;
            padding: 10px 25px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .vs-btn.style2:hover {
            background-color: #0056b3;
        }

        .form-messages {
            text-align: center;
            font-size: 14px;
            color: #d9534f;
        }

        .login {
            margin-top: 10px;
            color: blue
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
        <div class="parallax" data-parallax-image="{{asset('website/assets/img/breadcurmb/breadcurmb-1-1.jpg')}}"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Login Page</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Login</li>
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
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.3s"></div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <form action="mail.php" method="POST" class="ajax-contact form-wrap3 mb-30" data-bg-color="#f3f6f7">
                        <div class="form-title">
                            <h3>Login</h3>
                            <p>Please enter your phone number to receive OTP</p>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control style3" name="phone" id="phone"
                                placeholder="Phone Number*" required />
                            <i class="fal fa-user"></i>
                        </div>

                        <div class="form-group" id="otp-group" style="display: none;">
                            <input type="text" class="form-control style3" name="otp" id="otp"
                                placeholder="OTP*" required />
                            <i class="fal fa-user"></i>
                        </div>

                        <div class="form-btn">
                            <button class="vs-btn style2" type="button" id="otp-btn" onclick="showOTP()">
                                OTP <i class="fas fa-chevron-right"></i>
                            </button>
                            <button class="vs-btn style2" type="submit" id="login-btn" style="display: none;">
                                Login <i class="fas fa-sign-in-alt"></i>
                            </button>
                        </div><br>
                        <h6 style="text-align: center;">Create Account&nbsp;<a href="register.html">Sign Up</a></h6>
                        <p class="form-messages mb-0 mt-3" id="form-msg"></p>
                    </form>
                </div>
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.3s"></div>
            </div>
        </div>
    </section>

    <script>
        function showOTP() {
            const phone = document.getElementById("phone").value.trim();
            const msg = document.getElementById("form-msg");
            if (phone === "") {
                msg.textContent = "⚠ Please enter your phone number before requesting OTP.";
            } else {
                msg.textContent = "";
                document.getElementById("otp-group").style.display = "block";
                document.getElementById("otp-btn").style.display = "none";
                document.getElementById("login-btn").style.display = "inline-block";
            }
        }
    </script>
@endsection
