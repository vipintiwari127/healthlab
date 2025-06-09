<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- loader-->
    <link href="{{ asset('Admin/assets/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('Admin/assets/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('Admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('Admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/ac/css2?family=Roboto:wght@400;500&display=swap') }}" rel="stylesheet">

    <!--Theme Styles-->
    <link href="{{ asset('Admin/assets/css/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/css/semi-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/css/header-colors.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/plugins/notifications/css/lobibox.min.css') }}" rel="stylesheet">

    <title>Health Admin</title>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">
        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('Admin/assets/images/logo-icon-2.png') }}" class="logo-icon" alt="logo icon" />
                </div>
                <div>
                    <h4 class="logo-text">Health</h4>
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
                        <div class="menu-title">Enquiry Table</div>
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
                            <a href="{{"/admin/query-report"}}">
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
                            <a href="{{"/admin/biling-report"}}">
                                <ion-icon name="ellipse-outline"></ion-icon>Billing Report
                            </a>
                        </li>

                        {{-- Patiend Report --}}
                        <li>
                            <a href="{{"/admin/patient-report"}}">
                                <ion-icon name="ellipse-outline"></ion-icon>Patiend Report
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
                            <a href="ecommerce-shop-grid-view.html">
                                <ion-icon name="ellipse-outline"></ion-icon>Add Pages
                            </a>
                        </li>
                        <li>
                            <a href="ecommerce-shop-list-view.html">
                                <ion-icon name="ellipse-outline"></ion-icon>View Pages
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
                            <a href="{{"/admin/business"}}">
                                <ion-icon name="ellipse-outline"></ion-icon>Bussiness Partner
                            </a>
                        </li>
                        <li>
                            <a href="{{"/admin/lab-partner"}}">
                                <ion-icon name="ellipse-outline"></ion-icon>Lab partner
                            </a>
                        </li>
                        <li>
                            <a href="{{"/admin/all-test"}}">
                                <ion-icon name="ellipse-outline"></ion-icon>Add All Test
                                Filters
                            </a>
                        </li>
                        <li>
                            <a href="{{"/admin/lab-test"}}">
                                <ion-icon name="ellipse-outline"></ion-icon>Lab Test
                            </a>
                        </li>
                        <li>
                            <a href="{{"/admin/category"}}">
                                <ion-icon name="ellipse-outline"></ion-icon>Category
                            </a>
                        </li>
                        <li>
                            <a href="{{"/admin/package"}}">
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

                {{-- Call Center Enquiry --}}
                <li>
                    <a href="{{ '/admin/call-center-enquiry' }}">
                        <ion-icon name="ellipse-outline"></ion-icon>Call Center Enquiry
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

                {{-- Manage Admin Users --}}
                <li>
                    <a href="ecommerce-checkout-shipping.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Manage Admin Users
                    </a>
                </li>
                
                {{-- Setting --}}
                <li>
                    <a href="ecommerce-product-details.html">
                        <ion-icon name="ellipse-outline"></ion-icon>Setting
                    </a>
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

                <form class="searchbar">
                    <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
                        <ion-icon name="search-outline"></ion-icon>
                    </div>
                    <input class="form-control" type="text" placeholder="Search for anything" />
                    <div class="position-absolute top-50 translate-middle-y search-close-icon">
                        <ion-icon name="close-outline"></ion-icon>
                    </div>
                </form>
                <div class="top-navbar-right ms-auto">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link mobile-search-button" href="javascript:;">
                                <div class="">
                                    <ion-icon name="search-outline"></ion-icon>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dark-mode-icon" href="javascript:;">
                                <div class="mode-icon">
                                    <ion-icon name="moon-outline"></ion-icon>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-large dropdown-apps">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                data-bs-toggle="dropdown">
                                <div class="">
                                    <ion-icon name="apps-outline"></ion-icon>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                                <div class="row row-cols-3 g-3 p-3">
                                    <div class="col text-center">
                                        <div class="app-box mx-auto bg-gradient-purple text-white">
                                            <ion-icon name="cart-outline"></ion-icon>
                                        </div>
                                        <div class="app-title">Orders</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="app-box mx-auto bg-gradient-info text-white">
                                            <ion-icon name="people-outline"></ion-icon>
                                        </div>
                                        <div class="app-title">Teams</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="app-box mx-auto bg-gradient-success text-white">
                                            <ion-icon name="shield-checkmark-outline"></ion-icon>
                                        </div>
                                        <div class="app-title">Tasks</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="app-box mx-auto bg-gradient-danger text-white">
                                            <ion-icon name="videocam-outline"></ion-icon>
                                        </div>
                                        <div class="app-title">Media</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="app-box mx-auto bg-gradient-warning text-white">
                                            <ion-icon name="file-tray-outline"></ion-icon>
                                        </div>
                                        <div class="app-title">Files</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="app-box mx-auto bg-gradient-branding text-white">
                                            <ion-icon name="notifications-outline"></ion-icon>
                                        </div>
                                        <div class="app-title">Alerts</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <span class="notify-badge">8</span>
                                    <ion-icon name="notifications-outline"></ion-icon>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <p class="msg-header-title">Notifications</p>
                                        <p class="msg-header-clear ms-auto">Marks all as read</p>
                                    </div>
                                </a>
                                <div class="header-notifications-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-primary">
                                                <ion-icon name="cart-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">
                                                    New Orders
                                                    <span class="msg-time float-end">2 min ago</span>
                                                </h6>
                                                <p class="msg-info">You have recived new orders</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-danger">
                                                <ion-icon name="person-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">
                                                    New Customers<span class="msg-time float-end">14 Sec ago</span>
                                                </h6>
                                                <p class="msg-info">5 new user registered</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-success">
                                                <ion-icon name="document-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">
                                                    24 PDF File<span class="msg-time float-end">19 min ago</span>
                                                </h6>
                                                <p class="msg-info">The pdf files generated</p>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-info">
                                                <ion-icon name="checkmark-done-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">
                                                    New Product Approved
                                                    <span class="msg-time float-end">2 hrs ago</span>
                                                </h6>
                                                <p class="msg-info">Your new product has approved</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-warning">
                                                <ion-icon name="send-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">
                                                    Time Response
                                                    <span class="msg-time float-end">28 min ago</span>
                                                </h6>
                                                <p class="msg-info">5.1 min avarage time response</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-danger">
                                                <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">
                                                    New Comments
                                                    <span class="msg-time float-end">4 hrs ago</span>
                                                </h6>
                                                <p class="msg-info">New customer comments recived</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-primary">
                                                <ion-icon name="albums-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">
                                                    New 24 authors<span class="msg-time float-end">1 day ago</span>
                                                </h6>
                                                <p class="msg-info">
                                                    24 new authors joined last week
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-success">
                                                <ion-icon name="shield-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">
                                                    Your item is shipped
                                                    <span class="msg-time float-end">5 hrs ago</span>
                                                </h6>
                                                <p class="msg-info">Successfully shipped your item</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify text-warning">
                                                <ion-icon name="cafe-outline"></ion-icon>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">
                                                    Defense Alerts
                                                    <span class="msg-time float-end">2 weeks ago</span>
                                                </h6>
                                                <p class="msg-info">45% less alerts last 4 weeks</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">
                                        View All Notifications
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-user-setting">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                data-bs-toggle="dropdown">
                                <div class="user-setting">
                                    <img src="{{ asset('Admin/assets/images/avatars/06.png') }}" class="user-img"
                                        alt="" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex flex-row align-items-center gap-2">
                                            <img src="{{ asset('Admin/assets/images/avatars/06.png') }}"
                                                alt="" class="rounded-circle" width="54"
                                                height="54" />
                                            <div class="">
                                                <h6 class="mb-0 dropdown-user-name">Jhon Deo</h6>
                                                <small class="mb-0 dropdown-user-designation text-secondary">UI
                                                    Developer</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <ion-icon name="person-outline"></ion-icon>
                                            </div>
                                            <div class="ms-3"><span>Profile</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <ion-icon name="settings-outline"></ion-icon>
                                            </div>
                                            <div class="ms-3"><span>Setting</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <ion-icon name="speedometer-outline"></ion-icon>
                                            </div>
                                            <div class="ms-3"><span>Dashboard</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <ion-icon name="wallet-outline"></ion-icon>
                                            </div>
                                            <div class="ms-3"><span>Earnings</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <ion-icon name="cloud-download-outline"></ion-icon>
                                            </div>
                                            <div class="ms-3"><span>Downloads</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:;">
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
    <script src="{{ asset('Admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="{{ asset('Admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/easyPieChart/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/index.js') }}"></script>
    <!-- Main JS-->
    <script src="{{ asset('Admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/js/table-datatable.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/plugins/validation/validation-script.js') }}"></script>
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
