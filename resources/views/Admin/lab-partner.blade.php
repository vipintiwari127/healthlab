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

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLabPartnerModal">Add Lab Partner</button>
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
                                    @foreach($labPartners as $index => $partner)
                                        <tr id="row-{{ $partner->id }}">
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $partner->name }}</td>
                                            <td>
                                                <a href="{{ $partner->website_link ?? '#' }}" target="_blank">View Website</a>
                                            </td>
                                            <td>
                                                @if($partner->ambulance_service == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($partner->payment_mode)
                                                    {{ $partner->payment_mode }}
                                                @else
                                                    Not Available
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($partner->created_at)->format('d M Y') }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-btn" data-id="{{ $partner->id }}">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $partner->id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Add Lab Partner Modal -->
                <div class="modal fade" id="addLabPartnerModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Lab Partner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="form-horizontal" id="partnerlabForm" runat="server" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Name&nbsp;</label>
                                            <input type="text" class="form-control" name="name" id="name" required placeholder="Name" value="" />
                                        </div>
                                        <div class="col-sm-4">
                                            <label>URL&nbsp;</label>
                                            <input type="text" class="form-control" name="url" id="url" placeholder="URL" value="" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Website Link&nbsp;</label>
                                            <input type="text" class="form-control" name="website_link" id="website_link" placeholder="Website Link" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <label>Office Email&nbsp;</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="" required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Office Phone&nbsp;</label>
                                            <input type="text" class="form-control" name="mobile" id="mobile" required placeholder="Office Phone" value="" />
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Contact Person&nbsp;</label>
                                            <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person" value="" required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Contact Person Number&nbsp;</label>
                                            <input type="text" class="form-control" name="contact_person_number" id="contact_person_number" placeholder="Contact Person Number" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>CC Emails&nbsp;</label>
                                            <input type="text" class="form-control" name="cc" id="cc" placeholder="Example - abc@gmail.com,test@gmail.com" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>BCC Emails&nbsp;</label>
                                            <input type="text" class="form-control" name="bcc" id="bcc" placeholder="Example - abc@gmail.com,test@gmail.com" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <label>Ambulance Service&nbsp;</label><br>
                                            <label style="margin-right: 15px;">
                                                <input name="ambulance_service" type="radio" value="Yes" required> &nbsp; Yes
                                            </label>
                                            <label>
                                                <input name="ambulance_service" type="radio" value="No" required> &nbsp; No
                                            </label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>State&nbsp;</label>
                                            <select class="form-control" name="state_id" id="state_id" required onchange="get_city();">
                                                <option value="">Select State</option>
                                                <option value="24">DELHI NCR</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <label>City&nbsp;</label>
                                            <select class="form-control selectpicker" name="city_id[]" id="city_id" multiple>
                                                <option value="5">Tilak Nagar</option>
                                                <option value="6">Rohini</option>
                                                <option value="7">Dwarka</option>
                                                <option value="8">Janak Puri</option>
                                                <option value="9">Nangloi</option>
                                                <option value="10">Delhi</option>
                                                <option value="12">Vikaspuri</option>
                                                <option value="13">Uttam Nagar</option>
                                                <option value="14">Paschim Vihar</option>
                                                <option value="15">Avtar Enclave</option>
                                                <option value="16">Prashant Vihar</option>
                                                <option value="17">Pitam Pura</option>
                                                <option value="18">Shakti Vihar</option>
                                                <option value="19">Old Rajender Nagar</option>
                                                <option value="20">Rama Park</option>
                                                <option value="21">Mohan Garden Extension</option>
                                                <option value="22">Bhagwati Garden</option>
                                                <option value="23">Peera Garhi</option>
                                                <option value="24">Paschim Enclave</option>
                                                <option value="25">Maharani Bagh</option>
                                                <option value="26">Karkardooma</option>
                                                <option value="27">Durgapuri</option>
                                                <option value="28">Krishna Nagar</option>
                                                <option value="29">Dilshad Garden</option>
                                                <option value="30">Yamuna Vihar</option>
                                                <option value="31">Rajouri Garden</option>
                                                <option value="32">Punjabi Bagh</option>
                                                <option value="33">HARSH VIHAR</option>
                                                <option value="34">Yusuf Sarai</option>
                                                <option value="35">Green Park</option>
                                                <option value="36">Saket</option>
                                                <option value="37">Sarita Vihar</option>
                                                <option value="38">NAJAFGARH</option>
                                                <option value="39">NOIDA</option>
                                                <option value="40">Gurgaon</option>
                                                <option value="41">Gurugram</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Pincode&nbsp;</label>
                                            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>Address&nbsp;</label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Lab Services Available&nbsp;</label>
                                            <input type="text" class="form-control" name="services" id="services" placeholder="Lab Services Available" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <label>Certification&nbsp;</label>
                                            <input type="text" class="form-control" name="certification" id="certification" placeholder="Certification" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Ultrasound Time&nbsp;</label>
                                            <input type="text" class="form-control" name="ultrasound_time" id="ultrasound_time" placeholder="Ultrasound Time" value="">
                                        </div>
                                        <div class="col-sm-5">
                                            <label>Off Day&nbsp;</label>
                                            <input type="text" class="form-control" name="offday" id="offday" placeholder="Off Day" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Lab Timing&nbsp;</label>
                                            <input type="text" class="form-control" name="lab_timing" id="lab_timing" placeholder="Lab Timing" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Sunday Lab Timing&nbsp;</label>
                                            <input type="text" class="form-control" name="sunday_lab_timing" id="sunday_lab_timing" placeholder="Sunday Lab Timing" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Payment Mode&nbsp;</label>
                                            <select class="form-control" name="payment_mode" id="payment_mode" required>
                                                <option value="">Select Payment Mode</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Online">Online</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Description&nbsp;</label>
                                            <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Trust Matter&nbsp;</label>
                                            <textarea class="form-control" rows="8" cols="50" style="height: 86px;" name="trust_matter" id="trust_matter"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <hr>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Logo:&nbsp;(Size - 180 * 90)</label>
                                            <div class="slim" style="width:180px; height:90px;" data-meta-user-id="1220" data-ratio="180:90" data-size="180,90">
                                                <input type="file" name="logo" id="logo">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Upload Document:&nbsp;</label>
                                            <input type="file" name="document" id="document">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Lab Photo: (Size - 180 * 90)&nbsp;</label>
                                            <input type="file" name="lab_photo[]" id="lab_photo" multiple>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Lab Partner Modal -->
                <div class="modal fade" id="editLabPartnerModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Lab Partner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="form-horizontal" id="editPartnerlabForm" runat="server" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="edit_labpartner_id" name="id">
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Name&nbsp;</label>
                                            <input type="text" class="form-control" name="name" id="edit_name" required placeholder="Name" value="" />
                                        </div>
                                        <div class="col-sm-4">
                                            <label>URL&nbsp;</label>
                                            <input type="text" class="form-control" name="url" id="edit_url" placeholder="URL" value="" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Website Link&nbsp;</label>
                                            <input type="text" class="form-control" name="website_link" id="edit_website_link" placeholder="Website Link" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <label>Office Email&nbsp;</label>
                                            <input type="email" class="form-control" name="email" id="edit_email" placeholder="Email" value="" required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Office Phone&nbsp;</label>
                                            <input type="text" class="form-control" name="mobile" id="edit_mobile" required placeholder="Office Phone" value="" />
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Contact Person&nbsp;</label>
                                            <input type="text" class="form-control" name="contact_person" id="edit_contact_person" placeholder="Contact Person" value="" required>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Contact Person Number&nbsp;</label>
                                            <input type="text" class="form-control" name="contact_person_number" id="edit_contact_person_number" placeholder="Contact Person Number" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>CC Emails&nbsp;</label>
                                            <input type="text" class="form-control" name="cc" id="edit_cc" placeholder="Example - abc@gmail.com,test@gmail.com" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>BCC Emails&nbsp;</label>
                                            <input type="text" class="form-control" name="bcc" id="edit_bcc" placeholder="Example - abc@gmail.com,test@gmail.com" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <label>Ambulance Service&nbsp;</label><br>
                                            <label style="margin-right: 15px;">
                                                <input name="ambulance_service" type="radio" value="Yes" required> &nbsp; Yes
                                            </label>
                                            <label>
                                                <input name="ambulance_service" type="radio" value="No" required> &nbsp; No
                                            </label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>State&nbsp;</label>
                                            <select class="form-control" name="state_id" id="edit_state_id" required onchange="get_city();">
                                                <option value="">Select State</option>
                                                <option value="24">DELHI NCR</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <label>City&nbsp;</label>
                                            <select class="form-control selectpicker" name="city_id[]" id="edit_city_id" multiple>
                                                <option value="5">Tilak Nagar</option>
                                                <option value="6">Rohini</option>
                                                <option value="7">Dwarka</option>
                                                <option value="8">Janak Puri</option>
                                                <option value="9">Nangloi</option>
                                                <option value="10">Delhi</option>
                                                <option value="12">Vikaspuri</option>
                                                <option value="13">Uttam Nagar</option>
                                                <option value="14">Paschim Vihar</option>
                                                <option value="15">Avtar Enclave</option>
                                                <option value="16">Prashant Vihar</option>
                                                <option value="17">Pitam Pura</option>
                                                <option value="18">Shakti Vihar</option>
                                                <option value="19">Old Rajender Nagar</option>
                                                <option value="20">Rama Park</option>
                                                <option value="21">Mohan Garden Extension</option>
                                                <option value="22">Bhagwati Garden</option>
                                                <option value="23">Peera Garhi</option>
                                                <option value="24">Paschim Enclave</option>
                                                <option value="25">Maharani Bagh</option>
                                                <option value="26">Karkardooma</option>
                                                <option value="27">Durgapuri</option>
                                                <option value="28">Krishna Nagar</option>
                                                <option value="29">Dilshad Garden</option>
                                                <option value="30">Yamuna Vihar</option>
                                                <option value="31">Rajouri Garden</option>
                                                <option value="32">Punjabi Bagh</option>
                                                <option value="33">HARSH VIHAR</option>
                                                <option value="34">Yusuf Sarai</option>
                                                <option value="35">Green Park</option>
                                                <option value="36">Saket</option>
                                                <option value="37">Sarita Vihar</option>
                                                <option value="38">NAJAFGARH</option>
                                                <option value="39">NOIDA</option>
                                                <option value="40">Gurgaon</option>
                                                <option value="41">Gurugram</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label>Pincode&nbsp;</label>
                                            <input type="text" class="form-control" name="pincode" id="edit_pincode" placeholder="Pincode" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>Address&nbsp;</label>
                                            <input type="text" class="form-control" name="address" id="edit_address" placeholder="Address" value="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Lab Services Available&nbsp;</label>
                                            <input type="text" class="form-control" name="services" id="edit_services" placeholder="Lab Services Available" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <label>Certification&nbsp;</label>
                                            <input type="text" class="form-control" name="certification" id="edit_certification" placeholder="Certification" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Ultrasound Time&nbsp;</label>
                                            <input type="text" class="form-control" name="ultrasound_time" id="edit_ultrasound_time" placeholder="Ultrasound Time" value="">
                                        </div>
                                        <div class="col-sm-5">
                                            <label>Off Day&nbsp;</label>
                                            <input type="text" class="form-control" name="offday" id="edit_offday" placeholder="Off Day" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Lab Timing&nbsp;</label>
                                            <input type="text" class="form-control" name="lab_timing" id="edit_lab_timing" placeholder="Lab Timing" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Sunday Lab Timing&nbsp;</label>
                                            <input type="text" class="form-control" name="sunday_lab_timing" id="edit_sunday_lab_timing" placeholder="Sunday Lab Timing" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Payment Mode&nbsp;</label>
                                            <select class="form-control" name="payment_mode" id="edit_payment_mode" required>
                                                <option value="">Select Payment Mode</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Online">Online</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Description&nbsp;</label>
                                            <input type="text" class="form-control" name="description" id="edit_description" placeholder="Description" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label>Trust Matter&nbsp;</label>
                                            <textarea class="form-control" rows="8" cols="50" style="height: 86px;" name="trust_matter" id="edit_trust_matter"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <hr>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Logo:&nbsp;(Size - 180 * 90)</label>
                                            <div class="slim" style="width:180px; height:90px;" data-meta-user-id="1220" data-ratio="180:90" data-size="180,90">
                                                <input type="file" name="logo" id="edit_logo">
                                            </div>
                                            <img src="" id="editLogoPreview" alt="" style="max-width: 180px; max-height: 90px;">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Upload Document:&nbsp;</label>
                                            <input type="file" name="document" id="edit_document">
                                            <img src="" id="editdocumentPreview" alt="" style="max-width: 180px; max-height: 90px;">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Lab Photo: (Size - 180 * 90)&nbsp;</label>
                                            <input type="file" name="lab_photo" id="edit_lab_photo" multiple>
                                            <img src="" id="editlab_photosPreview" alt="" style="max-width: 180px; max-height: 90px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-success">Save</button>
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
            $('#partnerlabForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: "{{ url('admin/addlabpartner') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    success: function(response) {
                        alert('Lab partner added successfully!');
                        $('#partnerlabForm')[0].reset();
                        $('#addLabPartnerModal').modal('hide');
                        location.reload(); // Reload to reflect changes
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        if (errors) {
                            $.each(errors, function(key, value) {
                                errorMessages += value[0] + '\n';
                            });
                            alert(errorMessages);
                        } else {
                            alert('Something went wrong. Please try again.');
                        }
                    }
                });
            });

            $('.delete-btn').click(function() {
                let id = $(this).data('id');
                if (confirm("Are you sure you want to delete this partner?")) {
                    $.ajax({
                        url: '/admin/deletelabpartner/' + id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        success: function(response) {
                            $('#row-' + id).remove();
                            alert('Partner deleted successfully.');
                        },
                        error: function(xhr) {
                            alert('Something went wrong. Please try again.');
                        }
                    });
                }
            });

            $('.edit-btn').on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/admin/editlabpartner/' + id,
                    type: 'GET',
                    success: function(response) {
                        // Populate the modal form with the fetched data
                        $('#edit_labpartner_id').val(response.id);
                        $('#edit_name').val(response.name);
                        $('#edit_url').val(response.url);
                        $('#edit_website_link').val(response.website_link);
                        $('#edit_email').val(response.email);
                        $('#edit_mobile').val(response.mobile);
                        $('#edit_contact_person').val(response.contact_person);
                        $('#edit_contact_person_number').val(response.contact_person_number);
                        $('#edit_cc').val(response.cc);
                        $('#edit_bcc').val(response.bcc);
                        $('input[name="ambulance_service"][value="' + response.ambulance_service + '"]').prop('checked', true);
                        $('#edit_state_id').val(response.state_id);
                        $('#edit_city_id').val(response.city_id);
                        $('#edit_pincode').val(response.pincode);
                        $('#edit_address').val(response.address);
                        $('#edit_services').val(response.services);
                        $('#edit_certification').val(response.certification);
                        $('#edit_ultrasound_time').val(response.ultrasound_time);
                        $('#edit_offday').val(response.offday);
                        $('#edit_lab_timing').val(response.lab_timing);
                        $('#edit_sunday_lab_timing').val(response.sunday_lab_timing);
                        $('#edit_payment_mode').val(response.payment_mode);
                        $('#edit_description').val(response.description);
                        $('#edit_trust_matter').val(response.trust_matter);
                        $('#editLogoPreview').attr('src', '/' + response.logo);
                        $('#editdocumentPreview').attr('src', '/' + response.document);
                        $('#editlab_photosPreview').attr('src', '/' + response.lab_photos);
                        // Show the modal
                        $('#editLabPartnerModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Something went wrong. Please try again.');
                    }
                });
            });

            $('#editPartnerlabForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: "{{ url('/admin/updatelabpartner') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    success: function(response) {
                        alert('Lab partner updated successfully!');
                        $('#editLabPartnerModal').modal('hide');
                        location.reload(); // Reload to reflect changes
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        if (errors) {
                            $.each(errors, function(key, value) {
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
    </script>
@endsection
