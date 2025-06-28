@extends('Admin.layout.admin')
@section('admin-content')
    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Health lab</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Master Setup</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->


            <!--start shop cart-->
            <section class="shop-page">
                {{-- <h6 class="mb-0 text-uppercase">Danger Nav Pills</h6> --}}
                <hr>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-danger mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="pill" href="#danger-pills-contact" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="tab-icon"><ion-icon name="call-sharp" class="me-1"></ion-icon>
                                        </div> --}}
                                        <div class="tab-title">City Management</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="danger-pills-tabContent">
                            {{-- city data --}}
                            <div class="tab-pane fade show active" id="danger-pills-contact" role="tabpanel">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addCityModal">
                                    Add City
                                </button><br><br>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example4" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.no.</th>
                                                        <th>Country Name</th>
                                                        <th>State Name</th>
                                                        <th>City Url</th>
                                                        <th>City Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($cities as $key => $city)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $city->country_name }}</td>
                                                            <td>{{ $city->state_name }}</td>
                                                            <td>{{ $city->cityUrl }}</td>
                                                            <td>{{ $city->city_name }}</td>
                                                            <td>
                                                                @if ($city->status)
                                                                    <a href="{{ route('city.toggle', $city->id) }}"
                                                                        class="btn btn-success btn-sm">Active</a>
                                                                @else
                                                                    <a href="{{ route('city.toggle', $city->id) }}"
                                                                        class="btn btn-danger btn-sm">Inactive</a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-info"
                                                                    onclick="editcity({{ $city->id }})">Edit</button>
                                                                <button class="btn btn-sm btn-danger city-delete-btn"
                                                                    data-id="{{ $city->id }}">Delete</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- city modal --}}
                        <div class="modal fade" id="addCityModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add City</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="card-body p-4">
                                        <form class="row g-3 needs-validation" novalidate="" id="cityForm">
                                            @csrf
                                            <input type="hidden" name="city_id" id="city_id">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="city_stateName" class="form-label">State Name</label>
                                                    <select class="form-control" id="city_stateName" name="city_stateName"
                                                        required>
                                                        <option value="">Select State</option>
                                                        @foreach ($state as $states)
                                                            <option value="{{ $states->id }}">{{ $states->stateName }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Please select a valid State Name.</div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="city_countryName" class="form-label">Country Name</label>
                                                    <select class="form-control" id="city_countryName"
                                                        name="city_countryName" required>
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">
                                                                {{ $country->country_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Please select a valid Country Name.</div>
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label for="cityName" class="form-label">City Name</label>
                                                    <input type="text" class="form-control" id="city_name"
                                                        name="city_name" placeholder="City Name" required>
                                                    <div class="invalid-feedback">Please provide a valid City Name.</div>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label for="city_image" class="form-label">City Image</label>
                                                    <input type="file" class="form-control" id="city_image"
                                                        name="city_image" required>
                                                    <div class="invalid-feedback">Please provide a valid City Image.</div>
                                                    <img id="previewCityImage" src="#" alt="Image Preview"
                                                        class="img-fluid mt-2 d-none" style="max-height: 150px;">
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <label for="state" class="form-label">City Url</label>
                                                    <input type="text" class="form-control" id="cityUrl"
                                                        name="cityUrl" placeholder="City Url" required readonly>
                                                    <div class="invalid-feedback">Please provide a valid City Url.</div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="aboutCity" class="form-label">About City</label>
                                                    <input type="text" class="form-control" id="city_about"
                                                        name="city_about" placeholder="About City">
                                                    <div class="invalid-feedback">Please provide valid information about
                                                        the city.</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-md-flex d-grid align-items-center gap-3">
                                                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                                                    <button type="reset" class="btn btn-light px-4">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--end shop cart-->
        </div>
        <!-- end page content-->
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        //city form submission
        $('#cityForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('city.store') }}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status == 'success') {
                        toastr.success(res.message);
                        $('#addCityModal').modal('hide');
                        setTimeout(() =>
                            location.reload(), 1000);
                    }
                }
            });
        });

        function editcity(id) {
            $.get("{{ url('/admin/city/edit') }}/" + id, function(data) {
                $('#city_id').val(data.id);
                $('[name="city_countryName"]').val(data.city_countryName);
                $('[name="city_stateName"]').val(data.city_stateName);
                $('[name="cityUrl"]').val(data.cityUrl);
                $('[name="city_name"]').val(data.city_name);
                $('[name="city_about"]').val(data.city_about);

                if (data.city_image) {
                    $('#previewCityImage').attr('src', '/' + data.city_image).removeClass('d-none');
                } else {
                    $('#previewCityImage').addClass('d-none');
                }

                $('#addCityModal').modal('show');
            });
        }


        // Delete city with SweetAlert Confirmation
        $('.city-delete-btn').on('click', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "This City will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/admin/city/delete') }}/" + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            toastr.success("City deleted successfully!");
                            setTimeout(() => location.reload(), 1000);
                        },
                        error: function() {
                            toastr.error("Something went wrong!");
                        }
                    });
                }
            });
        });

        // Preview city image
        $('#city_image').change(function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewCityImage').attr('src', e.target.result).removeClass('d-none');
                };
                reader.readAsDataURL(file);
            }
        });


        function resetForm() {
            $('#cityForm').on('reset', function() {
                $('#previewCityImage').attr('src', '#').addClass('d-none');
                $('#city_id').val('');
            });

        }
    </script>
    <script>
        document.getElementById('city_name').addEventListener('input', function() {
            let name = this.value;
            let slug = name.toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '') // remove special chars
                .replace(/\s+/g, '-') // replace spaces with -
                .replace(/-+/g, '-'); // remove multiple dashes
            document.getElementById('cityUrl').value = slug;
        });
    </script>
@endsection
