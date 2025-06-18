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
                                    Package List
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Add Package List</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Partner</th>
                                        <th>Partner Name</th>
                                        <th>Test</th>
                                        <th>Feature</th>
                                        <th>Status</th>
                                        <th>Added By</th>
                                        <th>Added on</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>$320,800</td>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
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
                                <h5 class="modal-title">Add Package List</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="form-horizontal" method="post" runat="server" role="form"
                                    enctype="multipart/form-data">

                                    <div class="form-group">

                                        <div class="col-sm-4">

                                            <label>Name&nbsp;</label>
                                            <input type="hidden" name="url" id="url" value="">
                                            <input type="text" class="form-control" name="name" id="name"
                                                required placeholder="Name" value="" />

                                        </div>

                                        <div class="col-sm-4">
                                            <label>Package Category&nbsp;</label>



                                            <select class="form-control chosen-select" name="cat_id[]" id="cat_id"
                                                multiple required>

                                                <option value="2">Full Body Check Up</option>
                                                <option value="3">Womens Health</option>
                                                <option value="4">Senior Citizen</option>
                                                <option value="6">Healthy Bones</option>
                                                <option value="7">Popular Packages</option>
                                                <option value="10">Fever Panel</option>

                                            </select>
                                        </div>


                                        <div class="col-sm-4">

                                            <label>Partners&nbsp;</label>
                                            <select class="form-control" name="partner_id" id="partner_id" required
                                                onchange="get_test();">

                                                <option value="">Select Partner</option>

                                                <option value="37">PS.PATHLAB SARASWATI VIHAR </option>
                                                <option value="36">PS.PATHLAB ROHINI SECTOR -05</option>
                                                <option value="35">PS.PATHLAB ROHINI SECTOR-06</option>

                                            </select>
                                        </div>

                                    </div>

                                    <div style="position: relative;">

                                        <div class="form-group">








                                            <div class="col-sm-12">

                                                <label>Included Tests&nbsp;</label>

                                                <input type="text" name="test_ids" class="form-control"
                                                    placeholder="Included tests" value="">
                                                <!-- <select class="form-control chosen-select"  name="test_ids[]" id="test_ids" multiple >
                                                                            
                                                                                    
                                                                          </select> -->
                                            </div>



                                        </div>

                                    </div>


                                    <div class="form-group">

                                        <div class="col-sm-4">

                                            <label>Actual Price&nbsp;</label>
                                            <input type="number" min='0' class="form-control"
                                                name="actual_price" id="actual_price" required placeholder="Actual Price"
                                                value="">
                                        </div>

                                        <div class="col-sm-4">

                                            <label>NET Price&nbsp;</label>
                                            <input type="number" min='0' class="form-control" name="net_price"
                                                id="net_price" required placeholder="New Price" value="">
                                        </div>


                                        <div class="col-sm-4">

                                            <label>Offer Price&nbsp;</label>
                                            <input type="number" min='0' class="form-control" name="offer_price"
                                                id="offer_price" placeholder="Offer Amount" value="">
                                        </div>

                                      </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">

                                            <label>Total Parameters</label>
                                            <input type="number" class="form-control" name="parameters_included"
                                                id="parameters_included" placeholder="Total Parameters" value="">
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Reporting Time</label>
                                            <input type="text" class="form-control" name="reporting_time"
                                                id="reporting_time" placeholder="Reporting Time" value="">
                                        </div>


                                        <div class="col-sm-3">

                                            <label>Specimen Requirement</label>
                                            <input type="text" class="form-control" name="specimen_requirement"
                                                id="specimen_requirement" placeholder="Specimen Requirement"
                                                value="">
                                        </div>

                                        <div class="col-sm-3">
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
                                            <textarea style="height:100px" class="form-control ckeditor" name="description" id="description"
                                                placeholder="Description"></textarea>
                                        </div>


                                    </div>


                                    <div class="form-group">
                                        <hr>
                                    </div>


                                    <div class="form-group">

                                        <div class="col-sm-12">

                                            <label>Thumbnail :&nbsp;(Size - 180 * 90)</label>
                                            <div class="slim" style="width:180px; height:90px;"
                                                data-meta-user-id="1220" data-ratio="180:90" data-size="180,90">

                                                <input type="file" name="thumbnail" id="thumbnail">
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
