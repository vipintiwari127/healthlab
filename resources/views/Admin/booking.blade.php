@extends('Admin.layout.admin')
@section('admin-content')
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Health lab</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Booking List</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->


            <!--start shop cart-->
            <section class="shop-page">
                {{-- <h6 class="mb-0 text-uppercase">Danger Nav Pills</h6> --}}
                <hr>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-danger mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="pill" href="#danger-pills-home" role="tab"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="tab-icon"><ion-icon name="home-sharp" class="me-1"></ion-icon>
                                        </div> --}}
                                        <div class="tab-title">Add Booking </div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#danger-pills-profile" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="tab-icon"><ion-icon name="person-sharp" class="me-1"></ion-icon>
                                        </div> --}}
                                        <div class="tab-title">Pending Booking</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#danger-pills-contact" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="tab-icon"><ion-icon name="call-sharp" class="me-1"></ion-icon>
                                        </div> --}}
                                        <div class="tab-title">Confirm Booking</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#danger-pills-call-ceneter" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="tab-icon"><ion-icon name="call-sharp" class="me-1"></ion-icon>
                                        </div> --}}
                                        <div class="tab-title">Call Center Enquiry</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="danger-pills-tabContent">
                            <div class="tab-pane fade show active" id="danger-pills-home" role="tabpanel">
                                {{-- <div class="card"> --}}
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.no</th>
                                                        <th>Phone Number</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>$320,800</td>
                                                        <td>$320,800</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                {{-- </div> --}}
                            </div>
                            <div class="tab-pane fade" id="danger-pills-profile" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example3" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.no.</th>
                                                        <th>Booking Date</th>
                                                        <th>Order Id</th>
                                                        <th>Patient Name</th>
                                                        <th>Age/Sex</th>
                                                        <th>Lab Partner</th>
                                                        <th>Package/Test</th>
                                                        <th>Order Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
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
                            </div>
                            <div class="tab-pane fade" id="danger-pills-contact" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example4" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.no</th>
                                                        <th>Date</th>
                                                        <th>Order Id</th>
                                                        <th>Patient Name</th>
                                                        <th>Age/Sex</th>
                                                        <th>Lab Partner</th>
                                                        <th>Package/Test</th>
                                                        <th>Confirmation Date</th>
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
                                                        <td>$320,800</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="danger-pills-call-ceneter" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example5" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.no</th>
                                                        <th>Name</th>
                                                        <th>Lab Test</th>
                                                        <th>Medicine</th>
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
                                                       
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--end shop cart-->
        </div>
        <!-- end page content-->
    </div>
@endsection
