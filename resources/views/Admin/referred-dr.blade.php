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
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $index => $doctor)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $doctor->name }}</td>
                                            <td>{{ $doctor->email }}</td>
                                            <td>{{ $doctor->phone }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="statusSwitch{{ $doctor->id }}"
                                                        onchange="toggleStatus({{ $doctor->id }})"
                                                        {{ $doctor->status ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary"
                                                    onclick="viewDoctor({{ $doctor->id }})">
                                                    View
                                                </button>
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
                <!-- View Doctor Modal -->
                <div class="modal fade" id="viewDoctorModal" tabindex="-1" aria-labelledby="viewDoctorModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Doctor Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <td id="view_name"></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td id="view_email"></td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td id="view_phone"></td>
                                        </tr>
                                        <tr>
                                            <th>Qualification</th>
                                            <td id="view_qualification"></td>
                                        </tr>
                                        <tr>
                                            <th>Experience</th>
                                            <td id="view_experience"></td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td id="view_city"></td>
                                        </tr>
                                        <tr>
                                            <th>DoB</th>
                                            <td id="view_dob"></td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td id="view_gender"></td>
                                        </tr>
                                        <tr>
                                            <th>Age</th>
                                            <td id="view_age"></td>
                                        </tr>
                                        <tr>
                                            <th>ZIP</th>
                                            <td id="view_zip"></td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td id="view_address"></td>
                                        </tr>
                                        <tr>
                                            <th>Specialization</th>
                                            <td id="view_specialization"></td>
                                        </tr>
                                        <tr>
                                            <th>Languages</th>
                                            <td id="view_languages"></td>
                                        </tr>
                                        <tr>
                                            <th>About Doctor</th>
                                            <td id="view_about"></td>
                                        </tr>
                                        <tr>
                                            <th>Profile Photo</th>
                                            <td><img id="view_photo" src="" width="100" class="img-thumbnail" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
                                <form class="row g-3 needs-validation" id="doctorForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" id="doctor_id">
                                    <div class="col-md-5">
                                        <label for="bsValidation1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name" required="">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bsValidation3" class="form-label">Phone</label>
                                        <input type="Number" class="form-control" id="phone" name="phone"
                                            placeholder="Phone" required="">
                                        <div class="invalid-feedback">
                                            Please choose a Phone Number.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation4" class="form-label">Profile Photo</label>
                                        <input type="file" class="form-control" id="ProfilePhotos"
                                            name="ProfilePhoto" placeholder="Profile Photo">
                                        <div id="existingPhoto" class="mt-2"></div>
                                        <div class="invalid-feedback">
                                            Please provide a valid Profile Photo.
                                        </div>
                                    </div>



                                    <div class="col-md-2">
                                        <label for="bsValidation3" class="form-label">Experience</label>
                                        <input type="number" class="form-control" min="0" id="YearsofExperience"
                                            name="YearsofExperience" placeholder="Years of Experience" required="">
                                        <div class="invalid-feedback">
                                            Please choose a Years Experience.
                                        </div>
                                    </div>



                                    <div class="col-md-2">
                                        <label for="bsValidation12" class="form-label">Pin Code</label>
                                        <input type="number" class="form-control" id="zip" name="zip"
                                            placeholder="Pin Code" required="">
                                        <div class="invalid-feedback">
                                            Please enter a valid Pin Code.
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
                                            <option value="Other">Other</option>
                                        </select>

                                        <div class="invalid-feedback">Please select a valid Gender.</div>
                                    </div>

                                   
                                    <div class="col-md-3">
                                        <label for="DateofBirth" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="DateofBirth" name="DateofBirth"
                                            required>
                                        <div class="invalid-feedback">Please enter a valid Date of Birth.</div>
                                    </div>

                                    <div class="col-md-1">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="text" class="form-control" id="age" name="age"
                                            readonly>
                                    </div>
                                  
                                    <div class="col-md-4">
                                        <label class="form-label">Languages</label>
                                        <div class="form-control"
                                            style="height:auto; max-height: 200px; overflow-y: auto;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="languages[]"
                                                    value="English" id="languageEnglish">
                                                <label class="form-check-label" for="languageEnglish">English</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="languages[]"
                                                    value="Hindi" id="languageHindi">
                                                <label class="form-check-label" for="languageHindi">Hindi</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="languages[]"
                                                    value="Other" id="languageOther">
                                                <label class="form-check-label" for="languageOther">Other</label>
                                            </div>
                                            <input type="text" class="form-control mt-2 d-none" id="other_language"
                                                name="other_language" placeholder="Specify other language">
                                        </div>
                                        <div class="invalid-feedback">
                                            Please select at least one city.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Qualification</label>
                                        <div class="form-control"
                                            style="height:auto; max-height: 200px; overflow-y: auto;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="Qualification[]"
                                                    value="MBBS" id="mbbs">
                                                <label class="form-check-label" for="mbbs">MBBS</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="Qualification[]"
                                                    value="MD" id="md">
                                                <label class="form-check-label" for="md">MD</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="Qualification[]"
                                                    value="Other" id="otherCheck">
                                                <label class="form-check-label" for="otherCheck">Other</label>
                                            </div>

                                            <!-- Hidden input for "Other" qualification -->
                                            <input type="text" id="other_qualification" name="other_qualification"
                                                class="form-control mt-2 d-none" placeholder="Enter other qualification">

                                            <div class="invalid-feedback">
                                                Please choose at least one Qualification.
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please select at least one city.
                                        </div>
                                    </div>
                                      <div class="col-md-4">
                                        <label for="bsValidation12" class="form-label">City</label>
                                        <div class="form-control"
                                            style="height:auto; max-height: 200px; overflow-y: auto;">
                                            @foreach ($cities as $city)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="City[]"
                                                        value="{{ $city->city_name }}" id="city_{{ $loop->index }}">
                                                    <label class="form-check-label" for="city_{{ $loop->index }}">
                                                        {{ $city->city_name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="invalid-feedback">
                                            Please select at least one city.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Full Address</label>
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
                                        <label for="bsValidation10" class="form-label">About Doctor </label>
                                        <textarea class="form-control" id="about_doctor" name="about_doctor" placeholder="About Doctor   ..."
                                            rows="3" required=""></textarea>
                                        <div class="invalid-feedback">
                                            Please enter a valid About Doctor .
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
            let url = id ?
                `/admin/doctor-management/update/${id}` :
                `{{ route('doctor.store') }}`;

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
                $('#YearsofExperience').val(data.YearsofExperience);
                $('#gender').val(data.gender).trigger('change');
                $('#zip').val(data.zip);
                $('#DateofBirth').val(data.DateofBirth);
                // $('#City').val(data.City);
                $('#address').val(data.address);
                $('#specialization').val(data.specialization);

                // === Qualification ===
                if (data.Qualification === "Other") {
                    $('#Qualification').val('Other').trigger('change');
                    $('#other_qualification').removeClass('d-none').val(data.other_qualification || '');
                } else {
                    $('#Qualification').val(data.Qualification).trigger('change');
                    $('#other_qualification').addClass('d-none').val('');
                }

                // === Cities (checkbox multi-select) ===
                $('input[name="City[]"]').prop('checked', false); // Uncheck all first

                try {
                    const cities = Array.isArray(data.City) ? data.City : JSON.parse(data.City || '[]');
                    cities.forEach(city => {
                        $(`input[name="City[]"][value="${city}"]`).prop('checked', true);
                    });
                } catch (e) {
                    console.error("City parse error:", e);
                }

                // === Languages ===
                $('input[name="languages[]"]').prop('checked', false);
                $('#other_language').val('').addClass('d-none');

                try {
                    const langs = JSON.parse(data.languages || '[]');
                    langs.forEach(lang => {
                        if (['English', 'Hindi', 'Other'].includes(lang)) {
                            $(`input[name="languages[]"][value="${lang}"]`).prop('checked', true);
                            if (lang === 'Other') {
                                $('#other_language').removeClass('d-none').val(data.other_language || '');
                            }
                        } else {
                            // Treat this as custom other
                            $('#languageOther').prop('checked', true);
                            $('#other_language').removeClass('d-none').val(lang);
                        }
                    });
                } catch (e) {
                    console.error("Language parse error:", e);
                }

                // === Age calculation from DOB ===
                if (data.DateofBirth) {
                    const dob = new Date(data.DateofBirth);
                    const today = new Date();
                    let age = today.getFullYear() - dob.getFullYear();
                    const m = today.getMonth() - dob.getMonth();
                    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                        age--;
                    }
                    $('#age').val(age);
                }

                // === Existing Photo ===
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

        function viewDoctor(id) {
            $.get(`/admin/doctor-management/edit/${id}`, function(data) {
                $('#view_name').text(data.name);
                $('#view_email').text(data.email);
                $('#view_phone').text(data.phone);
                $('#view_qualification').text(data.Qualification);
                $('#view_experience').text(data.YearsofExperience);
                $('#view_dob').text(data.DateofBirth);
                $('#view_gender').text(data.gender);
                $('#view_age').text(data.age);
                $('#view_zip').text(data.zip);
                $('#view_address').text(data.address);
                $('#view_specialization').text(data.specialization);
                $('#view_about').text(data.about_doctor);

                // Handle languages
                try {
                    const langs = JSON.parse(data.languages || '[]');
                    $('#view_languages').text(langs.join(', '));
                } catch (e) {
                    $('#view_languages').text(data.languages || '');
                }

                // Handle cities
                try {
                    const cities = Array.isArray(data.City) ? data.City : JSON.parse(data.City || '[]');
                    $('#view_city').text(cities.join(', '));
                } catch (e) {
                    $('#view_city').text(data.City);
                }

                // Handle photo
                if (data.ProfilePhoto) {
                    $('#view_photo').attr('src', `/uploads/${data.ProfilePhoto}`);
                } else {
                    $('#view_photo').attr('src', '');
                }

                $('#viewDoctorModal').modal('show');
            });
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Show other qualification

            document.getElementById("otherCheck").addEventListener("change", function() {
                const otherInput = document.getElementById("other_qualification");
                if (this.checked) {
                    otherInput.classList.remove("d-none");
                } else {
                    otherInput.classList.add("d-none");
                    otherInput.value = ""; // Clear value if unchecked
                }
            });



            // Show other language input
            document.getElementById('languageOther').addEventListener('change', function() {
                let otherLangField = document.getElementById('other_language');
                if (this.checked) {
                    otherLangField.classList.remove('d-none');
                } else {
                    otherLangField.classList.add('d-none');
                    otherLangField.value = '';
                }
            });

            // DOB to Age Calculation
            document.getElementById('DateofBirth').addEventListener('change', function() {
                let dob = new Date(this.value);
                let today = new Date();
                let age = today.getFullYear() - dob.getFullYear();
                let m = today.getMonth() - dob.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }
                document.getElementById('age').value = age;
            });
        });
    </script>
@endsection
