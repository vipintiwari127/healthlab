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

                {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Add Lab Partner</button>
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
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>$320,800</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>$320,800</td>
                                    </tr>
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
                                <h5 class="modal-title">Add Lab Partner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="form-horizontal" method="post" runat="server" role="form"
                                    enctype="multipart/form-data">

                                    <div class="form-group">

                                        <div class="col-sm-4">

                                            <label>Name&nbsp;</label>

                                            <input type="text" class="form-control" name="name" id="name"
                                                required placeholder="Name" value="" />

                                        </div>


                                        <div class="col-sm-4">

                                            <label>URL&nbsp;</label>
                                            <input type="text" class="form-control" name="url" id="url"
                                                placeholder="URL" value="" readonly>

                                        </div>


                                        <div class="col-sm-4">

                                            <label>Website Link&nbsp;</label>
                                            <input type="text" class="form-control" name="website_link" id="website_link"
                                                placeholder="Website Link" value="">

                                        </div>




                                    </div>


                                    <div class="form-group">

                                        <div class="col-sm-3">

                                            <label>Office Email&nbsp;</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Email" value="" required>

                                        </div>

                                        <div class="col-sm-3">

                                            <label>Office Phone&nbsp;</label>

                                            <input type="text" class="form-control" name="mobile" id="mobile"
                                                required placeholder="Office Phone" value="" />

                                        </div>


                                        <div class="col-sm-3">

                                            <label>Contact Person&nbsp;</label>
                                            <input type="text" class="form-control" name="contact_person"
                                                id="contact_person" placeholder="Contact Person" value="" required>

                                        </div>


                                        <div class="col-sm-3">

                                            <label>Contact Person Number&nbsp;</label>
                                            <input type="text" class="form-control" name="contact_person_number"
                                                id="contact_person_number" placeholder="Contact Person Number"
                                                value="" required>

                                        </div>




                                    </div>


                                    <div class="form-group">

                                        <div class="col-sm-12">

                                            <label>CC Emails&nbsp;</label>
                                            <input type="text" class="form-control" name="cc" id="cc"
                                                placeholder="Example - abc@gmail.com,test@gmail.com" value="">

                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-sm-12">

                                            <label>BCC Emails&nbsp;</label>
                                            <input type="text" class="form-control" name="bcc" id="bcc"
                                                placeholder="Example - abc@gmail.com,test@gmail.com" value="">

                                        </div>
                                    </div>




                                    <div class="form-group">

                                        <div class="col-sm-2">

                                            <label>Ambulance Service &nbsp;</label><br>


                                            <label style="margin-right: 15px;">
                                                <input name="ambulance_service" type="radio" value="Yes" required>
                                                &nbsp; Yes
                                            </label>

                                            <label>
                                                <input name="ambulance_service" type="radio" value="No" required>
                                                &nbsp; No
                                            </label>

                                        </div>

                                        <div class="col-sm-3">

                                            <label>State&nbsp;</label>

                                            <select class="form-control" name="state_id" id="state_id" required
                                                onchange="get_city();">
                                                <option value="">Select State</option>

                                                <option value="24">

                                                    DELHI NCR
                                                </option>


                                            </select>

                                        </div>

                                        <div class="col-sm-5">
                                            <label>City&nbsp;</label>

                                            <select class="form-control selectpicker" name="city_id[]" id="city_id"
                                                multiple>

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
                                            <input type="text" class="form-control" name="pincode" id="pincode"
                                                placeholder="Pincode" value="">

                                        </div>




                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6">

                                            <label>Address&nbsp;</label>
                                            <input type="text" class="form-control" name="address" id="address"
                                                placeholder="Address" value="">

                                        </div>

                                        <div class="col-sm-6">

                                            <label>Lab Services Available&nbsp;</label>
                                            <input type="text" class="form-control" name="services" id="services"
                                                placeholder="Lab Services Available" value="">

                                        </div>

                                    </div>


                                    <div class="form-group">

                                        <div class="col-sm-3">

                                            <label>Certification&nbsp;</label>
                                            <input type="text" class="form-control" name="certification"
                                                id="certification" placeholder="Certification" value="">

                                        </div>

                                        <div class="col-sm-4">

                                            <label>Ultrasound Time&nbsp;</label>
                                            <input type="text" class="form-control" name="ultrasound_time"
                                                id="ultrasound_time" placeholder="Ultrasound Time" value="">

                                        </div>

                                        <div class="col-sm-5">

                                            <label>Off Day&nbsp;</label>
                                            <input type="text" class="form-control" name="offday" id="offday"
                                                placeholder="Off Day" value="">

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">

                                            <label>Lab Timing&nbsp;</label>
                                            <input type="text" class="form-control" name="lab_timing" id="lab_timing"
                                                placeholder="Lab Timing" value="">

                                        </div>

                                        <div class="col-sm-4">

                                            <label>Sunday Lab Timing&nbsp;</label>
                                            <input type="text" class="form-control" name="sunday_lab_timing"
                                                id="sunday_lab_timing" placeholder="Sunday Lab Timing" value="">

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
                                            <input type="text" class="form-control" name="description"
                                                id="description" placeholder="Description" value="">
                                        </div>

                                    </div>


                                    <div class="form-group">

                                        <div class="col-sm-12">

                                            <label>Trust Matter&nbsp;</label>
                                            <textarea class="form-control" rows="8" cols="50" style="height: 86px;" name="trust_matter"
                                                id="trust_matter"></textarea>

                                        </div>

                                    </div>




                                    <div class="form-group">
                                        <hr>
                                    </div>


                                    <div class="form-group">

                                        <div class="col-sm-4">

                                            <label>Logo:&nbsp;(Size - 180 * 90)</label>
                                            <div class="slim" style="width:180px; height:90px;"
                                                data-meta-user-id="1220" data-ratio="180:90" data-size="180,90">

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

                                            <!-- <div class="slim" style="width:180px; height:90px;" data-meta-user-id="1220"  data-ratio="180:90" data-size="180,90" >
                                           
                                        <input type="file" name="lab_photo" id="lab_photo">
                                      </div>   -->



                                            <div class="col-sm-12">


                                            </div>

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
@endsection
