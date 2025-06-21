<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- loader-->
    <link href="{{ asset('admin/assets/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('admin/assets/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/ac/css2?family=Roboto:wght@400;500&display=swap') }}" rel="stylesheet">

    <!--Theme Styles-->
    <link href="{{ asset('admin/assets/css/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/semi-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/header-colors.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/notifications/css/lobibox.min.css') }}" rel="stylesheet">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Health admin</title>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">
        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('admin/assets/images/logo-icon-2.png') }}" class="logo-icon" alt="logo icon" />
                </div>
                <div>
                    <h4 class="logo-text">Health Lab</h4>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ '/admin/dashboard' }}">
                        <div class="parent-icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                {{-- Booking --}}
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <ion-icon name="bag-handle-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Booking Manage</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ '/admin/booking' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Booking List
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Doctor Manage --}}
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <ion-icon name="bag-handle-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Doctor Manage</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ '/admin/doctor' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Doctor List
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Announcement Manage --}}
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <ion-icon name="bag-handle-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Announcement Manage</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ '/admin/home-announcement' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Home Announcement List
                            </a>
                        </li>
                        <li>
                            <a href="{{ '/admin/website-announcement' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Website Announcement List
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- enquiry table  --}}
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <ion-icon name="bag-handle-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Manage Table list</div>
                    </a>
                    <ul>
                        {{-- PhoneBook --}}
                        <li>
                            <a href="{{ '/admin/phone-book' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>PhoneBook
                            </a>
                        </li>

                        {{-- Subscription List --}}
                        <li>
                            <a href="{{ '/admin/subscription' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Subscription List
                            </a>
                        </li>

                        {{-- Contact Us List --}}
                        <li>
                            <a href="{{ '/admin/contact' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Contact Us List
                            </a>
                        </li>

                        {{-- Query Form List --}}
                        <li>
                            <a href="{{ '/admin/query-report' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Query Form List
                            </a>
                        </li>

                        {{-- Prescription --}}
                        <li>
                            <a href="{{ '/admin/prescription' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Prescription
                            </a>
                        </li>
                        {{-- Billing Report --}}
                        <li>
                            <a href="{{ '/admin/biling-report' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Billing Report
                            </a>
                        </li>

                        {{-- Patiend Report --}}
                        <li>
                            <a href="{{ '/admin/patient-report' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Patiend Report
                            </a>
                        </li>

                        {{-- Call Back List --}}
                        <li>
                            <a href="{{ '/admin/call-Back' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Call Back List
                            </a>
                        </li>

                        {{-- Career Enquiry --}}
                        <li>
                            <a href="{{ '/admin/career-enquiry' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Career Enquiry
                            </a>
                        </li>

                        {{-- FeedBacks --}}
                        <li>
                            <a href="{{ '/admin/feedback' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>FeedBacks
                            </a>
                        </li>
                        {{-- Call Center Enquiry --}}
                        <li>
                            <a href="{{ '/admin/call-center-enquiry' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Call Center Enquiry
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- pages --}}
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <ion-icon name="bag-handle-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Pages</div>
                    </a>
                    <ul>
                        <li>
                            <a href="ecommerce-shop-list-view.html">
                                <ion-icon name="ellipse-outline"></ion-icon>View Pages
                            </a>
                        </li>
                        {{-- SEO Management --}}
                        <li>
                            <a href="{{ '/admin/seo-management' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>SEO Management
                            </a>
                        </li>

                        {{-- Blog --}}
                        <li>
                            <a href="{{ '/admin/blog' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Blog
                            </a>
                        </li>

                        {{-- Review --}}
                        <li>
                            <a href="{{ '/admin/review' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Review
                            </a>
                        </li>

                        {{-- FAQ's --}}
                        <li>
                            <a href="{{ '/admin/faq' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>FAQ's
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- bussiness partner --}}
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <ion-icon name="bag-handle-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Our Bussiness Partner</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ '/admin/business' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Bussiness Partner
                            </a>
                        </li>
                        <li>
                            <a href="{{ '/admin/lab-partner' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Lab partner
                            </a>
                        </li>
                        <li>
                            <a href="{{ '/admin/all-test' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Add All Test
                                Filters
                            </a>
                        </li>
                        <li>
                            <a href="{{ '/admin/lab-test' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Lab Test
                            </a>
                        </li>
                        <li>
                            <a href="{{ '/admin/category' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Category
                            </a>
                        </li>
                        <li>
                            <a href="{{ '/admin/package' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Package
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- master setup --}}
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <ion-icon name="bag-handle-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Master Setup Manage</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ '/admin/master-setup' }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Master Setup List
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <ion-icon name="bag-handle-outline"></ion-icon>
                        </div>
                        <div class="menu-title">Manage Setting</div>
                    </a>
                    <ul>
                        {{-- Manage admin Users --}}
                        <li>
                            <a href="ecommerce-checkout-shipping.html">
                                <ion-icon name="ellipse-outline"></ion-icon>Manage admin Users
                            </a>
                        </li>

                        {{-- Setting --}}
                        <li>
                            <a href="{{"/admin/setting"}}">
                                <ion-icon name="ellipse-outline"></ion-icon>Setting
                            </a>    
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end navigation-->
        </aside>
        <!--end sidebar -->

        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand gap-3">
                <div class="toggle-icon">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="top-navbar-right ms-auto">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link dark-mode-icon" href="javascript:;">
                                <div class="mode-icon">
                                    <ion-icon name="moon-outline"></ion-icon>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-user-setting">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                data-bs-toggle="dropdown">
                                <div class="user-setting">
                                    <img src="{{ asset('admin/assets/images/avatars/06.png') }}" class="user-img"
                                        alt="" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex flex-row align-items-center gap-2">
                                            <img src="{{ asset('admin/assets/images/avatars/06.png') }}"
                                                alt="" class="rounded-circle" width="54"
                                                height="54" />
                                            <div class="">
                                                <h6 class="mb-0 dropdown-user-name">Admin</h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ '/admin/logout' }}">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <ion-icon name="log-out-outline"></ion-icon>
                                            </div>
                                            <div class="ms-3"><span>Logout</span></div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->

        <!-- start page content wrapper-->
        @yield('admin-content')
        <!--end page content wrapper-->

        <!--start footer-->
        <footer class="footer">
            <div class="footer-text">Copyright © 2023. All right reserved.</div>
        </footer>
        <!--end footer-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>
        <!--End Back To Top Button-->

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->
    </div>
    <!--end wrapper-->

    <!-- JS Files-->
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="{{ asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/easyPieChart/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/index.js') }}"></script>
    <!-- Main JS-->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/table-datatable.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/validation/validation-script.js') }}"></script>
    
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>
