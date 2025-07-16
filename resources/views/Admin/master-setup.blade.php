@extends('admin.layout.admin')
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
                            <li class="breadcrumb-item"><a href="javascript:;">
                                    <ion-icon name="home-outline"></ion-icon>
                                </a>
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
                                <a class="nav-link active" data-bs-toggle="pill" href="#danger-pills-home" role="tab"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="tab-icon"><ion-icon name="home-sharp" class="me-1"></ion-icon>
                                        </div> --}}
                                        <div class="tab-title">Country Management</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="danger-pills-tabContent">
                            {{-- country data --}}
                            <div class="tab-pane fade show active" id="danger-pills-home" role="tabpanel">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleLargeModal">Add Country</button><br><br>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.no</th>
                                                        <th>Country Name</th>
                                                        <th>Url </th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($countries as $key => $country)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $country->country_name }}</td>
                                                            <td>{{ $country->country_url }}</td>
                                                            <td>
                                                                @if ($country->status)
                                                                    <a href="{{ route('country.toggle', $country->id) }}"
                                                                        class="btn btn-success btn-sm">Active</a>
                                                                @else
                                                                    <a href="{{ route('country.toggle', $country->id) }}"
                                                                        class="btn btn-danger btn-sm">Inactive</a>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                <button class="btn btn-sm btn-info"
                                                                    onclick="editCountry({{ $country->id }})">Edit</button>
                                                                <button class="btn btn-sm btn-danger country-delete-btn"
                                                                    data-id="{{ $country->id }}">Delete</button>
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

                        {{-- country modal --}}
                        <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Country</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="card-body p-4">
                                        <form class="row g-3 needs-validation" novalidate="" id="countryForm">
                                            @csrf
                                            <input type="hidden" name="country_id" id="country_id">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="country_name" class="form-label">Country Name</label>
                                                    <input type="text" name="country_name" class="form-control"
                                                        id="country_name" placeholder="Country Name" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid Country Name.
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="country_url" class="form-label">URL</label>
                                                    <input type="text" name="country_url" class="form-control"
                                                        id="country_url" placeholder="URL" required readonly>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid URL.
                                                    </div>
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
                        {{-- city data --}}
                        <div class="tab-pane fade" id="danger-pills-contact" role="tabpanel">
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

                    {{-- country modal --}}
                    <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Country</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="card-body p-4">
                                    <form class="row g-3 needs-validation" novalidate="" id="countryForm">
                                        @csrf
                                        <input type="hidden" name="country_id" id="country_id">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="bsValidation4" class="form-label">Country Name </label>
                                                <input type="text" name="country_name" class="form-control"
                                                    id="bsValidation4" placeholder="Country Name " required="">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Country Name .
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="bsValidation4" class="form-label">Url </label>
                                                <input type="text" name="country_url" class="form-control"
                                                    id="bsValidation4" placeholder="Url ">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Url .
                                                </div>
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
                    {{-- state modal --}}
                    <div class="modal fade" id="addStateModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add State</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="card-body p-4">
                                    <form class="row g-3 needs-validation" novalidate="" id="stateForm">
                                        @csrf
                                        <input type="hidden" name="state_id" id="state_id">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="countryName" class="form-label">Country Name</label>
                                                {{-- <input type="text" class="form-control" id="countryName"
                                                    name="countryName" placeholder="Country Name" required> --}}
                                                <select name="countryName" id="countryName" class="form-control"
                                                    required>
                                                    <option value="">Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">
                                                            {{ $country->country_name }}</option>
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <div class="invalid-feedback">Please provide a valid Country Name.
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="stateName" class="form-label">State Name</label>
                                                <input type="text" class="form-control" id="stateName"
                                                    name="stateName" placeholder="State Name" required>
                                                <div class="invalid-feedback">Please provide a valid State Name.</div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="stateCode" class="form-label">State Code</label>
                                                <input type="text" class="form-control" id="stateCode"
                                                    name="stateCode" placeholder="State Code" required>
                                                <div class="invalid-feedback">Please provide a valid State Code.</div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="url" class="form-label">URL</label>
                                                <input type="text" class="form-control" id="url"
                                                    name="stateUrl" placeholder="URL" required>
                                                <div class="invalid-feedback">Please provide a valid URL.</div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="aboutState" class="form-label">About State</label>
                                                <input type="text" class="form-control" id="aboutState"
                                                    name="aboutState" placeholder="About State" required>
                                                <div class="invalid-feedback">Please provide valid details about the
                                                    state.</div>
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
                                                <label for="state" class="form-label">City Image</label>
                                                <input type="file" class="form-control" id="cityimage"
                                                    name="cityimage" placeholder="City image" required>
                                                <div class="invalid-feedback">Please provide a valid City Url.</div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label for="state" class="form-label">City Url</label>
                                                <input type="text" class="form-control" id="cityUrl" name="cityUrl"
                                                    placeholder="City Url" required>
                                                <div class="invalid-feedback">Please provide a valid City Url.</div>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="aboutCity" class="form-label">About City</label>
                                                <input type="text" class="form-control" id="city_about"
                                                    name="city_about" placeholder="About City" required>
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
        //country form submission
        $('#countryForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('countries.store') }}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status == 'success') {
                        toastr.success(res.message);
                        $('#exampleLargeModal').modal('hide');
                        setTimeout(() => location.reload(), 1000);
                    }
                }
            });
        });


        //edit country
        function editCountry(id) {
            $.get("{{ url('/admin/countries/edit') }}/" + id, function(data) {
                $('#country_id').val(data.id);
                $('[name="country_name"]').val(data.country_name);
                $('[name="country_url"]').val(data.country_url);
                $('#exampleLargeModal').modal('show');
            });
        }

        // Delete counrty with SweetAlert Confirmation
        $('.country-delete-btn').on('click', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "This Country will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/admin/countries/delete') }}/" + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            toastr.success("Country deleted successfully!");
                            setTimeout(() => location.reload(), 1000);
                        },
                        error: function() {
                            toastr.error("Something went wrong!");
                        }
                    });
                }
            });
        });

        function resetForm() {
            $('#countryForm')[0].reset();
            $('#country_id').val('');
        }

        function resetForm() {
            $('#stateForm')[0].reset();
            $('#state_id').val('');
        }

        function resetForm() {
            $('#cityForm')[0].reset();
            $('#city_id').val('');
        }
    </script>
    <script>
        document.getElementById('country_name').addEventListener('input', function() {
            let name = this.value;
            let slug = name.toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '') // remove special chars
                .replace(/\s+/g, '-') // replace spaces with -
                .replace(/-+/g, '-'); // remove multiple dashes
            document.getElementById('country_url').value = slug;
        });
    </script>
@endsection
