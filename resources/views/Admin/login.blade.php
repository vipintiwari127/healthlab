<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- loader-->
    <link href="{{ asset('Admin/assets/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('Admin/assets/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('Admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{ asset('Admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/css2?family=Roboto:wght@400;500&display=swap') }}" rel="stylesheet">

    <title>Login</title>
</head>

<body>

    <div class="login-bg-overlay au-sign-in-basic"></div>

    <!--start wrapper-->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-0">
                    <div class="card radius-10" style="margin-top: 160px;">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h4>Sign In</h4>
                                <p>Sign In to your account</p>
                            </div>
                            <form id="loginForm" class="form-body row g-3">

                                <div class="col-12">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail"
                                        placeholder="abc@example.com">
                                </div>
                                <div class="col-12">
                                    <label for="inputPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="inputPassword"
                                        placeholder="Your password">
                                </div>
                                {{-- <div class="col-12 col-lg-6 text-end">
                                    <a href="authentication-reset-password-basic.html">Forgot Password?</a>
                                </div> --}}
                                <div class="col-12 col-lg-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Sign In</button>

                                    </div>
                                </div>
                                <div class="col-12 col-lg-12 text-center">
                                    <p class="mb-0">Don't have an account? <a href="{{ url('/Admin/register') }}">Sign
                                            up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end wrapper-->



    <script src="{{ asset('Admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault(); // Prevent page reload

                $.ajax({
                    url: "{{ url('/admin/login') }}", // Laravel route to handle login
                    method: "POST",
                    data: {
                        email: $('#inputEmail').val(),
                        password: $('#inputPassword').val(),
                        _token: "{{ csrf_token() }}" // Required for Laravel
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message || 'Login successful');
                            // Optionally redirect
                            setTimeout(() => {
                                window.location.href = "{{ url('/Admin/dashboard') }}";
                            }, 1500);
                        } else {
                            toastr.error(response.message || 'Invalid credentials');
                        }
                    },
                    error: function(xhr) {
                        toastr.error('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>


</body>

</html>
