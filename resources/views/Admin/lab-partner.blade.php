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
                                    <a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Lab Partner
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#labPartnerModal">Add
                    Lab Partner</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Name</th>
                                        <th>View</th>
                                        <th>Active Status</th>
                                        <th>Status for Customer Booking</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($labPartners as $index => $partner)
                                        <tr id="row-{{ $partner->id }}">
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $partner->name }}</td>
                                            <td>
                                                <a href="{{ $partner->url ?? '#' }}" target="_blank">Website</a>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input toggle-ambulance" type="checkbox"
                                                        data-id="{{ $partner->id }}"
                                                        {{ $partner->ambulance_service == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label">
                                                        {{ $partner->ambulance_service == 1 ? 'Active' : 'Inactive' }}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input toggle-payment" type="checkbox"
                                                        data-id="{{ $partner->id }}"
                                                        {{ $partner->payment_mode == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label">
                                                        {{ $partner->payment_mode == 1 ? 'Active' : 'Inactive' }}
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($partner->created_at)->format('d M Y') }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-btn"
                                                    data-id="{{ $partner->id }}">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-btn"
                                                    data-id="{{ $partner->id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Unified Lab Partner Modal -->
                <div class="modal fade" id="labPartnerModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">Add Lab Partner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="form-horizontal" id="labPartnerForm" runat="server" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="labpartner_id" name="id">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                required placeholder="Name" value="" />
                                            <div class="invalid-feedback">Please choose a Name.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="url" class="form-label">Url</label>
                                            <input type="url" class="form-control" name="url" id="url"
                                                placeholder="URL" value="" readonly>
                                            <div class="invalid-feedback">Please choose a Url.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="website_link" class="form-label">Website Link</label>
                                            <input type="url" class="form-control" name="website_link" id="website_link"
                                                placeholder="Website Link" value="">
                                            <div class="invalid-feedback">Please choose a Website Link.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="email" class="form-label">Office Email</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Email" value="" required>
                                            <div class="invalid-feedback">Please choose an Office Email.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="mobile" class="form-label">Office Phone</label>
                                            <input type="number" class="form-control" name="mobile" id="mobile"
                                                placeholder="Office Phone" value="" required>
                                            <div class="invalid-feedback">Please choose an Office Phone.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="contact_person" class="form-label">Contact Person</label>
                                            <input type="text" class="form-control" name="contact_person"
                                                id="contact_person" placeholder="Contact Person" value="" required>
                                            <div class="invalid-feedback">Please choose a Contact Person.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="contact_person_number" class="form-label">Contact Person
                                                Number</label>
                                            <input type="number" class="form-control" name="contact_person_number"
                                                id="contact_person_number" placeholder="Contact Person Number"
                                                value="" required>
                                            <div class="invalid-feedback">Please choose a Contact Person Number.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="cc" class="form-label">CC Emails</label>
                                            <input type="email" class="form-control" name="cc" id="cc"
                                                placeholder="Example - abc@gmail.com,test@gmail.com" value="">
                                            <div class="invalid-feedback">Please choose CC Emails.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bcc" class="form-label">BCC Emails</label>
                                            <input type="email" class="form-control" name="bcc" id="bcc"
                                                placeholder="Example - abc@gmail.com,test@gmail.com" value="">
                                            <div class="invalid-feedback">Please choose BCC Emails.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ambulance_service" class="form-label">Ambulance
                                                Service</label><br>
                                            <label style="margin-right: 15px;">
                                                <input name="ambulance_service" type="radio" value="Yes" required>
                                                &nbsp; Yes
                                            </label>
                                            <label>
                                                <input name="ambulance_service" type="radio" value="No" required>
                                                &nbsp; No
                                            </label>
                                            <div class="invalid-feedback">Please choose an Ambulance Service.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="state_id" class="form-label">State</label>
                                            <select class="form-control" name="state_id" id="state_id" required
                                                onchange="get_city();">
                                                <option value="">Select State</option>
                                                @foreach ($state as $states)
                                                    <option value="{{ $states->id }}">{{ $states->stateName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please choose a State.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="city_id" class="form-label">City Name</label>
                                            <select class="form-control" name="city_id" id="city_id" required>
                                                <option value="">Select City</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->city_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please choose a City Name.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="pincode" class="form-label">PinCode</label>
                                            <input type="number" class="form-control" name="pincode" id="pincode"
                                                placeholder="Pincode" value="">
                                            <div class="invalid-feedback">Please choose a PinCode.</div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" id="address"
                                                placeholder="Address" value="">
                                            <div class="invalid-feedback">Please choose an Address.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="form-label">Lab Services Available</label>
                                            <input type="text" class="form-control" name="services" id="services"
                                                placeholder="Lab Services Available" value="">
                                            <div class="invalid-feedback">Please choose Lab Services Available.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="certification" class="form-label">Certification</label>
                                            <input type="text" class="form-control" name="certification"
                                                id="certification" placeholder="Certification" value="">
                                            <div class="invalid-feedback">Please choose a Certification.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ultrasound_time" class="form-label">Ultrasound Time</label>
                                            <input type="time" class="form-control" name="ultrasound_time"
                                                id="ultrasound_time" placeholder="Ultrasound Time" value="">
                                            <div class="invalid-feedback">Please choose an Ultrasound Time.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="offday" class="form-label">Off Day</label>
                                            <input type="text" class="form-control" name="offday" id="offday"
                                                placeholder="Off Day" value="">
                                            <div class="invalid-feedback">Please choose an Off Day.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="lab_timing" class="form-label">Lab Timing</label>
                                            <input type="text" class="form-control" name="lab_timing" id="lab_timing"
                                                placeholder="Lab Timing" value="">
                                            <div class="invalid-feedback">Please choose a Lab Timing.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="sunday_lab_timing" class="form-label">Sunday Lab Timing</label>
                                            <input type="text" class="form-control" name="sunday_lab_timing"
                                                id="sunday_lab_timing" placeholder="Sunday Lab Timing" value="">
                                            <div class="invalid-feedback">Please choose a Sunday Lab Timing.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="payment_mode" class="form-label">Payment Mode</label>
                                            <select class="form-control" name="payment_mode" id="payment_mode" required>
                                                <option value="">Select Payment Mode</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Online">Online</option>
                                            </select>
                                            <div class="invalid-feedback">Please choose a Payment Mode.</div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" name="description" id="description" placeholder="Description" value=""></textarea>
                                            <div class="invalid-feedback">Please choose a Description.</div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="trust_matter" class="form-label">Trust Matter</label>
                                            <textarea class="form-control" rows="8" cols="50" style="height: 86px;" name="trust_matter"
                                                id="trust_matter"></textarea>
                                            <div class="invalid-feedback">Please choose a Trust Matter.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="logo" class="form-label">Logo: (Size - 180 * 90)</label>
                                            <div class="slim" style="width:180px; height:90px;"
                                                data-meta-user-id="1220" data-ratio="180:90" data-size="180,90">
                                                <input type="file" name="logo" id="logo">
                                            </div>
                                            <div class="invalid-feedback">Please choose a Logo: (Size - 180 * 90).</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="document" class="form-label">Upload Document:</label>
                                            <input type="file" name="document" id="document">
                                            <div class="invalid-feedback">Please choose a Document.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="lab_photo" class="form-label">Lab Photo: (Size - 180 * 90)</label>
                                            <input type="file" name="lab_photo" id="lab_photo" multiple>
                                            <div class="invalid-feedback">Please choose a Lab Photo: (Size - 180 * 90).
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
                    </div>
                </div>
            </div>
            <!-- end page content-->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle Add/Edit Modal
            $('.edit-btn').on('click', function() {
                let id = $(this).data('id');
                $('#modalTitle').text('Edit Lab Partner');
                $.ajax({
                    url: '/admin/editlabpartner/' + id,
                    type: 'GET',
                    success: function(response) {
                        $('#labpartner_id').val(response.id);
                        $('#name').val(response.name);
                        $('#url').val(response.url);
                        $('#website_link').val(response.website_link);
                        $('#email').val(response.email);
                        $('#mobile').val(response.mobile);
                        $('#contact_person').val(response.contact_person);
                        $('#contact_person_number').val(response.contact_person_number);
                        $('#cc').val(response.cc);
                        $('#bcc').val(response.bcc);
                        $('input[name="ambulance_service"][value="' + response
                            .ambulance_service + '"]').prop('checked', true);
                        $('#state_id').val(response.state_id);
                        $('#city_id').val(response.city_id);
                        $('#pincode').val(response.pincode);
                        $('#address').val(response.address);
                        $('#services').val(response.services);
                        $('#certification').val(response.certification);
                        $('#ultrasound_time').val(response.ultrasound_time);
                        $('#offday').val(response.offday);
                        $('#lab_timing').val(response.lab_timing);
                        $('#sunday_lab_timing').val(response.sunday_lab_timing);
                        $('#payment_mode').val(response.payment_mode);
                        $('#description').val(response.description);
                        $('#trust_matter').val(response.trust_matter);
                        $('#labPartnerModal').modal('show');
                    },
                    error: function() {
                        toastr.error('Something went wrong while fetching data.');
                    }
                });
            });

            // Reset form when modal is closed
            $('#labPartnerModal').on('hidden.bs.modal', function() {
                $('#labPartnerForm')[0].reset();
                $('#modalTitle').text('Add Lab Partner');
            });

            // Handle form submission
            $('#labPartnerForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let url = $('#labpartner_id').val() ? '/admin/updatelabpartner' : '/admin/addlabpartner';
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    success: function(response) {
                        toastr.success('Lab partner ' + ($('#labpartner_id').val() ? 'updated' :
                            'added') + ' successfully!');
                        $('#labPartnerForm')[0].reset();
                        $('#labPartnerModal').modal('hide');
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

            // Delete Partner with SweetAlert
            $('.delete-btn').click(function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This lab partner will be permanently deleted.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/deletelabpartner/' + id,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                toastr.success('Partner deleted successfully.');
                                setTimeout(() => location.reload(), 1500);
                            },
                            error: function() {
                                toastr.error('Something went wrong. Please try again.');
                            }
                        });
                    }
                });
            });

            // Ambulance Toggle
            $('.toggle-ambulance').change(function() {
                let id = $(this).data('id');
                let status = $(this).is(':checked') ? 1 : 0;
                $.post('/admin/ambulance-toggle/' + id, {
                    status: status
                }, function(res) {
                    toastr.success('Ambulance Service updated');
                    location.reload();
                });
            });

            // Payment Mode Toggle
            $('.toggle-payment').change(function() {
                let id = $(this).data('id');
                let status = $(this).is(':checked') ? 1 : 0;
                $.post('/admin/payment-toggle/' + id, {
                    payment_mode: status
                }, function(res) {
                    toastr.success('Payment mode updated');
                    location.reload();
                });
            });
        });
    </script>
@endsection
