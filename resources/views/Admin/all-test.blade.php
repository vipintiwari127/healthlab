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
                                    Manage All Test
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Add Manage All Test</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Name</th>
                                        <th>Category</th>
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
                                <form id="csv-form" method="post" class="form-horizontal"
                                    action=""
                                    data-bv-message="This value is not valid"
                                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"
                                    enctype="multipart/form-data">



                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="csv" class="orange">Upload</label>
                                            <input type="file" name="csv" id="csv" class="form-control"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">


                                            <button type="submit" class="btn btn-blue" name="excel">Submit</button>



                                        </div>
                                    </div>
                                </form>
                                <form method="post" action="">

                                    <div class="form-group">
                                        <label for="name">Test Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Name" required value="">
                                    </div>


                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <input type="text" name="category" id="category" class="form-control"
                                            placeholder="Category" value="">
                                    </div>


                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description " class="form-control ckeditor" placeholder="Category"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="specimen_requirement">Specimen Requirement</label>
                                        <input type="text" class="form-control" name="specimen_requirement"
                                            id="specimen_requirement" placeholder="Specimen Requirement" value="">
                                    </div>



                                    <button type="submit" class="btn btn-success" style="height: auto"><i
                                            class="fa fa-save"></i> Save</button>




                                    <a type="button" class="btn btn-info"
                                        href=""><i class="fa fa-plus"></i>
                                        Add New</a>




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
