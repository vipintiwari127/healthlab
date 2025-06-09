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
                                    Lab Test
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Add Lab Test</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Test Name</th>
                                        <th>Partner</th>
                                        <th>MRP Price</th>
                                        <th>Featured</th>
                                        <th>Status</th>
                                        <th>Added By</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Added On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>Edinburgh</td>
                                        <td>Edinburgh</td>
                                        <td>$320,800</td>
                                        <td>Edinburgh</td>
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
                                <h5 class="modal-title">Add Bussiness Partner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="form-horizontal" method="post" runat="server" role="form"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Lab Partner&nbsp;</label>
                                            <select class="form-control" name="lab_partner_id" id="lab_partner_id" required>
                                                <option value="">Select Lab Partner</option>
                                                <option value="37">PS.PATHLAB SARASWATI VIHAR </option>
                                                <option value="36">PS.PATHLAB ROHINI SECTOR -05</option>
                                                <option value="35">PS.PATHLAB ROHINI SECTOR-06</option>
                                            </select>
                                        </div>


                                        <div class="col-sm-4">
                                            <label>Name&nbsp;</label>
                                            <select class="form-control chosen-select" name="test_id" id="test_id"
                                                data-placeholder="Search  Test"
                                                onchange="get_catname(this.value);get_desc(this.value);get_spcmn(this.value);"
                                                required>

                                                <option value="">Select Test Name</option>
                                                <option value="5282">MRI PELVIS WITH WITH CONTRAST</option>

                                            </select>
                                            <!-- <input type="text" class="form-control" name="name" id="name" required placeholder="Name"  value="" />  -->
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Category&nbsp;</label>
                                            <select class="form-control" name="category" id="category" required>
                                                <option value="">Select Category</option>
                                                <option value="pathology">pathology</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Lab MRP Price&nbsp;</label>
                                            <input type="number" min='0' class="form-control" name="lab_mrp_price"
                                                id="lab_mrp_price" required placeholder="Lab MRP Price" value="">
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Lab Net Price&nbsp;</label>
                                            <input type="number" min='0' class="form-control" name="lab_net_price"
                                                id="lab_net_price" placeholder="Lab Net Price" value="">
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Offer Price&nbsp;</label>
                                            <input type="number" min='0' class="form-control" name="offer_price"
                                                id="offer_price" placeholder="Offer Price" value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Reporting Time</label>
                                            <input type="text" class="form-control" name="reporting_time"
                                                id="reporting_time" placeholder="Reporting Time" value="">
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Specimen Requirement</label>
                                            <input type="text" class="form-control" name="specimen_requirement"
                                                id="specimen_requirement" placeholder="Specimen Requirement"
                                                value="" readonly>
                                        </div>

                                        <div class="col-sm-4">
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
                                            <textarea style="height:200px" rows="5" id="description" class="form-control" readonly></textarea>
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
