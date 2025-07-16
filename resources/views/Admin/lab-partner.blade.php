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
                                        {{-- <th>Active Status</th>
                                        <th>Status for Customer Booking</th> --}}
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
                                            {{-- <td>
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
                                                        {{ $partner->payment_status == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label">
                                                        {{ $partner->payment_status == 1 ? 'Active' : 'Inactive' }}
                                                    </label>
                                                </div>
                                            </td> --}}
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
                                            <label for="pincode" class="form-label">PinCode</label>
                                            <input type="number" class="form-control" name="pincode" id="pincode"
                                                placeholder="Pincode" value="">
                                            <div class="invalid-feedback">Please choose a PinCode.</div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <label for="certification" class="form-label">Certification</label>
                                            <input type="text" class="form-control" name="certification"
                                                id="certification" placeholder="Certification" value="">
                                            <div class="invalid-feedback">Please choose a Certification.</div>
                                        </div> --}}
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
                                        {{-- <div class="col-md-4">
                                            <label for="payment_mode" class="form-label">Payment Mode</label>
                                            <select class="form-control" name="payment_mode" id="payment_mode" required>
                                                <option value="">Select Payment Mode</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Online">Online</option>
                                            </select>
                                            <div class="invalid-feedback">Please choose a Payment Mode.</div>
                                        </div> --}}
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



                                        <!-- Location -->
                                        <div class="col-md-4">
                                            <label for="Location" class="form-label">Location</label>
                                            <input type="text" class="form-control" name="location" id="Location"
                                                required placeholder="Location" value="">
                                            <div class="invalid-feedback">Please enter a Location.</div>
                                        </div>

                                        <!-- Rating -->
                                        <div class="col-md-4">
                                            <label for="Rating" class="form-label">Rating</label>
                                            <input type="number" class="form-control" name="Rating" id="Rating"
                                                placeholder="Rating" value="" min="1" max="5"
                                                step="0.1">
                                            <div class="invalid-feedback">Please enter a Rating.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Certification</label><br>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="certification"
                                                    id="nabh" value="NABH">
                                                <label class="form-check-label" for="nabh">NABH</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="certification"
                                                    id="nabl" value="NABL">
                                                <label class="form-check-label" for="nabl">NABL</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="certification"
                                                    id="cap" value="CAP">
                                                <label class="form-check-label" for="cap">CAP</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="certification"
                                                    id="iso27001" value="ISO/IEC 27001">
                                                <label class="form-check-label" for="iso27001">ISO/IEC 27001
                                                    Information
                                                    Security Management</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="certification"
                                                    id="iso9001" value="ISO 9001">
                                                <label class="form-check-label" for="iso9001">ISO 9001 Quality
                                                    Management</label>
                                            </div>
                                        </div>

                                        <!-- Center Phone Number -->
                                        <div class="col-md-4">
                                            <label for="CenterPhoneNumber" class="form-label">Center Phone
                                                Number</label>
                                            <input type="tel" class="form-control" name="center_phone_number"
                                                id="CenterPhoneNumber" placeholder="Center Phone Number" value="">
                                            <div class="invalid-feedback">Please enter a valid Center Phone Number.
                                            </div>
                                        </div>

                                        <!-- Home Collection Facility -->
                                        <div class="col-md-4">
                                            <label for="HomeCollectionFacility" class="form-label">Home Collection
                                                Facility</label>
                                            <select class="form-control" name="home_collection_facility"
                                                id="HomeCollectionFacility" required>
                                                <option value="">Select Facility</option>
                                                <option value="Available">Available</option>
                                                <option value="Not Available">Not Available</option>
                                            </select>
                                            <div class="invalid-feedback">Please choose a Home Collection Facility.
                                            </div>
                                        </div>



                                        <!-- Home Collection Charges -->
                                        <div class="col-md-4">
                                            <label for="HomeCollectionCharges" class="form-label">Home Collection
                                                Charges</label>
                                            <input type="number" class="form-control" name="home_collection_charges"
                                                id="HomeCollectionCharges" placeholder="Home Collection Charges"
                                                value="" min="0" step="0.01" required>
                                            <div class="invalid-feedback">Please enter Home Collection Charges.
                                            </div>
                                        </div>

                                        <!-- Home Collection Number -->
                                        <div class="col-md-4">
                                            <label for="HomeCollectionNumber" class="form-label">Home Collection
                                                Number</label>
                                            <input type="tel" class="form-control" name="home_collection_number"
                                                id="HomeCollectionNumber" placeholder="Home Collection Number"
                                                value="" required>
                                            <div class="invalid-feedback">Please enter a Home Collection Number.
                                            </div>
                                        </div>

                                        <!-- About Us Editor -->
                                        <div class="col-md-12">
                                            <label for="AboutUs" class="form-label">About Us</label>
                                            <textarea class="form-control ckeditor" name="about_us" id="about_us" placeholder="About Us"></textarea>
                                            <div class="invalid-feedback">Please enter About Us description.</div>
                                        </div>

                                        <!-- Home Collection Timing -->
                                        <div class="col-md-4">
                                            <label for="HomeCollectionTiming" class="form-label">Home Collection
                                                Timing</label>
                                            <input type="text" class="form-control" name="home_collection_timing"
                                                id="HomeCollectionTiming" placeholder="e.g., 9:00 AM - 6:00 PM"
                                                value="" required>
                                            <div class="invalid-feedback">Please enter Home Collection Timing.</div>
                                        </div>

                                        <!-- Home Collection Sunday Timing -->
                                        <div class="col-md-4">
                                            <label for="HomeCollectionSundayTiming" class="form-label">Home
                                                Collection Sunday Timing</label>
                                            <input type="text" class="form-control" name="home_collection_sunday_timing"
                                                id="HomeCollectionSundayTiming" placeholder="e.g., 9:00 AM - 2:00 PM"
                                                value="" required>
                                            <div class="invalid-feedback">Please enter Home Collection Sunday
                                                Timing.</div>
                                        </div>

                                        <!-- Our Branches -->
                                        <div class="col-md-4">
                                            <label for="OurBranches" class="form-label">Our Branches</label>
                                            <select class="form-control" name="our_branches" id="OurBranches" required>
                                                <option value="">Select Branch</option>
                                                <option value="Main Branch">Main Branch</option>
                                                <option value="North Branch">North Branch</option>
                                                <option value="South Branch">South Branch</option>
                                                <option value="East Branch">East Branch</option>
                                                <option value="West Branch">West Branch</option>
                                            </select>
                                            <div class="invalid-feedback">Please choose a Branch.</div>
                                        </div>

                                        <!-- Facility -->
                                        <div class="col-md-4">
                                            <label for="Facility" class="form-label">Facility</label>
                                            <select class="form-select" name="facility" id="Facility" required>
                                                <option value="" disabled selected>Select a Facility</option>
                                                <option value="facility1">Facility 1</option>
                                                <option value="facility2">Facility 2</option>
                                                <option value="facility3">Facility 3</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                            <div class="invalid-feedback">Please select a facility.</div>
                                        </div>



                                        <!-- Services -->
                                        <div class="col-md-4">
                                            <label for="Services" class="form-label">Services</label>
                                            <select class="form-select" name="services" id="Services" required>
                                                <option value="" disabled selected>Select a Service</option>
                                                <option value="service1">Service 1</option>
                                                <option value="service2">Service 2</option>
                                                <option value="service3">Service 3</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                            <div class="invalid-feedback">Please select a service.</div>
                                        </div>


                                        <!-- Payment Mode -->
                                        <div class="col-md-4">
                                            <label for="PaymentMode" class="form-label">Payment Mode</label>
                                            <select class="form-control" name="payment_mode" id="PaymentMode" required>
                                                <option value="">Select Payment Mode</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Card">Card</option>
                                                <option value="UPI">UPI</option>
                                                <option value="Net Banking">Net Banking</option>
                                                <option value="All">All Methods</option>
                                            </select>
                                            <div class="invalid-feedback">Please choose a Payment Mode.</div>
                                        </div>

                                        <!-- Navigation -->
                                        <div class="col-md-12">
                                            <label for="Navigation" class="form-label">Navigation/Directions</label>
                                            <textarea rows="3" class="form-control" name="navigation" id="Navigation"
                                                placeholder="Directions to reach the center"></textarea>
                                            <div class="invalid-feedback">Please enter Navigation details.</div>
                                        </div>

                                        <!-- Dynamic Sections -->
                                        <div class="col-md-12">
                                            <!-- Testimonials Card -->
                                            <div class="card mb-4">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <span><strong>Testimonials</strong></span>
                                                    <button type="button" class="btn btn-dark"
                                                        onclick="addTestimonialRow()">+ Add</button>
                                                </div>
                                                <div class="card-body">
                                                    <div id="testimonialRows">
                                                        <div class="row testimonial-row mb-3">
                                                            <div class="col-md-3">
                                                                <label for="testimonial_rating_1"
                                                                    class="form-label">Rating</label>
                                                                <input type="number" class="form-control"
                                                                    id="testimonial_rating_1" name="testimonial_rating[]"
                                                                    min="1" max="5" step="0.1"
                                                                    placeholder="4.5">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="testimonial_description_1"
                                                                    class="form-label">Description</label>
                                                                <input type="text" class="form-control"
                                                                    id="testimonial_description_1"
                                                                    name="testimonial_description[]"
                                                                    placeholder="Customer feedback">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="testimonial_name_1"
                                                                    class="form-label">Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="testimonial_name_1" name="testimonial_name[]"
                                                                    placeholder="Customer name">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="testimonial_designation_1"
                                                                    class="form-label">Designation</label>
                                                                <input type="text" class="form-control"
                                                                    id="testimonial_designation_1"
                                                                    name="testimonials_Designation[]"
                                                                    placeholder="Job title">
                                                            </div>
                                                            <div class="col-md-1 d-flex align-items-end">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    onclick="addTestimonialRow()">+</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Description Card -->
                                            <div class="card mb-4">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <span><strong>Additional Information</strong></span>
                                                    <button type="button" class="btn btn-dark"
                                                        onclick="addDescriptionRow()">+ Add</button>
                                                </div>
                                                <div class="card-body">
                                                    <div id="descriptionRows">
                                                        <div class="row description-row mb-3">
                                                            <div class="col-md-5">
                                                                <label for="info_title_1" class="form-label">Title</label>
                                                                <input type="text" class="form-control"
                                                                    id="info_title_1" name="info_title[]"
                                                                    placeholder="Information title">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="info_link_1"
                                                                    class="form-label">Link/Content</label>
                                                                <input type="text" class="form-control"
                                                                    id="info_link_1" name="info_link[]"
                                                                    placeholder="URL or content">
                                                            </div>
                                                            <div class="col-md-1 d-flex align-items-end">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    onclick="addDescriptionRow()">+</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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




                                <style>
                                    .remove-btn {
                                        background-color: #dc3545;
                                        border-color: #dc3545;
                                        color: white;
                                    }

                                    .remove-btn:hover {
                                        background-color: #c82333;
                                        border-color: #bd2130;
                                    }

                                    .card {
                                        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
                                    }
                                </style>



                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                                <script>
                                    let testimonialCounter = 1;
                                    let descriptionCounter = 1;

                                    function addTestimonialRow() {
                                        testimonialCounter++;
                                        const container = document.getElementById('testimonialRows');

                                        const newRow = document.createElement('div');
                                        newRow.className = 'row testimonial-row mb-3';
                                        newRow.innerHTML = `
                <div class="col-md-3">
                    <label for="testimonial_rating_${testimonialCounter}" class="form-label">Rating</label>
                    <input type="number" class="form-control" id="testimonial_rating_${testimonialCounter}" name="testimonial_rating[]" min="1" max="5" step="0.1" placeholder="4.5">
                </div>
                <div class="col-md-3">
                    <label for="testimonial_description_${testimonialCounter}" class="form-label">Description</label>
                    <input type="text" class="form-control" id="testimonial_description_${testimonialCounter}" name="testimonial_description[]" placeholder="Customer feedback">
                </div>
                <div class="col-md-3">
                    <label for="testimonial_name_${testimonialCounter}" class="form-label">Name</label>
                    <input type="text" class="form-control" id="testimonial_name_${testimonialCounter}" name="testimonial_name[]" placeholder="Customer name">
                </div>
                <div class="col-md-2">
                    <label for="testimonial_designation_${testimonialCounter}" class="form-label">Designation</label>
                    <input type="text" class="form-control" id="testimonial_designation_${testimonialCounter}" name="testimonial_designation[]" placeholder="Job title">
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="button" class="btn remove-btn" onclick="removeRow(this)" title="Remove">×</button>
                </div>
            `;

                                        container.appendChild(newRow);
                                    }

                                    function addDescriptionRow() {
                                        descriptionCounter++;
                                        const container = document.getElementById('descriptionRows');

                                        const newRow = document.createElement('div');
                                        newRow.className = 'row description-row mb-3';
                                        newRow.innerHTML = `
                <div class="col-md-5">
                    <label for="info_title_${descriptionCounter}" class="form-label">Title</label>
                    <input type="text" class="form-control" id="info_title_${descriptionCounter}" name="info_title[]" placeholder="Information title">
                </div>
                <div class="col-md-6">
                    <label for="info_link_${descriptionCounter}" class="form-label">Link/Content</label>
                    <input type="text" class="form-control" id="info_link_${descriptionCounter}" name="info_link[]" placeholder="URL or content">
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="button" class="btn remove-btn" onclick="removeRow(this)" title="Remove">×</button>
                </div>
            `;

                                        container.appendChild(newRow);
                                    }

                                    function removeRow(button) {
                                        const row = button.closest('.row');
                                        const container = row.parentNode;

                                        // Don't remove if it's the only row left
                                        if (container.children.length > 1) {
                                            row.remove();
                                        } else {
                                            alert('At least one row must remain.');
                                        }
                                    }

                                    // Form validation
                                    document.getElementById('labPartnerForm').addEventListener('submit', function(e) {
                                        e.preventDefault();

                                        // Basic form validation
                                        const form = this;
                                        if (form.checkValidity()) {
                                            // Here you would typically send the data to your server
                                            // alert('Form submitted successfully!');
                                            console.log('Form data:', new FormData(form));
                                        } else {
                                            form.classList.add('was-validated');
                                        }
                                    });
                                </script>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>
    </div>
    <script src="https://www.pspathlab.com/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $(function() {

            $('.ckeditor').each(function(e) {

                CKEDITOR.replace(this.id, {

                    filebrowserBrowseUrl: "https://www.pspathlab.com/ckfinder/ckfinder.html",
                    filebrowserImageBrowseUrl: "https://www.pspathlab.com/ckfinder/ckfinder.html?type=Images",
                    filebrowserFlashBrowseUrl: "https://www.pspathlab.com/ckfinder/ckfinder.html?type=Flash",
                    filebrowserUploadUrl: "https://www.pspathlab.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",
                    filebrowserImageUploadUrl: "https://www.pspathlab.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images",
                    filebrowserFlashUploadUrl: "https://www.pspathlab.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash"


                });

            });

        });
    </script>

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
                let url = $('#labpartner_id').val() ? '/admin/updatelabpartnertwo' : '/admin/addlabpartnertwo';
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
                            url: '/admin/deletelabpartnertwo/' + id,
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
                $.post('/admin/ambulance-toggletwo/' + id, {
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
