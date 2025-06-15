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
    <link href="../../../css2?family=Roboto:wght@400;500&display=swap')}}" rel="stylesheet">

    <title>Registration </title>
</head>

<body>

    <div class="login-bg-overlay au-sign-up-basic"></div>

    <!--start wrapper-->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-7 mx-auto mt-5">
                    <div class="card radius-10" style="margin-top: 160px;">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h4>Sign Up</h4>
                                <p>Creat New account</p>
                            </div>
                            <form class="form-body row g-3" id="adminRegisterForm">
                                @csrf
                                <div class="col-12">
                                    <label for="inputName" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="inputName"
                                        placeholder="Your name">
                                </div>
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
                                <div class="col-12">
                                    <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="inputConfirmPassword" placeholder="Confirm your password">
                                </div>
                                <div class="col-12 col-lg-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Sign Up</button>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12 text-center">
                                    <p class="mb-0">Already have an account? <a href="{{ url('/admin/login') }}">Sign
                                            in</a></p>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#adminRegisterForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ url('/Admin/register') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        toastr.success(response.message);
                        setTimeout(() => {
                            window.location.href = response.redirect;
                        }, 1500);
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            for (let field in errors) {
                                toastr.error(errors[field][0]);
                            }
                        } else {
                            toastr.error("Something went wrong. Please try again.");
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>
