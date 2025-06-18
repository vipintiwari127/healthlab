@extends('admin.layout.admin')
@section('admin-content')
<<<<<<< HEAD
<!--start wrapper-->
<div class="wrapper">
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Health Care</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item">
                                <a href="javascript:;">
                                    <ion-icon name="home-outline"></ion-icon>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Lab Test
                            </li>
                        </ol>
                    </nav>
=======
    <!--start wrapper-->
    <div class="wrapper">
        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
            <!-- start page content-->
            <div class="page-content">
                <!--start breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Health Care</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0 align-items-center">
                                <li class="breadcrumb-item">
                                    <a href="javascript:;">
                                        <ion-icon name="home-outline"></ion-icon>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Lab Test
                                </li>
                            </ol>
                        </nav>
                    </div>
>>>>>>> 56d2447df0659035f5371649fcd539bb53cef3b6
                </div>
            </div>
            <!--end breadcrumb-->

<<<<<<< HEAD
            {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">Add
                Lab Test</button>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.no</th>
                                    <th>Test Name</th>
                                    <th>Partner</th>
                                    <th>MRP Price</th>
                                    <th>Featured</th> <!-- Optional: can be removed if not used -->
                                    <th>Status</th>
                                    <th>Added By</th> <!-- Optional: depends on your table -->
                                    <th>Added On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($labtestData as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->test->name ?? 'N/A' }}</td>
                                    <td>{{ $item->labPartner->name ?? 'N/A' }}</td>
                                    <td>{{ $item->lab_mrp_price }}</td>
                                    <td>
                                       <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                id="statusfeature{{ $item->id }}"
                                                onchange="togglefeature({{ $item->id }})" {{ $item->feature ? 'checked' :
                                            '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                id="statusSwitch{{ $item->id }}"
                                                onchange="toggleStatus({{ $item->id }})" {{ $item->status ? 'checked' :
                                            '' }}>
                                        </div>
                                    </td>
                                    <td>{{ $item->added_by ?? 'Admin' }}</td>
                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" onclick="editlabtest({{ $item->id }})">Edit</button>
                                        <button class="btn btn-sm btn-danger delete-btn"
                                            data-id="{{ $item->id }}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            {{-- add doctor referral modal  --}}

            <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Bussiness Partner</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="card-body p-4">
                            <form class="form-horizontal" id="labtest" runat="server" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="labtest_id">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Lab Partner&nbsp;</label>
                                        <select class="form-control" name="lab_partner_id" id="lab_partner_id" required>
                                            <option selected disabled>Select Lab Partner</option>
                                            <option value="37">PS.PATHLAB SARASWATI VIHAR </option>
                                            <option value="36">PS.PATHLAB ROHINI SECTOR -05</option>
                                            <option value="35">PS.PATHLAB ROHINI SECTOR-06</option>
                                        </select>
                                    </div>


                                    <div class="col-sm-4">
                                        <label>Name&nbsp;</label>
                                        <select class="form-control chosen-select" name="test_id" id="test_id"
                                            data-placeholder="Search  Test"
                                            onchange="get_catname(this.value);get_desc(this.value);get_spcmn(this.value);"
                                            required>

                                            <option selected disabled>Select Test Name</option>
                                            <option value="5282">MRI PELVIS WITH WITH CONTRAST</option>

                                        </select>
                                        <!-- <input type="text" class="form-control" name="name" id="name" required placeholder="Name"  value="" />  -->
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Category&nbsp;</label>
                                        <select class="form-control" name="category" id="category" required>
                                            <option selected disabled>Select Category</option>
                                            <option value="pathology">pathology</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Lab MRP Price&nbsp;</label>
                                        <input type="number" min='0' class="form-control" name="lab_mrp_price"
                                            id="lab_mrp_price" required placeholder="Lab MRP Price" value="">
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Lab Net Price&nbsp;</label>
                                        <input type="number" min='0' class="form-control" name="lab_net_price"
                                            id="lab_net_price" placeholder="Lab Net Price" value="">
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Offer Price&nbsp;</label>
                                        <input type="number" min='0' class="form-control" name="offer_price"
                                            id="offer_price" placeholder="Offer Price" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Reporting Time</label>
                                        <input type="text" class="form-control" name="reporting_time"
                                            id="reporting_time" placeholder="Reporting Time" value="">
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Specimen Requirement</label>
                                        <input type="text" class="form-control" name="specimen_requirement"
                                            id="specimen_requirement" placeholder="Specimen Requirement" value="">
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Service Type</label><br>
                                        <label style="margin-right: 15px;">
                                            <input name="service_type" type="radio" value="Lab" required> &nbsp;
                                            Lab
                                        </label>
                                        <label>
                                            <input name="service_type" type="radio" value="Home" required> &nbsp;
                                            Home
                                        </label>
                                        <label>
                                            <input name="service_type" type="radio" value="Both" required> &nbsp;
                                            Both
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Description&nbsp;</label>
                                        <textarea style="height:200px" rows="5" name="description" id="description"
                                            class="form-control" ></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save labtest</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                        </div>
                        </form>
=======
                {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Add
                    Lab Test</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Test Name</th>
                                        <th>Partner</th>
                                        <th>MRP Price</th>
                                        <th>Featured</th> <!-- Optional: can be removed if not used -->
                                        <th>Status</th>
                                        <th>Added By</th> <!-- Optional: depends on your table -->
                                        <th>Added On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($labtestData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->test->name ?? 'N/A' }}</td>
                                            <td>{{ $item->labPartner->name ?? 'N/A' }}</td>
                                            <td>{{ $item->lab_mrp_price }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="statusfeature{{ $item->id }}"
                                                        onchange="togglefeature({{ $item->id }})"
                                                        {{ $item->feature ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="statusSwitch{{ $item->id }}"
                                                        onchange="toggleStatus({{ $item->id }})"
                                                        {{ $item->status ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>{{ $item->added_by ?? 'Admin' }}</td>
                                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info"
                                                    onclick="editlabtest({{ $item->id }})">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-btn"
                                                    data-id="{{ $item->id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                {{-- add doctor referral modal --}}

                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Lab Test</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="form-horizontal" id="labtest" runat="server" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <input type="hidden" name="id" id="labtest_id">
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Lab Partner</label>
                                            <select class="form-control" name="lab_partner_id" id="lab_partner_id" required>
                                                <option selected disabled>Select Lab Partner</option>
                                                <option value="PS.PATHLAB SARASWATI VIHAR">PS.PATHLAB SARASWATI VIHAR
                                                </option>
                                                <option value="PS.PATHLAB ROHINI SECTOR -05">PS.PATHLAB ROHINI SECTOR -05
                                                </option>
                                                <option value="3PS.PATHLAB ROHINI SECTOR-06">PS.PATHLAB ROHINI SECTOR-06
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please choose a Lab Partner.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Name</label>
                                            <select class="form-control chosen-select" name="test_id" id="test_id"
                                                data-placeholder="Search  Test"
                                                onchange="get_catname(this.value);get_desc(this.value);get_spcmn(this.value);"
                                                required>
                                                <option selected disabled>Select Test Name</option>
                                                <option value="5282">MRI PELVIS WITH WITH CONTRAST</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please choose a Name.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Category</label>
                                            <select class="form-control" name="category" id="category" required>
                                                <option selected disabled>Select Category</option>
                                                <option value="pathology">pathology</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please choose a Category.
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="bsValidation1" class="form-label">Lab MRP Price</label>
                                            <input type="number" min='0' class="form-control" name="lab_mrp_price"
                                                id="lab_mrp_price" required placeholder="Lab MRP Price" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Lab MRP Price .
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="bsValidation1" class="form-label">Lab Net Price </label>
                                            <input type="number" min='0' class="form-control"
                                                name="lab_net_price" id="lab_net_price" placeholder="Lab Net Price"
                                                value="">
                                            <div class="invalid-feedback">
                                                Please choose a Lab Net Price .
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="bsValidation1" class="form-label">Offer Price</label>
                                            <input type="number" min='0' class="form-control" name="offer_price"
                                                id="offer_price" placeholder="Offer Price" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Offer Price .
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="bsValidation1" class="form-label">Reporting Time</label>
                                            <input type="time" class="form-control" name="reporting_time"
                                                id="reporting_time" placeholder="Reporting Time" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Reporting Time.
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="bsValidation1" class="form-label">Specimen Requirement</label>
                                            <input type="text" class="form-control" name="specimen_requirement"
                                                id="specimen_requirement" placeholder="Specimen Requirement"
                                                value="">
                                            <div class="invalid-feedback">
                                                Please choose a Specimen Requirement.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Service Type</label><br>
                                            <label style="margin-right: 15px;">
                                                <input name="service_type" type="radio" value="Lab" required> &nbsp;
                                                Lab
                                            </label>
                                            <label>
                                                <input name="service_type" type="radio" value="Home" required> &nbsp;
                                                Home
                                            </label>
                                            <label>
                                                <input name="service_type" type="radio" value="Both" required> &nbsp;
                                                Both
                                            </label>
                                            <div class="invalid-feedback">
                                                Please choose a Service Type.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="bsValidation1" class="form-label">Description </label>
                                            <textarea style="height:200px" rows="5" name="description" id="description" class="form-control"></textarea>
                                            <div class="invalid-feedback">
                                                Please choose a Description .
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-md-flex d-grid align-items-center gap-3">
                                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                                                <button type="reset" class="btn btn-light px-4">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
>>>>>>> 56d2447df0659035f5371649fcd539bb53cef3b6
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>
<<<<<<< HEAD
    <!-- end page content-->
</div>
</div>

<script>
    $.ajaxSetup({
=======
    </div>

    <script>
        $.ajaxSetup({
>>>>>>> 56d2447df0659035f5371649fcd539bb53cef3b6
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        // Add or Update Form Submission
        $('#labtest').on('submit', function(e) {
            e.preventDefault();
            let id = $('#labtest_id').val();
            let url = id ? `/admin/lab-test/update/${id}` : `/admin/lab-test/store`;
            let method = id ? 'POST' : 'POST';

            $.ajax({
                url: url,
                method: method,
                data: $(this).serialize(),
                success: function(res) {
                    toastr.success(res.message);
                    $('#labtest')[0].reset();
                    $('#labtest_id').val('');
                    $('#exampleLargeModal').modal('hide');
                    location.reload();
                }
            });
        });

        // Edit
        function editlabtest(id) {
<<<<<<< HEAD
           $.get(`/admin/lab-test/edit/${id}`, function(data) {
    $('#labtest_id').val(data.id);
    $('#lab_partner_id').val(data.lab_partner_id);
    $('#test_id').val(data.test_id);
    $('#category').val(data.category);
    $('#lab_mrp_price').val(data.lab_mrp_price);
    $('#lab_net_price').val(data.lab_net_price);
    $('#offer_price').val(data.offer_price);
    $('#reporting_time').val(data.reporting_time);
    $('#specimen_requirement').val(data.specimen_requirement);
    $('#description').val(data.description);
    // Set the service_type radio buttons
    $('input[name="service_type"][value="' + data.service_type + '"]').prop('checked', true);

    // Show modal (update with your actual modal ID if different)
    $('#exampleLargeModal').modal('show');
});
=======
            $.get(`/admin/lab-test/edit/${id}`, function(data) {
                $('#labtest_id').val(data.id);
                $('#lab_partner_id').val(data.lab_partner_id);
                $('#test_id').val(data.test_id);
                $('#category').val(data.category);
                $('#lab_mrp_price').val(data.lab_mrp_price);
                $('#lab_net_price').val(data.lab_net_price);
                $('#offer_price').val(data.offer_price);
                $('#reporting_time').val(data.reporting_time);
                $('#specimen_requirement').val(data.specimen_requirement);
                $('#description').val(data.description);
                // Set the service_type radio buttons
                $('input[name="service_type"][value="' + data.service_type + '"]').prop('checked', true);

                // Show modal (update with your actual modal ID if different)
                $('#exampleLargeModal').modal('show');
            });
>>>>>>> 56d2447df0659035f5371649fcd539bb53cef3b6

        }


        $(document).ready(function() {
            // Delete with SweetAlert confirmation
            $(document).on('click', '.delete-btn', function() {
                const id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This labtest Data will be deleted!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/lab-test/delete/${id}`,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                toastr.success(response.message);
                                setTimeout(() => location.reload(), 1000);
                            },
                            error: function(xhr) {
                                toastr.error("Something went wrong!");
                                console.error(xhr.responseText);
                            }
                        });
                    }
                });
            });
        });


        function toggleStatus(id) {
            $.ajax({
                url: '/admin/lab-test/status/' + id,
                type: 'POST',
                success: function(res) {
                    toastr.success(res.message);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    toastr.error("Status update failed.");
                }
            });
        }
<<<<<<< HEAD
 
        function togglefeature(id){
              $.ajax({
=======

        function togglefeature(id) {
            $.ajax({
>>>>>>> 56d2447df0659035f5371649fcd539bb53cef3b6
                url: '/admin/lab-test/feature/' + id,
                type: 'POST',
                success: function(res) {
                    toastr.success(res.message);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    toastr.error("feature update failed.");
                }
            });
        }
<<<<<<< HEAD
</script>


@endsection
=======
    </script>
@endsection
>>>>>>> 56d2447df0659035f5371649fcd539bb53cef3b6
