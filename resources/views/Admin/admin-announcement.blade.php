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
                                    Website Announcement
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-0 text-uppercase">Website Announcement</h5>
                        <hr>
                        <form class="row g-3 needs-validation" novalidate="">
                            <div class="col-md-12">
                                <label for="bsValidation3" class="form-label">Title</label>
                                <input type="text" class="form-control" id="bsValidation3" placeholder="Title"
                                    required="">
                                <div class="invalid-feedback">
                                    Please Input a Title.
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label for="bsValidation3" class="form-label">Image</label>
                                <input type="File" class="form-control" id="bsValidation3" placeholder="Image"
                                    required="">
                                <div class="invalid-feedback">
                                    Please choose a Image.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="bsValidation13" class="form-label">Announcement Message</label>
                                <textarea class="form-control" id="bsValidation13" placeholder="Announcement Message ..." rows="3" required=""></textarea>
                                <div class="invalid-feedback">
                                    Please enter a valid Announcement Message.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <label for="bsValidation13" class="form-label">Display Announcement</label>
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                        checked="">
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
            <!-- end page content-->
        </div>
    </div>
@endsection
