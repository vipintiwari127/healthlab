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
                            <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Booking List</li>
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
                                      </div>  --}}
                                        <div class="tab-title">Add Booking </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item " role="presentation">
                                <a class="nav-link " data-bs-toggle="pill" href="#danger-pills-profile" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="tab-icon"><ion-icon name="person-sharp" class="me-1"></ion-icon>
                                        </div> --}}
                                        <div class="tab-title">Pending Booking</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#danger-pills-contact" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="tab-icon"><ion-icon name="call-sharp" class="me-1"></ion-icon>
                                        </div> --}}
                                        <div class="tab-title">Confirm Booking</div>
                                    </div>
                                </a>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#danger-pills-call-ceneter" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                       
                                        <div class="tab-title">Call Center Enquiry</div>
                                    </div>
                                </a>
                            </li> --}}
                        </ul>
                        <div class="tab-content" id="danger-pills-tabContent">
                            <div class="tab-pane fade show active" id="danger-pills-home" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleLargeModal">Add Booking</button>
                                        <hr />
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.no.</th>
                                                        <th>Order Id</th>
                                                        <th>Type</th>
                                                        <th>Booking Data</th>
                                                        <th>Patient Details</th>
                                                        <th>Lab Details</th>
                                                        <th>Status</th>
                                                        {{-- <th>Action</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($LabTestDataB as $index => $labtestdata)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $labtestdata->order_id }}</td>
                                                            <td>{{ $labtestdata->service_type }}</td>
                                                            <td>Date :{{ $labtestdata->updated_at }}<br>
                                                                {{-- Time :{{ $labtestdata->lab_time }}</br> --}}
                                                                Pincode :{{ $labtestdata->pin_code }}</br>
                                                                Address :{{ $labtestdata->address }}</td>
                                                            <td>Patient :{{ $labtestdata->patient_name }}<br>
                                                                Age :{{ $labtestdata->age }}</br>
                                                                Gender :{{ $labtestdata->gender }}</td>
                                                            <td> Lab Name:
                                                                {{ $labtestdata->labPartner->name ?? 'N/A' }}<br>
                                                                Lab Address:
                                                                {{ $labtestdata->labPartner->address ?? 'N/A' }}<br>
                                                                Lab Price: {{ $labtestdata->lab_mrp_price }}<br>
                                                                Lab Offer Price: {{ $labtestdata->offer_price }}<br>
                                                                Lab Time: {{ $labtestdata->reporting_time }}
                                                            </td>
                                                            <td>
                                                                <form
                                                                    action="{{ route('booking.toggle', $labtestdata->id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-sm {{ $labtestdata->status ? 'btn-success' : 'btn-danger' }}">
                                                                        {{ $labtestdata->status ? 'Confirm' : 'Pending' }}
                                                                    </button>
                                                                </form>.
                                                            </td>
                                                            {{-- <td>
                                                                <button class="btn btn-danger btn-sm deleteBtn"
                                                                    data-id="{{ $labtestdata->id }}">
                                                                    Delete
                                                                </button>
                                                            </td> --}}
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show " id="danger-pills-profile" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example3" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.no.</th>
                                                        <th>Order Id</th>
                                                        <th>Type</th>
                                                        <th>Booking Data</th>
                                                        <th>Patient Details</th>
                                                        <th>Lab Details</th>
                                                        <th>Status</th>
                                                        {{-- <th>Action</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($LabTestDataF as $index => $labtestdata)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $labtestdata->order_id }}</td>
                                                            <td>{{ $labtestdata->type }}</td>
                                                            <td>Date :{{ $labtestdata->date }}<br>
                                                                Time :{{ $labtestdata->time }}</br>
                                                                Pincode :{{ $labtestdata->pincode }}</br>
                                                                Address :{{ $labtestdata->address }}</td>
                                                            <td>Patient :{{ $labtestdata->patient_name }}<br>
                                                                Age :{{ $labtestdata->age }}</br>
                                                                Gender :{{ $labtestdata->gender }}</td>
                                                            <td> Lab Name: {{ $labtestdata->lab_name }}<br>
                                                                Lab Address: {{ $labtestdata->lab_address }}<br>
                                                                Lab Price: {{ $labtestdata->lab_net_price }}<br>
                                                                Lab Offer Price: {{ $labtestdata->lab_offer_price }}<br>
                                                                Lab Time: {{ $labtestdata->lab_report_time }}
                                                            </td>
                                                            <td>
                                                                <form
                                                                    action="{{ route('booking.toggle', $labtestdata->id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-sm {{ $labtestdata->status ? 'btn-success' : 'btn-danger' }}">
                                                                        {{ $labtestdata->status ? 'Confirm' : 'Pending' }}
                                                                    </button>
                                                                </form>.
                                                            </td>
                                                            {{-- <td>
                                                                <button class="btn btn-danger btn-sm deleteBtn"
                                                                    data-id="{{ $labtestdata->id }}">
                                                                    Delete
                                                                </button>
                                                            </td> --}}
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="danger-pills-contact" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example4" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.no.</th>
                                                        <th>Order Id</th>
                                                        <th>Type</th>
                                                        <th>Booking Data</th>
                                                        <th>Patient Details</th>
                                                        <th>Lab Details</th>
                                                        <th>Status</th>
                                                        {{-- <th>Action</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($LabTestDataC as $index => $labtestdata)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $labtestdata->order_id }}</td>
                                                            <td>{{ $labtestdata->type }}</td>
                                                            <td>Date :{{ $labtestdata->date }}<br>
                                                                Time :{{ $labtestdata->time }}</br>
                                                                Pincode :{{ $labtestdata->pincode }}</br>
                                                                Address :{{ $labtestdata->address }}</td>
                                                            <td>Patient :{{ $labtestdata->patient_name }}<br>
                                                                Age :{{ $labtestdata->age }}</br>
                                                                Gender :{{ $labtestdata->gender }}</td>
                                                            <td> Lab Name: {{ $labtestdata->lab_name }}<br>
                                                                Lab Address: {{ $labtestdata->lab_address }}<br>
                                                                Lab Price: {{ $labtestdata->lab_net_price }}<br>
                                                                Lab Offer Price: {{ $labtestdata->lab_offer_price }}<br>
                                                                Lab Time: {{ $labtestdata->lab_report_time }}
                                                            </td>
                                                            <td>
                                                                <form
                                                                    action="{{ route('booking.toggle', $labtestdata->id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-sm {{ $labtestdata->status ? 'btn-success' : 'btn-danger' }}">
                                                                        {{ $labtestdata->status ? 'Confirm' : 'Pending' }}
                                                                    </button>
                                                                </form>.
                                                            </td>
                                                            {{-- <td>
                                                                <button class="btn btn-danger btn-sm deleteBtn"
                                                                    data-id="{{ $labtestdata->id }}">
                                                                    Delete
                                                                </button>
                                                            </td> --}}
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="danger-pills-call-ceneter" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example5" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.no</th>
                                                        <th>Name</th>
                                                        <th>Mobile</th>
                                                        <th>Location</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($CallEnquiry as $index => $callenquiry)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $callenquiry->name }}</td>
                                                            <td>{{ $callenquiry->mobile }}</td>
                                                            <td>{{ $callenquiry->location }}</td>
                                                            <td>{{ $callenquiry->updated_at->format('d-m-Y') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Booking</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="card-body p-4">
                            <form class="row g-3 needs-validation" novalidate method="POST"
                                enctype="multipart/form-data" id="blogForm" action="">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Lab Partner</label>
                                        <select class="form-control" name="lab_partner_id" id="lab_partner_id" required>
                                            <option disabled selected>Select Lab Partner</option>
                                            @foreach ($labpartners as $labpartner)
                                                <option value="{{ $labpartner->id }}">{{ $labpartner->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Test Name</label>
                                        <select class="form-control" name="test_id" id="test_id"
                                            onchange="get_catname(this.value);get_desc(this.value);get_spcmn(this.value);"
                                            required>
                                            <option disabled selected>Select Test Name</option>
                                            @foreach ($tests as $test)
                                                <option value="{{ $test->id }}">{{ $test->test_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Category</label>
                                        <select class="form-control" name="category" id="category" required>
                                            <option disabled selected>Select Category</option>
                                            @foreach ($test_categories as $test)
                                                <option value="{{ $test->id }}">{{ $test->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <div class="col-sm-4">
                                        <label>Lab MRP Price</label>
                                        <input type="number" class="form-control" name="lab_mrp_price"
                                            id="lab_mrp_price" min="0" required>
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Lab Net Price</label>
                                        <input type="number" class="form-control" name="lab_net_price"
                                            id="lab_net_price" min="0">
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Offer Price</label>
                                        <input type="number" class="form-control" name="offer_price" id="offer_price"
                                            min="0">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <div class="col-sm-4">
                                        <label>Reporting Time</label>
                                        <input type="text" class="form-control" name="reporting_time"
                                            id="reporting_time">
                                    </div>

                                    {{-- <div class="col-sm-4"> --}}
                                    {{-- <label>Specimen Requirement</label> --}}
                                    <input type="hidden" class="form-control" name="specimen_requirement"
                                        id="specimen_requirement" value="none" readonly>
                                    {{-- </div> --}}
                                    <div class="col-sm-4">
                                        <label>Service Type</label><br>
                                        @foreach (['Lab', 'Home', 'Both'] as $type)
                                            <label class="me-3">
                                                <input type="radio" name="service_type" value="{{ $type }}"
                                                    required> {{ $type }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="form-group row mt-3">
                                        <div class="col-sm-4">
                                            <label>Patient Name</label>
                                            <input type="text" class="form-control" name="patient_name"
                                                id="patient_name" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Age</label>
                                            <input type="number" class="form-control" name="age" id="age"
                                                min="0">
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Gender</label>
                                            <select name="gender" id="gender" class="form-control" required>
                                                <option value="" disabled selected>Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Pin Code</label>
                                            <input type="number" class="form-control" name="pin_code" id="pin_code">
                                        </div>

                                        <div class="col-sm-12">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" id="address">
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Time</label>
                                            <input type="time" class="form-control" name="lab_time" id="lab_time">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group mt-3">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Save Lab Test</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end shop cart-->
        </div>
        <!-- end page content-->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#blogForm').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: '{{ route('booking.store') }}',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    toastr.info('Submitting form...');
                },
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success('Lab Test Saved Successfully!');
                        $('#blogForm')[0].reset();
                        setTimeout(function() {
                            location.reload(); // ✅ Reload after a short delay
                        }, 1500); // Wait for 1.5 sec before reload to show success toast
                    } else {
                        toastr.error('Something went wrong.');
                    }
                },
                error: function(xhr) {
                    // Show validation errors in toastr
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        Object.values(errors).forEach(error => {
                            toastr.error(error[0]);
                        });
                    } else {
                        toastr.error('Server Error: ' + xhr.status);
                    }
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endsection
