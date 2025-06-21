@extends('Admin.layout.admin')
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
                                <li class="breadcrumb-item">
                                    <a href="javascript:;">
                                        <ion-icon name="home-outline"></ion-icon>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Doctor's
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDoctorModal">Add
                    Doctor</button>

                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $doctor)
                                        <tr>
                                            <td>{{ $doctor->name }}</td>
                                            <td>{{ $doctor->specialization }}</td>
                                            <td>{{ $doctor->address }}</td>
                                            <td>{{ $doctor->gender }}</td>
                                            <td>{{ $doctor->phone }}</td>
                                            <td>{{ $doctor->email }}</td>
                                            <td>
                                               <input class="form-check-input status-toggle" type="checkbox"
                                                    data-id="{{ $doctor->id }}" {{ $doctor->status ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-btn"
                                                    data-id="{{ $doctor->id }}">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-btn"
                                                    data-id="{{ $doctor->id }}">Delete</button>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- add doctor referral modal --}}

                <div class="modal fade" id="addDoctorModal" tabindex="-1" aria-labelledby="addDoctorModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Doctor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" id="doctorForm" novalidate="">
                                    @csrf
                                    <div class="col-md-7">
                                        <label for="bsValidation1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name" required="">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="bsValidation3" class="form-label">Phone</label>
                                        <input type="Number" class="form-control" id="phone" name="phone"
                                            placeholder="Phone" required="">
                                        <div class="invalid-feedback">
                                            Please choose a Phone Number.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation4" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email" required="">
                                        <div class="invalid-feedback">
                                            Please provide a valid email.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation9" class="form-label">Gender</label>
                                        <select id="gender" class="form-select" name="gender" required>
                                            <option selected disabled value="">Select Gender</option>
                                            <option value="Male">Male</option> {{-- Case must match controller validation
                                        --}}
                                            <option value="Female">Female</option>
                                        </select>

                                        <div class="invalid-feedback">Please select a valid Gender.</div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation12" class="form-label">Zip</label>
                                        <input type="text" class="form-control" id="zip" name="zip"
                                            placeholder="Zip" required="">
                                        <div class="invalid-feedback">
                                            Please enter a valid Zip code.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Address</label>
                                        <textarea class="form-control" id="address" name="address" placeholder="Address ..." rows="3"
                                            required=""></textarea>
                                        <div class="invalid-feedback">
                                            Please enter a valid address.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation10" class="form-label">Specialization </label>
                                        <textarea class="form-control" id="specialization" name="specialization" placeholder="Specialization  ..."
                                            rows="3" required=""></textarea>
                                        <div class="invalid-feedback">
                                            Please enter a valid Specialization .
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
            <!-- end page content-->

            <!-- Edit Doctor Modal -->
            <div class="modal fade" id="editDoctorModal" tabindex="-1" aria-labelledby="editDoctorModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Doctor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="card-body p-4">
                            <form class="row g-3 needs-validation" id="doctorEditForm" novalidate>
                                @csrf
                                <input type="hidden" name="id" id="edit_doctor_id">

                                <div class="col-md-7">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" id="edit_name" name="name" required>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="edit_phone" name="phone" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="edit_email" name="email" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select" id="edit_gender" name="gender" required>
                                        <option disabled selected value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="edit_zip" name="zip" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" id="edit_address" name="address" rows="3" required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Specialization</label>
                                    <textarea class="form-control" id="edit_specialization" name="specialization" rows="3" required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4">Update</button>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- <script>
    $(document).ready(function () {
        $('#doctorForm').on('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ url('admin/adddoctor') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function (response) {
                    alert('Doctor added successfully!');
                    $('#doctorForm')[0].reset();
                    $('#addDoctorModal').modal('hide'); // Hide the modal
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';

                    if (errors) {
                        $.each(errors, function (key, value) {
                            errorMessages += value[0] + '\n';
                        });
                        alert(errorMessages);
                    } else {
                        alert('Something went wrong. Please try again.');
                    }
                }
            });
        });

           $('.delete-btn').click(function () {
        let id = $(this).data('id');
        if (confirm("Are you sure you want to delete this doctor?")) {
            $.ajax({
                url: '/admin/deletedoctor/' + id,
                type: 'DELETE',
                success: function (response) {
                    $('#row-' + id).remove();
                    alert('Doctor deleted successfully.');
                }
            });
        }
    });

     $('.status-toggle').change(function () {
        let id = $(this).data('id');
        $.post('/admin/statusdoctor/' + id, {}, function (response) {
            alert('Status updated.');
        });
    });

       // Edit Button
    $('.edit-btn').on('click', function () {
        let doctorId = $(this).data('id');

        $.ajax({
            url: "/admin/editdoctor/" + doctorId,
            type: "GET",
            success: function (data) {
                $('#edit_doctor_id').val(data.id);
                $('#edit_name').val(data.name);
                $('#edit_phone').val(data.phone);
                $('#edit_email').val(data.email);
                $('#edit_gender').val(data.gender);
                $('#edit_zip').val(data.zip);
                $('#edit_address').val(data.address);
                $('#edit_specialization').val(data.specialization);

                $('#editDoctorModal').modal('show');
            },
            error: function () {
                alert('Failed to fetch doctor data.');
            }
        });
    });
    

    // Submit Update Form
    $('#doctorEditForm').on('submit', function (e) {
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: "{{ url('/admin/updatedoctor') }}",
            type: "POST",
            data: formData,
            success: function (response) {
                alert('Doctor updated successfully!');
                location.reload(); // Reload to reflect changes
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessages = '';

                if (errors) {
                    $.each(errors, function (key, value) {
                        errorMessages += value[0] + '\n';
                    });
                    alert(errorMessages);
                } else {
                    alert('Something went wrong. Please try again.');
                }
            }
        });
    });


    });
</script> --}}

    <script>
        $(document).ready(function() {

            // Doctor Add Form Submit
            $('#doctorForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ url('admin/adddoctor') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    success: function(response) {
                        toastr.success('Doctor added successfully!');
                        $('#doctorForm')[0].reset();
                        $('#addDoctorModal').modal('hide');
                        setTimeout(() => location.reload(), 1500);
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function(key, value) {
                                toastr.error(value[0]);
                            });
                        } else {
                            toastr.error('Something went wrong. Please try again.');
                        }
                    }
                });
            });

            // Delete Doctor with SweetAlert confirmation
            $('.delete-btn').click(function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This doctor will be permanently deleted.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/deletedoctor/' + id,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                toastr.success('Doctor deleted successfully.');
                                setTimeout(() => location.reload(), 1500);
                            },
                            error: function() {
                                toastr.error('Failed to delete doctor.');
                            }
                        });
                    }
                });
            });

            // Toggle Status
            $('.status-toggle').change(function() {
                let id = $(this).data('id');
                $.post('/admin/statusdoctor/' + id, {}, function(response) {
                    toastr.success('Status updated.');
                    setTimeout(() => location.reload(), 1500);
                }).fail(function() {
                    toastr.error('Failed to update status.');
                });
            });

            // Open Edit Modal
            $('.edit-btn').on('click', function() {
                let doctorId = $(this).data('id');

                $.ajax({
                    url: "/admin/editdoctor/" + doctorId,
                    type: "GET",
                    success: function(data) {
                        $('#edit_doctor_id').val(data.id);
                        $('#edit_name').val(data.name);
                        $('#edit_phone').val(data.phone);
                        $('#edit_email').val(data.email);
                        $('#edit_gender').val(data.gender);
                        $('#edit_zip').val(data.zip);
                        $('#edit_address').val(data.address);
                        $('#edit_specialization').val(data.specialization);

                        $('#editDoctorModal').modal('show');
                    },
                    error: function() {
                        toastr.error('Failed to fetch doctor data.');
                    }
                });
            });

            // Update Doctor Form Submit
            $('#doctorEditForm').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ url('/admin/updatedoctor') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        toastr.success('Doctor updated successfully!');
                        $('#editDoctorModal').modal('hide');
                        setTimeout(() => location.reload(), 1500);
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function(key, value) {
                                toastr.error(value[0]);
                            });
                        } else {
                            toastr.error('Something went wrong. Please try again.');
                        }
                    }
                });
            });

        });
    </script>
@endsection
