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
                                <li class="breadcrumb-item active" aria-current="page">Lab Test</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">Add Lab Test</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Test Name</th>
                                        <th>Partner</th>
                                        <th>MRP Price</th>
                                        <th>Featured</th>
                                        <th>Status</th>
                                        <th>Added By</th>
                                        <th>Added On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($labtestData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->test_id }}</td>
                                            <td>{{ $item->lab_partner_id }}</td>
                                            <td>{{ $item->lab_mrp_price }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="statusfeature{{ $item->id }}" onchange="togglefeature({{ $item->id }})" {{ $item->feature ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="statusSwitch{{ $item->id }}" onchange="toggleStatus({{ $item->id }})" {{ $item->status ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>{{ $item->added_by ?? 'Admin' }}</td>
                                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info" onclick="editlabtest({{ $item->id }})">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $item->id }}">Delete</button>
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
                                <h5 class="modal-title">Add Lab Test</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="form-horizontal" id="labtest" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" id="labtest_id">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Lab Partner</label>
                                            <select class="form-control" name="lab_partner_id" id="lab_partner_id" required>
                                                <option selected disabled>Select Lab Partner</option>
                                                <option value="12">PS.PATHLAB SARASWATI VIHAR</option>
                                                <option value="12">PS.PATHLAB ROHINI SECTOR -05</option>
                                                <option value="4">PS.PATHLAB ROHINI SECTOR-06</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Name</label>
                                            <select class="form-control" name="test_id" id="test_id" required>
                                                <option selected disabled>Select Test Name</option>
                                                <option value="5282">MRI PELVIS WITH CONTRAST</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Category</label>
                                            <select class="form-control" name="category" id="category" required>
                                                <option selected disabled>Select Category</option>
                                                <option value="pathology">pathology</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Lab MRP Price</label>
                                            <input type="number" class="form-control" name="lab_mrp_price" id="lab_mrp_price" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Lab Net Price</label>
                                            <input type="number" class="form-control" name="lab_net_price" id="lab_net_price">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Offer Price</label>
                                            <input type="number" class="form-control" name="offer_price" id="offer_price">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Reporting Time</label>
                                            <input type="time" class="form-control" name="reporting_time" id="reporting_time">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Specimen Requirement</label>
                                            <input type="text" class="form-control" name="specimen_requirement" id="specimen_requirement">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Service Type</label><br>
                                            <label><input name="service_type" type="radio" value="Lab"> Lab</label>
                                            <label><input name="service_type" type="radio" value="Home"> Home</label>
                                            <label><input name="service_type" type="radio" value="Both"> Both</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" id="description" class="form-control" style="height: 200px;"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-light">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#labtest').on('submit', function(e) {
            e.preventDefault();
            let id = $('#labtest_id').val();
            let url = id ? `/admin/lab-test/update/${id}` : `/admin/lab-test/store`;

            $.ajax({
                url: url,
                method: 'POST',
                data: $(this).serialize(),
                success: function(res) {
                    toastr.success(res.message);
                    $('#labtest')[0].reset();
                    $('#labtest_id').val('');
                    $('#exampleLargeModal').modal('hide');
                    location.reload();
                }
            });
        });

        function editlabtest(id) {
            $.get(`/admin/lab-test/edit/${id}`, function(data) {
                $('#labtest_id').val(data.id);
                $('#lab_partner_id').val(data.lab_partner_id);
                $('#test_id').val(data.test_id);
                $('#category').val(data.category);
                $('#lab_mrp_price').val(data.lab_mrp_price);
                $('#lab_net_price').val(data.lab_net_price);
                $('#offer_price').val(data.offer_price);
                $('#reporting_time').val(data.reporting_time);
                $('#specimen_requirement').val(data.specimen_requirement);
                $('#description').val(data.description);
                $('input[name="service_type"][value="' + data.service_type + '"]').prop('checked', true);
                $('#exampleLargeModal').modal('show');
            });
        }

        $(document).on('click', '.delete-btn', function() {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "This labtest Data will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/lab-test/delete/${id}`,
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

        function toggleStatus(id) {
            $.ajax({
                url: '/admin/lab-test/status/' + id,
                type: 'POST',
                success: function(res) {
                    toastr.success(res.message);
                },
                error: function(xhr) {
                    toastr.error("Status update failed.");
                }
            });
        }

        function togglefeature(id) {
            $.ajax({
                url: '/admin/lab-test/feature/' + id,
                type: 'POST',
                success: function(res) {
                    toastr.success(res.message);
                },
                error: function(xhr) {
                    toastr.error("Feature update failed.");
                }
            });
        }
    </script>
@endsection
