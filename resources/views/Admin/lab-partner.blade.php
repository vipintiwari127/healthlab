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

                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addLabPartnerModal">Add Lab Partner</button>
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
                                                <a href="{{ $partner->website_link ?? '#' }}" target="_blank">View
                                                    Website</a>
                                            </td>
                                            <td>
                                                @if ($partner->ambulance_service == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($partner->payment_mode)
                                                    {{ $partner->payment_mode }}
                                                @else
                                                    Not Available
                                                @endif
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

                <!-- Add Lab Partner Modal -->
                <div class="modal fade" id="addLabPartnerModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Lab Partner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="form-horizontal" id="editPartnerlabForm" runat="server" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <input type="hidden" id="edit_labpartner_id" name="id">
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="edit_name"
                                                required placeholder="Name" value="" />
                                            <div class="invalid-feedback">
                                                Please choose a Name.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Url</label>
                                            <input type="url" class="form-control" name="url" id="edit_url"
                                                placeholder="URL" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Url.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Website Link </label>
                                            <input type="text" class="form-control" name="website_link"
                                                id="edit_website_link" placeholder="Website Link" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Website Link .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Office Email </label>
                                            <input type="email" class="form-control" name="email" id="edit_email"
                                                placeholder="Email" value="" required>
                                            <div class="invalid-feedback">
                                                Please choose a Office Email .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Office Phone </label>
                                            <input type="number" class="form-control" name="mobile" id="edit_mobile"
                                                required placeholder="Office Phone" value="" />
                                            <div class="invalid-feedback">
                                                Please choose a Office Phone.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Contact Person</label>
                                            <input type="number" class="form-control" name="contact_person"
                                                id="edit_contact_person" placeholder="Contact Person" value=""
                                                required>
                                            <div class="invalid-feedback">
                                                Please choose a Contact Person.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Contact Person Number</label>
                                            <input type="number" class="form-control" name="contact_person_number"
                                                id="edit_contact_person_number" placeholder="Contact Person Number"
                                                value="" required>
                                            <div class="invalid-feedback">
                                                Please choose a Contact Person Number.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">CC Emails </label>
                                            <input type="email" class="form-control" name="cc" id="edit_cc"
                                                placeholder="Example - abc@gmail.com,test@gmail.com" value="">
                                            <div class="invalid-feedback">
                                                Please choose a CC Emails.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">BCC Emails </label>
                                            <input type="text" class="form-control" name="bcc" id="edit_bcc"
                                                placeholder="Example - abc@gmail.com,test@gmail.com" value="">
                                            <div class="invalid-feedback">
                                                Please choose a BCC Emails.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Ambulance Service </label><br>
                                            <label style="margin-right: 15px;">
                                                <input name="ambulance_service" type="radio" value="Yes" required>
                                                &nbsp; Yes
                                            </label>
                                            <label>
                                                <input name="ambulance_service" type="radio" value="No" required>
                                                &nbsp; No
                                            </label>
                                            <div class="invalid-feedback">
                                                Please choose a Ambulance Service.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">State</label>
                                            <input type="text" class="form-control" name="bcc" id="edit_bcc"
                                                placeholder="Example - abc@gmail.com,test@gmail.com" value="">
                                            <div class="invalid-feedback">
                                                Please choose a State .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">City Name</label>
                                            <select class="form-control selectpicker" name="city_id[]" id="edit_city_id"
                                                multiple>
                                                <option value="5">Tilak Nagar</option>
                                                <option value="6">Rohini</option>
                                                <option value="7">Dwarka</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please choose a City Name .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">PinCode</label>
                                            <input type="number" class="form-control" name="pincode" id="edit_pincode"
                                                placeholder="Pincode" value="">
                                            <div class="invalid-feedback">
                                                Please choose a PinCode .
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="bsValidation1" class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" id="edit_address"
                                                placeholder="Address" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Address .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Lab Services Available </label>
                                            <input type="text" class="form-control" name="services"
                                                id="edit_services" placeholder="Lab Services Available" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Lab Services Available .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Certification</label>
                                            <input type="text" class="form-control" name="certification"
                                                id="edit_certification" placeholder="Certification" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Lab Certification .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Ultrasound Time </label>
                                            <input type="time" class="form-control" name="ultrasound_time"
                                                id="edit_ultrasound_time" placeholder="Ultrasound Time" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Lab Ultrasound Time.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Off Day</label>
                                            <input type="text" class="form-control" name="offday" id="edit_offday"
                                                placeholder="Off Day" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Off Day.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Lab Timing </label>
                                            <input type="time" class="form-control" name="lab_timing"
                                                id="edit_lab_timing" placeholder="Lab Timing" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Lab Timing .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Sunday Lab Timing </label>
                                            <input type="time" class="form-control" name="sunday_lab_timing"
                                                id="edit_sunday_lab_timing" placeholder="Sunday Lab Timing"
                                                value="">
                                            <div class="invalid-feedback">
                                                Please choose a Sunday Lab Timing.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Payment Mode</label>
                                            <select class="form-control" name="payment_mode" id="edit_payment_mode"
                                                required>
                                                <option value="">Select Payment Mode</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Online">Online</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please choose a Sunday Payment Mode.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="bsValidation1" class="form-label">Description</label>
                                            <textarea class="form-control" rows="5" name="description" id="edit_description" placeholder="Description"
                                                value=""></textarea>
                                            <div class="invalid-feedback">
                                                Please choose a Description.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="bsValidation1" class="form-label">Trust Matter </label>
                                            <textarea class="form-control" rows="8" cols="50" style="height: 86px;" name="trust_matter"
                                                id="edit_trust_matter"></textarea>
                                            <div class="invalid-feedback">
                                                Please choose a Trust Matter .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Logo: (Size - 180 * 90)</label>
                                            <div class="slim" style="width:180px; height:90px;"
                                                data-meta-user-id="1220" data-ratio="180:90" data-size="180,90">
                                                <input type="file" name="logo" id="edit_logo">
                                            </div>
                                            <img src="" id="editLogoPreview" alt=""
                                                style="max-width: 180px; max-height: 90px;">
                                            <div class="invalid-feedback">
                                                Please choose a Logo: (Size - 180 * 90).
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Upload Document:</label>
                                            <input type="file" name="document" id="document">
                                            <div class="invalid-feedback">
                                                Please choose a Upload Document:.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Lab Photo: (Size - 180 * 90)
                                            </label>
                                            <input type="file" name="lab_photo[]" id="lab_photo" multiple>
                                            <div class="invalid-feedback">
                                                Please choose a Lab Photo: (Size - 180 * 90) .
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

                <!-- Edit Lab Partner Modal -->
                <div class="modal fade" id="editLabPartnerModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Lab Partner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="form-horizontal" id="editPartnerlabForm" runat="server" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <input type="hidden" id="edit_labpartner_id" name="id">
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="edit_name"
                                                required placeholder="Name" value="" />
                                            <div class="invalid-feedback">
                                                Please choose a Name.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Url</label>
                                            <input type="url" class="form-control" name="url" id="edit_url"
                                                placeholder="URL" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Url.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Website Link </label>
                                            <input type="text" class="form-control" name="website_link"
                                                id="edit_website_link" placeholder="Website Link" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Website Link .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Office Email </label>
                                            <input type="email" class="form-control" name="email" id="edit_email"
                                                placeholder="Email" value="" required>
                                            <div class="invalid-feedback">
                                                Please choose a Office Email .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Office Phone </label>
                                            <input type="number" class="form-control" name="mobile" id="edit_mobile"
                                                required placeholder="Office Phone" value="" />
                                            <div class="invalid-feedback">
                                                Please choose a Office Phone.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Contact Person</label>
                                            <input type="number" class="form-control" name="contact_person"
                                                id="edit_contact_person" placeholder="Contact Person" value=""
                                                required>
                                            <div class="invalid-feedback">
                                                Please choose a Contact Person.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Contact Person Number</label>
                                            <input type="number" class="form-control" name="contact_person_number"
                                                id="edit_contact_person_number" placeholder="Contact Person Number"
                                                value="" required>
                                            <div class="invalid-feedback">
                                                Please choose a Contact Person Number.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">CC Emails </label>
                                            <input type="email" class="form-control" name="cc" id="edit_cc"
                                                placeholder="Example - abc@gmail.com,test@gmail.com" value="">
                                            <div class="invalid-feedback">
                                                Please choose a CC Emails.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">BCC Emails </label>
                                            <input type="text" class="form-control" name="bcc" id="edit_bcc"
                                                placeholder="Example - abc@gmail.com,test@gmail.com" value="">
                                            <div class="invalid-feedback">
                                                Please choose a BCC Emails.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Ambulance Service </label><br>
                                            <label style="margin-right: 15px;">
                                                <input name="ambulance_service" type="radio" value="Yes" required>
                                                &nbsp; Yes
                                            </label>
                                            <label>
                                                <input name="ambulance_service" type="radio" value="No" required>
                                                &nbsp; No
                                            </label>
                                            <div class="invalid-feedback">
                                                Please choose a Ambulance Service.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">State</label>
                                            <input type="text" class="form-control" name="bcc" id="edit_bcc"
                                                placeholder="Example - abc@gmail.com,test@gmail.com" value="">
                                            <div class="invalid-feedback">
                                                Please choose a State .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">City Name</label>
                                            <select class="form-control selectpicker" name="city_id[]" id="edit_city_id"
                                                multiple>
                                                <option value="5">Tilak Nagar</option>
                                                <option value="6">Rohini</option>
                                                <option value="7">Dwarka</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please choose a City Name .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">PinCode</label>
                                            <input type="number" class="form-control" name="pincode" id="edit_pincode"
                                                placeholder="Pincode" value="">
                                            <div class="invalid-feedback">
                                                Please choose a PinCode .
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="bsValidation1" class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" id="edit_address"
                                                placeholder="Address" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Address .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Lab Services Available </label>
                                            <input type="text" class="form-control" name="services"
                                                id="edit_services" placeholder="Lab Services Available" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Lab Services Available .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Certification</label>
                                            <input type="text" class="form-control" name="certification"
                                                id="edit_certification" placeholder="Certification" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Lab Certification .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Ultrasound Time </label>
                                            <input type="time" class="form-control" name="ultrasound_time"
                                                id="edit_ultrasound_time" placeholder="Ultrasound Time" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Lab Ultrasound Time.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Off Day</label>
                                            <input type="text" class="form-control" name="offday" id="edit_offday"
                                                placeholder="Off Day" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Off Day.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Lab Timing </label>
                                            <input type="time" class="form-control" name="lab_timing"
                                                id="edit_lab_timing" placeholder="Lab Timing" value="">
                                            <div class="invalid-feedback">
                                                Please choose a Lab Timing .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Sunday Lab Timing </label>
                                            <input type="time" class="form-control" name="sunday_lab_timing"
                                                id="edit_sunday_lab_timing" placeholder="Sunday Lab Timing"
                                                value="">
                                            <div class="invalid-feedback">
                                                Please choose a Sunday Lab Timing.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Payment Mode</label>
                                            <select class="form-control" name="payment_mode" id="edit_payment_mode"
                                                required>
                                                <option value="">Select Payment Mode</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Online">Online</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please choose a Sunday Payment Mode.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="bsValidation1" class="form-label">Description</label>
                                            <textarea style="height:200px" rows="5" name="description" id="edit_description" placeholder="Description"
                                                value=""></textarea>
                                            <div class="invalid-feedback">
                                                Please choose a Description.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="bsValidation1" class="form-label">Trust Matter </label>
                                            <textarea class="form-control" rows="8" cols="50" style="height: 86px;" name="trust_matter"
                                                id="edit_trust_matter"></textarea>
                                            <div class="invalid-feedback">
                                                Please choose a Trust Matter .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Logo: (Size - 180 * 90)</label>
                                            <div class="slim" style="width:180px; height:90px;"
                                                data-meta-user-id="1220" data-ratio="180:90" data-size="180,90">
                                                <input type="file" name="logo" id="edit_logo">
                                            </div>
                                            <img src="" id="editLogoPreview" alt=""
                                                style="max-width: 180px; max-height: 90px;">
                                            <div class="invalid-feedback">
                                                Please choose a Logo: (Size - 180 * 90).
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Upload Document:</label>
                                            <input type="file" name="document" id="edit_document">
                                            <img src="" id="editdocumentPreview" alt=""
                                                style="max-width: 180px; max-height: 90px;">
                                            <div class="invalid-feedback">
                                                Please choose a Upload Document:.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation1" class="form-label">Lab Photo: (Size - 180 * 90)
                                            </label>
                                            <input type="file" name="lab_photo" id="edit_lab_photo" multiple>
                                            <img src="" id="editlab_photosPreview" alt=""
                                                style="max-width: 180px; max-height: 90px;">
                                            <div class="invalid-feedback">
                                                Please choose a Lab Photo: (Size - 180 * 90) .
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
    {{-- <script>
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
    </script> --}}
    <script>
        $(document).ready(function() {
            // Add Partner Lab
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
                        toastr.success('Lab partner added successfully!');
                        $('#partnerlabForm')[0].reset();
                        $('#addLabPartnerModal').modal('hide');
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

            // Edit Partner
            $('.edit-btn').on('click', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: '/admin/editlabpartner/' + id,
                    type: 'GET',
                    success: function(response) {
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
                        $('input[name="ambulance_service"][value="' + response
                            .ambulance_service + '"]').prop('checked', true);
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
                        $('#editLabPartnerModal').modal('show');
                    },
                    error: function() {
                        toastr.error('Something went wrong while fetching data.');
                    }
                });
            });

            // Update Partner
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
                        toastr.success('Lab partner updated successfully!');
                        $('#editLabPartnerModal').modal('hide');
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
