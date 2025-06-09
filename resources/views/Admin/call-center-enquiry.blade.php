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
                                    Call Center Enquiry List
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Add Call Center Enquiry</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Enquiry Details</th>
                                        <th>Lab Partner</th>
                                        <th>Lab Test</th>
                                        <th>Medicines</th>
                                        <th>Address</th>
                                        <th>Remark</th>
                                        <th>Create Date</th>
                                        <th>Update Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>System Architect</td>
                                        <td>System Architect</td>
                                        <td>System Architect</td>
                                        <td>System Architect</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>Edinburgh</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- call center enquiry --}}
                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Call Center Enquiry</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" novalidate="">
                                    <div class="col-md-3">
                                        <label for="bsValidation1" class="form-label">Prefix</label>
                                        <select name="" id="" class="form-control" id="bsValidation1">
                                            <option value="">Selete</option>
                                            <option value="mr.">Mr.</option>
                                            <option value="mrs.">Mrs.</option>
                                            <option value="miss">Miss</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose a Prefix.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="bsValidation1" placeholder="Name"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please choose a Name.
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="bsValidation1" class="form-label">Age</label>
                                        <input type="text" class="form-control" id="bsValidation1" placeholder="Age"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please choose a Age.
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bsValidation1" class="form-label">Gender</label>
                                        <select name="" id="" class="form-control" id="bsValidation1">
                                            <option value="">Selete</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose a Gender.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="bsValidation1" placeholder="Email"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please choose a Email.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="bsValidation1" placeholder="Phone"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please choose a Phone.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation1" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="bsValidation1"
                                            placeholder="Address" required="">
                                        <div class="invalid-feedback">
                                            Please choose a Address.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation1" class="form-label">Remark</label>
                                        <input type="text" class="form-control" id="bsValidation1"
                                            placeholder="Remark" required="">
                                        <div class="invalid-feedback">
                                            Please choose a Remark.
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
