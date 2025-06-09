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
                            <li class="breadcrumb-item active" aria-current="page">Master Setup</li>
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
                                        <div class="tab-title">Country Management</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#danger-pills-profile" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="tab-icon"><ion-icon name="person-sharp" class="me-1"></ion-icon>
                                        </div> --}}
                                        <div class="tab-title">State Management</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#danger-pills-contact" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="tab-icon"><ion-icon name="call-sharp" class="me-1"></ion-icon>
                                        </div> --}}
                                        <div class="tab-title">City Management</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="danger-pills-tabContent">
                            {{-- country data --}}
                            <div class="tab-pane fade show active" id="danger-pills-home" role="tabpanel">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleLargeModal">Add Country</button><br><br>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.no</th>
                                                        <th>Country Name</th>
                                                        <th>Url </th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
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
                            {{-- state data --}}
                            <div class="tab-pane fade" id="danger-pills-profile" role="tabpanel">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addStateModal">
                                    Add State
                                </button><br><br>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example3" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.no.</th>
                                                        <th>Country Name</th>
                                                        <th>State Name</th>
                                                        <th>State Url</th>
                                                        <th>State Code</th>
                                                        <th>Status</th>
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
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- city data --}}
                            <div class="tab-pane fade" id="danger-pills-contact" role="tabpanel">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addCityModal">
                                    Add City
                                </button><br><br>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example4" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                         <th>Sr.no.</th>
                                                        <th>Country Name</th>
                                                        <th>State Name</th>
                                                        <th>City Url</th>
                                                        <th>City Name</th>
                                                        <th>Status</th>
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
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- country modal --}}
                        <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Country</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="card-body p-4">
                                        <form class="row g-3 needs-validation" novalidate="">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="bsValidation4" class="form-label">Country Name </label>
                                                    <input type="text" class="form-control" id="bsValidation4"
                                                        placeholder="Country Name " required="">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid Country Name .
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="bsValidation4" class="form-label">Url </label>
                                                    <input type="text" class="form-control" id="bsValidation4"
                                                        placeholder="Url " required="">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid Url .
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
                        {{-- state modal --}}
                        <div class="modal fade" id="addStateModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Country</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="card-body p-4">
                                        <form class="row g-3 needs-validation" novalidate>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="countryName" class="form-label">Country Name</label>
                                                    <input type="text" class="form-control" id="countryName"
                                                        placeholder="Country Name" required>
                                                    <div class="invalid-feedback">Please provide a valid Country Name.
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="stateName" class="form-label">State Name</label>
                                                    <input type="text" class="form-control" id="stateName"
                                                        placeholder="State Name" required>
                                                    <div class="invalid-feedback">Please provide a valid State Name.</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="stateCode" class="form-label">State Code</label>
                                                    <input type="text" class="form-control" id="stateCode"
                                                        placeholder="State Code" required>
                                                    <div class="invalid-feedback">Please provide a valid State Code.</div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="url" class="form-label">URL</label>
                                                    <input type="text" class="form-control" id="url"
                                                        placeholder="URL" required>
                                                    <div class="invalid-feedback">Please provide a valid URL.</div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="aboutState" class="form-label">About State</label>
                                                    <input type="text" class="form-control" id="aboutState"
                                                        placeholder="About State" required>
                                                    <div class="invalid-feedback">Please provide valid details about the
                                                        state.</div>
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
                        {{-- city modal --}}
                        <div class="modal fade" id="addCityModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add City</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="card-body p-4">
                                        <form class="row g-3 needs-validation" novalidate>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="cityName" class="form-label">City Name</label>
                                                    <input type="text" class="form-control" id="cityName"
                                                        placeholder="City Name" required>
                                                    <div class="invalid-feedback">Please provide a valid City Name.</div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label for="state" class="form-label">State Name</label>
                                                    <input type="text" class="form-control" id="state"
                                                        placeholder="State Name" required>
                                                    <div class="invalid-feedback">Please provide a valid State Name.</div>
                                                </div>    
                                                
                                                <div class="col-md-12">
                                                    <label for="state" class="form-label">City Url</label>
                                                    <input type="text" class="form-control" id="city_url"
                                                        placeholder="City Url" required>
                                                    <div class="invalid-feedback">Please provide a valid City Url.</div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="aboutCity" class="form-label">About City</label>
                                                    <input type="text" class="form-control" id="aboutCity"
                                                        placeholder="About City" required>
                                                    <div class="invalid-feedback">Please provide valid information about
                                                        the city.</div>
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
                </div>
            </section>
            <!--end shop cart-->
        </div>
        <!-- end page content-->
    </div>
@endsection
