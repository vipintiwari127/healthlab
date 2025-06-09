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
                                    Doctor's
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Add Doctor</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
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
                                <h5 class="modal-title">Add Doctor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" novalidate="">
                                    <div class="col-md-7">
                                        <label for="bsValidation1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="bsValidation1" placeholder="Name"
                                            required="">
                                       <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="bsValidation3" class="form-label">Phone</label>
                                        <input type="Number" class="form-control" id="bsValidation3" placeholder="Phone"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please choose a Phone Number.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation4" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="bsValidation4" placeholder="Email"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please provide a valid email.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation9" class="form-label">Gender</label>
                                        <select id="bsValidation9" class="form-select" required="">
                                            <option selected="" disabled="" value="">Select Gender </option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid Gender.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation12" class="form-label">Zip</label>
                                        <input type="text" class="form-control" id="bsValidation12" placeholder="Zip"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please enter a valid Zip code.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Address</label>
                                        <textarea class="form-control" id="bsValidation13" placeholder="Address ..." rows="3" required=""></textarea>
                                        <div class="invalid-feedback">
                                            Please enter a valid address.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation10" class="form-label">Specialization </label>
                                        <textarea class="form-control" id="bsValidation10" placeholder="Specialization  ..." rows="3" required=""></textarea>
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
@endsection
