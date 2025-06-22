@extends('admin.layout.admin')
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
                                    <a href="javascript:;">
                                        <ion-icon name="home-outline"></ion-icon>
                                    </a>
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
                    data-bs-target="#exampleLargeModal">Add
                    Package List</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Partner</th>
                                        {{-- <th>Partner Name</th> --}}
                                        <th>Test</th>
                                        <th>Feature</th>
                                        <th>Status</th>
                                        <th>Added By</th>
                                        <th>Added on</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Packages as $index => $Package)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $Package->partnerLab->name ?? 'N/A' }}</td>
                                            <td>{{ $Package->included_tests }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="featureSwitch{{ $Package->id }}"
                                                        onchange="toggleFeature({{ $Package->id }})"
                                                        {{ $Package->feature ? 'checked' : '' }}>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="statusSwitch{{ $Package->id }}"
                                                        onchange="toggleStatus({{ $Package->id }})"
                                                        {{ $Package->status ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>{{ $Package->name }}</td>

                                            <td>{{ $Package->created_at->format('d M Y') }}</td>
                                            <td>

                                                <button class="btn btn-sm btn-info"
                                                    onclick="editlabtest({{ $Package->id }})">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-btn"
                                                    data-id="{{ $Package->id }}">Delete</button>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Package List</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" novalidate="" id="packageForm">
                                    @csrf
                                    <input type="hidden" name="id" id="package_id">
                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name" required="">

                                        <div class="invalid-feedback">
                                            Please Selete a Name.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">Package</label>
                                        <select class="form-control" id="package_package" name="package_category" required>
                                            <option selected disabled>Select Package</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose a Package.
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">Partner</label>
                                        <select class="form-control" id="partner" name="partner" required>
                                            <option selected disabled>Select Partner</option>
                                            @foreach ($partners as $partner)
                                                <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose a Partner.
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="bsValidation1" class="form-label">Included Tests </label>
                                        <input type="text" class="form-control" name="included_tests" id="included_tests"
                                            placeholder="Included Tests " required="">
                                        <div class="invalid-feedback">
                                            Please choose a Included Tests .
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bsValidation1" class="form-label">Actual Price </label>
                                        <input type="number" class="form-control" name="actual_price" id="actual_price"
                                            placeholder="Actual Price" required="">
                                        <div class="invalid-feedback">
                                            Please choose a Actual Price.
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bsValidation1" class="form-label">NET Price </label>
                                        <input type="number" class="form-control" name="net_price" id="net_price"
                                            placeholder="NET Price" required="">
                                        <div class="invalid-feedback">
                                            Please choose a NET Price.
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bsValidation1" class="form-label">Offer Price</label>
                                        <input type="number" class="form-control" name="offer_price" id="offer_price"
                                            placeholder="Offer Price" required="">
                                        <div class="invalid-feedback">
                                            Please choose a Offer Price.
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bsValidation1" class="form-label">Total Parameters</label>
                                        <input type="text" class="form-control" name="total_parameters"
                                            id="total_parameters" placeholder="Total Parameters" required="">
                                        <div class="invalid-feedback">
                                            Please choose a Total Parameters.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">Reporting Time</label>
                                        <input type="text" class="form-control" name="reporting_time"
                                            id="reporting_time" placeholder="Reporting Time">
                                        <div class="invalid-feedback">
                                            Please choose a Reporting Time.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation1" class="form-label">Specimen Requirement</label>
                                        <input type="text" class="form-control" name="specimen_requirement"
                                            id="specimen_requirement" placeholder="Specimen Requirement" required="">
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
                                        <label for="bsValidation1" class="form-label">SThumbnail : (Size - 180 *
                                            90)</label>
                                        <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                                        <div class="invalid-feedback">
                                            Please choose a Image.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation1" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" placeholder="Description" name="description"></textarea>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Initialize Summernote
        $(document).ready(function() {
            $('#description').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['fontsize', 'color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['codeview']]
                ]
            });

            // Form Submit (Add / Update)
            $('#packageForm').on('submit', function(e) {
                e.preventDefault();

                let id = $('#package_id').val();
                let url = id ? `/admin/package/update/${id}` : `/admin/package/store`;

                // Get summernote content
                let descriptionHtml = $('#description').summernote('code');
                let formData = new FormData(this);
                formData.set('description', descriptionHtml);

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        toastr.success(res.message);
                        $('#packageForm')[0].reset();
                        $('#description').summernote('reset');
                        $('#package_id').val('');
                        $('#exampleLargeModal').modal('hide');
                        location.reload();
                    }
                });
            });

            // Delete with SweetAlert
            $(document).on('click', '.delete-btn', function() {
                const id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This SEO Data will be deleted!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/package/delete/${id}`,
                            type: 'DELETE',
                            success: function(response) {
                                toastr.success(response.message);
                                setTimeout(() => location.reload(), 1000);
                            },
                            error: function(xhr) {
                                toastr.error("Something went wrong!");
                                console.error(xhr.responseText);
                            }
                        });
                    }
                });
            });
        });

        // Edit Function
        function editlabtest(id) {
            $.get(`/admin/package/edit/${id}`, function(data) {
                $('#package_id').val(data.id);
                $('#name').val(data.name);
                $('#package_package').val(data.package_category);
                $('#partner').val(data.partner);
                $('#included_tests').val(data.included_tests);
                $('#actual_price').val(data.actual_price);
                $('#net_price').val(data.net_price);
                $('#offer_price').val(data.offer_price);
                $('#total_parameters').val(data.total_parameters);
                $('#reporting_time').val(data.reporting_time);
                $('#specimen_requirement').val(data.specimen_requirement);
                $('#description').summernote('code', data.description); // set HTML
                $('input[name="service_type"][value="' + data.service_type + '"]').prop('checked', true);
                $('#exampleLargeModal').modal('show');
            });
        }

        function toggleStatus(id) {
            $.ajax({
                url: '/admin/package/status/' + id,
                type: 'POST',
                success: function(res) {
                    toastr.success(res.message);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    toastr.error("Status update failed.");
                }
            });
        }

        function toggleFeature(id) {
            $.post("{{ url('/admin/package/feature-toggle/') }}/" + id, {
                _token: "{{ csrf_token() }}"
            }, function(res) {
                toastr.success(res.success);
            }).fail(function() {
                toastr.error('Failed to change feature status.');
            });
        }
    </script>
@endsection
