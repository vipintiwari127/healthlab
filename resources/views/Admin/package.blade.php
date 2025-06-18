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
                                <form class="row g-3 needs-validation" novalidate="">
                                    <input type="hidden" name="id" id="review_id">
                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Name"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please Selete a Name.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">Package Category</label>
                                        <select class="form-control" id="package_category" placeholder="Package Category"
                                            required="">
                                            <option value="">Select Package Category</option>
                                            <option value="1">Category 1</option>
                                            <option value="2">Category 2</option>
                                            <option value="3">Category 3</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose a Package Category.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">Partner</label>
                                        <select class="form-control" id="partner" placeholder="Partner" required="">
                                            <option value="">Select Partner</option>
                                            <option value="Partner1">Partner 1</option>
                                            <option value="Partner2">Partner 2</option>
                                            <option value="Partner3">Partner 3</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose a Partner.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation1" class="form-label">Included Tests </label>
                                        <input type="text" class="form-control" id="included_tests"
                                            placeholder="Included Tests " required="">
                                        <div class="invalid-feedback">
                                            Please choose a Included Tests .
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bsValidation1" class="form-label">Actual Price </label>
                                        <input type="number" class="form-control" id="actual_price"
                                            placeholder="Actual Price" required="">
                                        <div class="invalid-feedback">
                                            Please choose a Actual Price.
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bsValidation1" class="form-label">NET Price </label>
                                        <input type="number" class="form-control" id="net_price" placeholder="NET Price"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please choose a NET Price.
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bsValidation1" class="form-label">Offer Price</label>
                                        <input type="bumber" class="form-control" id="offer_price"
                                            placeholder="Offer Price" required="">
                                        <div class="invalid-feedback">
                                            Please choose a Offer Price.
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bsValidation1" class="form-label">Total Parameters</label>
                                        <input type="text" class="form-control" id="total_parameters"
                                            placeholder="Total Parameters" required="">
                                        <div class="invalid-feedback">
                                            Please choose a Total Parameters.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">Reporting Time</label>
                                        <input type="time" class="form-control" id="reporting_time"
                                            placeholder="Reporting Time" required="">
                                        <div class="invalid-feedback">
                                            Please choose a Reporting Time.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">Specimen Requirement</label>
                                        <input type="text" class="form-control" id="specimen_requirement"
                                            placeholder="Specimen Requirement" required="">
                                        <div class="invalid-feedback">
                                            Please choose a Specimen Requirement.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">Service Type</label><br>
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
                                        <div class="invalid-feedback">
                                            Please choose a Specimen Requirement.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">SThumbnail : (Size - 180 * 90)</label>
                                          <input type="file" class="form-control" id="thumbnail"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please choose a Image.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation1" class="form-label">Description</label>
                                          <textarea class="form-control" id="description"
                                            placeholder="Description" required=""></textarea>
                                        <div class="invalid-feedback">
                                            Please choose a Description.
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
@endsection
