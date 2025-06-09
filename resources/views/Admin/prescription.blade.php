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
                                    Prescriptions
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Update</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Prescription</th>
                                        <th>Update By</th>
                                        <th>Date</th>
                                        <th>Action</th>
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
                                        <td>$320,800</td>
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
                                {{-- <h5 class="modal-title">Add Home Announcement</h5> --}}
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" novalidate="">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="bsValidation3" class="form-label">Prifix </label>
                                            <select class="form-control" id="bsValidation3" placeholder="Prifix "
                                                required="">
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Miss.">Miss</option>
                                                <option value="Dr.">Dr.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation4" class="form-label">Name </label>
                                            <input type="name" class="form-control" id="bsValidation4"
                                                placeholder="Name " required="">
                                            <div class="invalid-feedback">
                                                Please provide a valid Name .
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="bsValidation3" class="form-label">Gender</label>
                                            <select class="form-control" id="bsValidation3" placeholder="Gender "
                                                required="">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="other">Others</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <label for="bsValidation12" class="form-label">Age</label>
                                            <input type="text" class="form-control" id="bsValidation12" placeholder="Age"
                                                required="">
                                            <div class="invalid-feedback">
                                                Please enter a valid Age .
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="bsValidation12" class="form-label">Phone</label>
                                            <input type="number" class="form-control" id="bsValidation12"
                                                placeholder="Phone no." required="">
                                            <div class="invalid-feedback">
                                                Please enter a valid Phone no.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <br><br><br>
                                        <div class="col-md-4">
                                            <label for="bsValidation12" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="bsValidation12"
                                                placeholder="Email" required="">
                                            <div class="invalid-feedback">
                                                Please enter a valid Email .
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation13" class="form-label">Service Type </label>
                                            <select class="form-control" id="bsValidation3" placeholder="Service Type "
                                                required="">
                                                <option value="">Service Type</option>
                                                <option value="Lab">Lab</option>
                                                <option value="Home">Home</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please enter a valid Service Type.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="bsValidation13" class="form-label">Lab Partner</label>
                                            <select class="form-control" id="bsValidation3" placeholder="Lab Partner "
                                                required="">
                                                <option value="">Lab Partner</option>
                                                <option value="Lab">Lab</option>
                                                <option value="Home">Home</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please enter a valid Lab Partner.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="bsValidation12" class="form-label">Remark</label>
                                            <input type="text" class="form-control" id="bsValidation12"
                                                placeholder="Remark" required="">
                                            <div class="invalid-feedback">
                                                Please enter a valid Remark .
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="bsValidation12" class="form-label">Search Test/Package</label>
                                            <input type="text" class="form-control" id="bsValidation12"
                                                placeholder="Remark" required="">
                                            <div class="invalid-feedback">
                                                Please enter a valid Remark .
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="bsValidation12" class="form-label">Total Price</label>
                                            <input type="number" class="form-control" id="bsValidation12"
                                                placeholder="Total Price" required="">
                                            <div class="invalid-feedback">
                                                Please enter a valid Total Price .
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="bsValidation12" class="form-label">Special Discount</label>
                                            <input type="number" class="form-control" id="bsValidation12"
                                                placeholder="Special Discount" required="">
                                            <div class="invalid-feedback">
                                                Please enter a valid Special Discount .
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="bsValidation12" class="form-label">Discount Type</label>
                                            <select class="form-control" id="bsValidation3" placeholder="Discount Type "
                                                required="">
                                                <option value="">Discount Type</option>
                                                <option value="Percentage">Percentage (%)</option>
                                                <option value="Flat">Flat</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please enter a valid Special Discount .
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="bsValidation12" class="form-label">Payment Mode</label>
                                            <select class="form-control" id="bsValidation3" placeholder="Payment Mode"
                                                required="">
                                                <option value="">Payment Mode</option>
                                                <option value="Online">Online</option>
                                                <option value="Cash">Cash</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please enter a valid Special Discount .
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="bsValidation12" class="form-label">Doctor</label>
                                            <select class="form-control" id="bsValidation3" placeholder="Doctor"
                                                required="">
                                                <option value="">Select Doctor</option>
                                                <option value="Doctor1">Doctor1</option>
                                                <option value="Doctor2">Doctor2</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please enter a valid Special Discount .
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="bsValidation12" class="form-label">Prescription Upload </label>
                                            <input type="file" class="form-control" id="bsValidation12"
                                                placeholder="Prescription Upload " required="">
                                            <div class="invalid-feedback">
                                                Please enter a valid Prescription Upload  .
                                            </div>
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
