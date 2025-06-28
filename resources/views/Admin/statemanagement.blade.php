@extends('admin.layout.admin')
@section('admin-content')
    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

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
                            <li class="nav-item " role="presentation">
                                <a class="nav-link active" data-bs-toggle="pill" href="#danger-pills-profile" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="tab-icon"><ion-icon name="person-sharp" class="me-1"></ion-icon>
                                        </div>--}}
                                        <div class="tab-title">State Management</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="danger-pills-tabContent">
                            {{-- state data --}}
                            <div class="tab-pane fade show active" id="danger-pills-profile" role="tabpanel">
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
                                                    @foreach ($state as $key => $statedata)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $statedata->country_name }}</td>
                                                            <td>{{ $statedata->stateName }}</td>
                                                            <td>{{ $statedata->stateUrl }}</td>
                                                            <td>{{ $statedata->stateCode }}</td>
                                                            <td>
                                                                @if ($statedata->status)
                                                                    <a href="{{ route('state.toggle', $statedata->id) }}"
                                                                        class="btn btn-success btn-sm">Active</a>
                                                                @else
                                                                    <a href="{{ route('state.toggle', $statedata->id) }}"
                                                                        class="btn btn-danger btn-sm">Inactive</a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-info"
                                                                    onclick="editState({{ $statedata->id }})">Edit</button>
                                                                <button class="btn btn-sm btn-danger state-delete-btn"
                                                                    data-id="{{ $statedata->id }}">Delete</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- state modal --}}
                        <div class="modal fade" id="addStateModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add State</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="card-body p-4">
                                        <form class="row g-3 needs-validation" novalidate="" id="stateForm">
                                            @csrf
                                            <input type="hidden" name="state_id" id="state_id">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="countryName" class="form-label">Country Name</label>
                                                    {{-- <input type="text" class="form-control" id="countryName"
                                                        name="countryName" placeholder="Country Name" required> --}}
                                                    <select name="countryName" id="countryName" class="form-control"
                                                        required>
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">
                                                                {{ $country->country_name }}</option>
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <div class="invalid-feedback">Please provide a valid Country Name.
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="stateName" class="form-label">State Name</label>
                                                    <input type="text" class="form-control" id="stateName"
                                                        name="stateName" placeholder="State Name" required>
                                                    <div class="invalid-feedback">Please provide a valid State Name.</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="stateCode" class="form-label">State Code</label>
                                                    <input type="text" class="form-control" id="stateCode"
                                                        name="stateCode" placeholder="State Code" required>
                                                    <div class="invalid-feedback">Please provide a valid State Code.</div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="url" class="form-label">URL</label>
                                                    <input type="text" class="form-control" id="stateUrl"
                                                        name="stateUrl" placeholder="URL" required readonly>
                                                    <div class="invalid-feedback">Please provide a valid URL.</div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="aboutState" class="form-label">About State</label>
                                                    <input type="text" class="form-control" id="aboutState"
                                                        name="aboutState" placeholder="About State" >
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
                    </div>
                </div>
            </section>
            <!--end shop cart-->
        </div>
        <!-- end page content-->
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>

        //state form submission
        $('#stateForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('state.store') }}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status == 'success') {
                        toastr.success(res.message);
                        $('#addStateModal').modal('hide');
                        setTimeout(() =>
                            location.reload(), 1000);
                    }
                }
            });
        });

        //edit state
        function editState(id) {
            $.get("{{ url('/admin/state/edit') }}/" + id, function(data) {
                $('#state_id').val(data.id);
                $('[name="countryName"]').val(data.countryName);
                $('[name="stateName"]').val(data.stateName);
                $('[name="stateCode"]').val(data.stateCode);
                $('[name="stateUrl"]').val(data.stateUrl);
                $('[name="aboutState"]').val(data.aboutState);
                $('#addStateModal').modal('show');
            });
        }
    
        // Delete state with SweetAlert Confirmation
        $('.state-delete-btn').on('click', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "This State will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/admin/state/delete') }}/" + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            toastr.success("State deleted successfully!");
                            setTimeout(() => location.reload(), 1000);
                        },
                        error: function() {
                            toastr.error("Something went wrong!");
                        }
                    });
                }
            });
        });
       

        function resetForm() {
            $('#stateForm')[0].reset();
            $('#state_id').val('');
        }

    </script>
    <script>
        document.getElementById('stateName').addEventListener('input', function() {
            let name = this.value;
            let slug = name.toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '') // remove special chars
                .replace(/\s+/g, '-') // replace spaces with -
                .replace(/-+/g, '-'); // remove multiple dashes
            document.getElementById('stateUrl').value = slug;
        });
    </script>
@endsection
