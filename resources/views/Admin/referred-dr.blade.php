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
                                    <th>Qualification</th>
                                    <th>Years of Experience</th>
                                    <th>City</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Age</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctors as $doctor)
                                <tr>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->Qualification }}</td>
                                    <td>{{ $doctor->YearsofExperience }}</td>
                                    <td>{{ $doctor->City }}</td>    
                                    <td>{{ $doctor->DateofBirth }}</td>
                                    <td>{{ $doctor->gender }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ \Carbon\Carbon::parse($doctor->DateofBirth)->age }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                id="statusSwitch{{ $doctor->id }}"
                                                onchange="toggleStatus({{ $doctor->id }})" {{ $doctor->status ?
                                            'checked' :
                                            '' }}>
                                        </div>
                                       
                                    <td>
                                        <button class="btn btn-sm btn-info"
                                            onclick="editdoctor({{ $doctor->id }})">Edit</button>
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="card-body p-4">
                            <form class="row g-3 needs-validation" id="doctorForm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="doctor_id">
                                <div class="col-md-7">
                                    <label for="bsValidation1" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                        required="">
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
                                    <label for="bsValidation4" class="form-label">Profile Photo</label>
                                    <input type="file" class="form-control" id="ProfilePhotos" name="ProfilePhoto"
                                        placeholder="Profile Photo">
                                    <div id="existingPhoto" class="mt-2"></div>
                                    <div class="invalid-feedback">
                                        Please provide a valid Profile Photo.
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="bsValidation3" class="form-label">Qualification</label>
                                    <input type="text" class="form-control" id="Qualification" name="Qualification"
                                        placeholder="Qualification" required="">
                                    <div class="invalid-feedback">
                                        Please choose a Qualification .
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="bsValidation3" class="form-label">Years of Experience</label>
                                    <input type="text" class="form-control" id="YearsofExperience"
                                        name="YearsofExperience" placeholder="Years of Experience" required="">
                                    <div class="invalid-feedback">
                                        Please choose a Years of Experience .
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Languages</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="languages[]"
                                            value="English" id="languageEnglish">
                                        <label class="form-check-label" for="languageEnglish">
                                            English
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="languages[]" value="Hindi"
                                            id="languageHindi">
                                        <label class="form-check-label" for="languageHindi">
                                            Hindi
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="languages[]" value="Other"
                                            id="languageOther">
                                        <label class="form-check-label" for="languageOther">
                                            Other
                                        </label>
                                    </div>
                                    <div class="invalid-feedback d-block">
                                        {{-- Please select at least one language. --}}
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label for="bsValidation4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                        required="">
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
                                        <option value="Other">Other</option>
                                    </select>

                                    <div class="invalid-feedback">Please select a valid Gender.</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="bsValidation12" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip"
                                        required="">
                                    <div class="invalid-feedback">
                                        Please enter a valid Zip code.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="bsValidation12" class="form-label">Date of Birth</label>
                                    <input type="text" class="form-control" id="DateofBirth" name="DateofBirth"
                                        placeholder="Date of Birth" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid Zip code.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="bsValidation12" class="form-label">City</label>
                                    <input type="text" class="form-control" id="City" name="City" placeholder="City"
                                        required="">
                                    <div class="invalid-feedback">
                                        Please enter a valid City code.
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="bsValidation13" class="form-label">Full Address</label>
                                    <textarea class="form-control" id="address" name="address" placeholder="Address ..."
                                        rows="3" required=""></textarea>
                                    <div class="invalid-feedback">
                                        Please enter a valid address.
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="bsValidation10" class="form-label">Specialization </label>
                                    <textarea class="form-control" id="specialization" name="specialization"
                                        placeholder="Specialization  ..." rows="3" required=""></textarea>
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
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Add or Update Form Submission
    $('#doctorForm').on('submit', function(e) {
        e.preventDefault();
        let id = $('#doctor_id').val();
        let url = id
            ? `/admin/doctor-management/update/${id}`
            : `{{ route('doctor.store') }}`;

        let formData = new FormData(this);

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                toastr.success("Doctor saved successfully.");
                $('#doctorForm')[0].reset();
                $('#doctor_id').val('');
                $('#existingPhoto').html('');
                $('#addDoctorModal').modal('hide');
                location.reload();
            },
            error: function(xhr) {
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    let messages = Object.values(xhr.responseJSON.errors).flat().join("<br>");
                    toastr.error(messages);
                } else {
                    toastr.error("Something went wrong.");
                }
            }
        });
    });

    // Edit Function
    function editdoctor(id) {
        $.get(`/admin/doctor-management/edit/${id}`, function(data) {
            $('#doctor_id').val(data.id);
            $('#name').val(data.name);
            $('#phone').val(data.phone);
            $('#email').val(data.email);
            $('#Qualification').val(data.Qualification);
            $('#YearsofExperience').val(data.YearsofExperience);
            $('#gender').val(data.gender).trigger('change');
            $('#zip').val(data.zip);
            $('#DateofBirth').val(data.DateofBirth);
            $('#City').val(data.City);
            $('#address').val(data.address);
            $('#specialization').val(data.specialization);

            $('input[name="languages[]"]').prop('checked', false);
            try {
                const langs = JSON.parse(data.languages || '[]');
                langs.forEach(lang => {
                    $(`input[name="languages[]"][value="${lang}"]`).prop('checked', true);
                });
            } catch (e) {
                console.error("Language parse error:", e);
            }

            if (data.ProfilePhoto) {
                $('#existingPhoto').html(`
                    <img src="/uploads/${data.ProfilePhoto}" class="img-thumbnail mt-2" width="100" />
                `);
            } else {
                $('#existingPhoto').html('');
            }

            $('#addDoctorModal').modal('show');
        });
    }

    // Delete Function
    $(document).on('click', '.delete-btn', function() {
        const id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "This doctor will be deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/doctor-management/delete/${id}`,
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

    // Status Toggle
    function toggleStatus(id) {
        $.ajax({
            url: `/admin/doctor-management/status/${id}`,
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
</script>


@endsection