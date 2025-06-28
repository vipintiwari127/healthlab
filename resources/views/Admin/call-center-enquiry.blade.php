@extends('admin.layout.admin')

@section('admin-content')
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
                                <li class="breadcrumb-item"><a href="#"><ion-icon name="home-outline"></ion-icon></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Call Center Enquiry List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal" id="addNewBtn">
                    Add Call Center Enquiry
                </button>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Enquiry Details</th>
                                        <th>Age/Gender</th>
                                        <th>Lab Partner</th>
                                        <th>Lab Test</th>
                                        <th>Medicines</th>
                                        <th>Address</th>
                                        <th>Remark</th>
                                        <th>Update Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enquiries as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->prefix }}{{ $item->name }}</td>
                                            <td>{{ $item->age }}/{{ $item->gender }}</td>
                                            <td>{{ $item->lab_partner }}</td>
                                            <td>{{ $item->test_package }}</td>
                                            <td>{{ $item->medicine }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->remark }}</td>
                                            <td>{{ $item->updated_at->format('d-m-Y H:i a') }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-btn"
                                                    data-id="{{ $item->id }}">Edit</button>
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

                <!-- Modal Form -->
                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form class="modal-content needs-validation" id="enquiryForm" novalidate>
                            @csrf
                            <input type="hidden" name="id" />
                            <div class="modal-header">
                                <h5 class="modal-title">Call Center Enquiry</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body row g-3 px-4">
                                <div class="col-md-3">
                                    <label class="form-label">Prefix</label>
                                    <select name="prefix" class="form-control" required>
                                        <option value="">Select</option>
                                        <option>Mr.</option>
                                        <option>Mrs.</option>
                                        <option>Miss</option>
                                    </select>
                                    <div class="invalid-feedback">Please choose a Prefix.</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control" required>
                                    <div class="invalid-feedback">Please enter a name.</div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Age</label>
                                    <input name="age" type="number" class="form-control" required>
                                    <div class="invalid-feedback">Please enter age.</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" class="form-control" required>
                                        <option value="">Select</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                    <div class="invalid-feedback">Please select gender.</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Phone</label>
                                    <input name="phone" type="text" class="form-control" required>
                                    <div class="invalid-feedback">Please enter phone.</div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Address</label>
                                    <input name="address" type="text" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Remark</label>
                                    <input name="remark" type="text" class="form-control">
                                </div>
                                <div class="row g-3 align-items-end">
                                    <!-- Button to show Lab fields -->
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-info w-100" id="showLabFields">Add Lab
                                            Test</button>
                                    </div>

                                    <!-- Button to show Medicine field -->
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-info w-100" id="showMedicineBtn">Add
                                            Medicine</button>
                                    </div>
                                </div>

                                <!-- Hidden Lab Test fields (in one row) -->
                                <div class="row g-3 mt-3" id="labFields" style="display: none;">
                                    <div class="col-md-6">
                                        <label class="form-label">Lab Partner</label>
                                        <select name="lab_partner" class="form-control">
                                            <option value="">Select</option>
                                            <option>Partner A</option>
                                            <option>Partner B</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Test/Package</label>
                                        <select name="test_package" class="form-control">
                                            <option value="">Select</option>
                                            <option>Test 1</option>
                                            <option>Package 1</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Hidden Medicine field -->
                                <div class="row g-3 mt-3" id="medicineField" style="display: none;">
                                    <div class="col-md-6">
                                        <label class="form-label">Medicine</label>
                                        <select name="medicine" class="form-control">
                                            <option value="">Select</option>
                                            <option>Medicine 1</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-12 text-end pt-3">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- end page content-->
        </div>
    </div>

    <!-- Toastr & jQuery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addNewBtn').click(() => {
            $('#enquiryForm')[0].reset();
            $('#enquiryForm [name=id]').val('');
            $('#enquiryForm').removeClass('was-validated');
        });

        $('#enquiryForm').submit(function(e) {
            e.preventDefault();
            const form = $(this);
            if (!form[0].checkValidity()) {
                form.addClass('was-validated');
                return;
            }

            $.post("{{ route('callcenter.store') }}", form.serialize(), function(res) {
                $('#exampleLargeModal').modal('hide');
                toastr.success(res.message);
                setTimeout(() => location.reload(), 1000);
            }).fail((xhr) => {
                toastr.error('Something went wrong.');
            });
        });

        $('.edit-btn').click(function() {
            $.get("{{ url('/admin/call-center-enquiry/edit') }}/" + $(this).data('id'), function(data) {
                $('#exampleLargeModal').modal('show');
                $.each(data, (key, val) => $('#enquiryForm [name=' + key + ']').val(val));
            });
        });

        // $('.delete-btn').click(function() {
        //     if (!confirm("Are you sure to delete?")) return;
        //     $.ajax({
        //         url: "{{ url('/admin/call-center-enquiry/delete') }}/" + $(this).data('id'),
        //         type: "DELETE",
        //         data: {},
        //         success: function(res) {
        //             toastr.success(res.message);
        //             setTimeout(() => location.reload(), 1000);
        //         }
        //     });
        // });
        // Delete with SweetAlert Confirmation
        $('.delete-btn').on('click', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "This Call Data will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/admin/call-center-enquiry/delete') }}/" + $(this).data(
                            'id'),
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            toastr.success("Call Data Deleted Successfully!");
                            setTimeout(() => location.reload(), 1000);
                        },
                        error: function() {
                            toastr.error("Something went wrong!");
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $('#showLabFields').click(function() {
            $('#labFields').slideToggle();
        });

        $('#showMedicineBtn').click(function() {
            $('#medicineField').slideToggle();
        });
    </script>
@endsection
