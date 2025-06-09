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
                                SEO Management
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Add SEO Management</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Url/th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
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
                                <h5 class="modal-title">Add SEO Management</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" novalidate="">
                                    <div class="col-md-12">
                                        <label for="bsValidation1" class="form-label">Target URL</label>
                                        <input type="date" class="form-control" id="bsValidation1" placeholder="Target URL "
                                            required="">
                                       <div class="invalid-feedback">
                                            Please choose a Target URL .
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation1" class="form-label">Meta Keyword</label>
                                        <input type="text" class="form-control" id="bsValidation1" placeholder="Meta Keyword"
                                            required="">
                                       <div class="invalid-feedback">
                                            Please choose a Meta Keyword .
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation1" class="form-label">Meta Description</label>
                                        <input type="text" class="form-control" id="bsValidation1" placeholder="Meta Description"
                                            required="">
                                       <div class="invalid-feedback">
                                            Please choose a Meta Description .
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation1" class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" id="bsValidation1" placeholder="Meta Title"
                                            required="">
                                       <div class="invalid-feedback">
                                            Please choose a Meta Title.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation1" class="form-label">Alt Tag</label>
                                        <input type="text" class="form-control" id="bsValidation1" placeholder="Alt Tag"
                                            required="">
                                       <div class="invalid-feedback">
                                            Please choose a Alt Tag.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation1" class="form-label">Canonical Code</label>
                                        <input type="text" class="form-control" id="bsValidation1" placeholder="Canonical Code"
                                            required="">
                                       <div class="invalid-feedback">
                                            Please choose a Canonical Code.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation1" class="form-label">Extra Meta</label>
                                        <input type="text" class="form-control" id="bsValidation1" placeholder="Extra Meta"
                                            required="">
                                       <div class="invalid-feedback">
                                            Please choose a Extra Meta.
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
