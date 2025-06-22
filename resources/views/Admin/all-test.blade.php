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

                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Add Manage All Test</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Test Name</th>
                                        <th>Category</th>
                                        <th>Specimen</th>
                                      
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tests as $test)
                                        <tr id="row-{{ $test->id }}">
                                            <td>{{ $test->test_name }}</td>
                                            <td>{{ $test->test_category }}</td>
                                            <td>{{ $test->specimen_requirement }}</td>
                                           
                                            <td>
                                                <button class="btn btn-sm toggle-status" data-id="{{ $test->id }}">
                                                    {{ $test->status ? 'Active' : 'Inactive' }}
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning btn-sm edit-btn"
                                                    data-id="{{ $test->id }}">Edit</button>
                                                <button class="btn btn-danger btn-sm delete-btn"
                                                    data-id="{{ $test->id }}">Delete</button>
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
                        <form id="testForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="test_id">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitle">Add Business Partner</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body row">
                                    <div class="col-md-6">
                                        <div class="card-body p-4">
                                            <div class="mb-3">
                                                <label class="form-label">Upload CSV</label>
                                                <input type="file" name="upload_csv" class="form-control" id="upload_csv"
                                                    accept=".csv">
                                                <div class="invalid-feedback">Please choose a CSV file.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body p-4">
                                            <div class="mb-3">
                                                <label class="form-label">Test Name</label>
                                                <input type="text" name="test_name" id="test_name" class="form-control"
                                                    placeholder="Test Name">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <input type="text" name="test_category" id="test_category"
                                                    class="form-control" placeholder="Category">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Specimen Requirement</label>
                                                <input type="text" name="specimen_requirement" id="specimen_requirement"
                                                    class="form-control" placeholder="Specimen Requirement">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <input type="text" name="test_description" id="test_description"
                                                    class="form-control" placeholder="Description">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="submitBtn" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-light">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end page content-->
            </div>
        </div>
        <script>
            $(document).ready(function() {
                // Submit Form (Add / Update / CSV Upload)
                $('#testForm').on('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData(this);
                    const id = $('#test_id').val();
                    const hasCSV = $('#upload_csv').val() !== "";
                    let url = "";

                    if (hasCSV) {
                        url = "{{ route('admin.uploadAllTestCSV') }}";
                    } else {
                        url = id ? "{{ route('admin.updateAllTest') }}" : "{{ route('admin.addAllTest') }}";
                    }

                    $.ajax({
                        url: url,
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(res) {
                            toastr.success(id ? "Test updated!" : (hasCSV ? "CSV Uploaded!" :
                                "Test added!"));
                            $('#testForm')[0].reset();
                            $('#exampleLargeModal').modal('hide');
                            setTimeout(() => location.reload(), 1000);
                        },
                        error: function(xhr) {
                            let error = xhr.responseJSON?.message || "Something went wrong!";
                            toastr.error(error);
                        }
                    });
                });

                // Edit Test
                $('.edit-btn').on('click', function() {
                    const id = $(this).data('id');
                    $.get("{{ url('admin/edit-all-test') }}/" + id, function(data) {
                        $('#test_id').val(data.id);
                        $('#test_name').val(data.test_name);
                        $('#test_category').val(data.test_category);
                        $('#specimen_requirement').val(data.specimen_requirement);
                        $('#test_description').val(data.test_description);
                        $('#upload_csv').val('');
                        $('#modalTitle').text('Edit Test');
                        $('#exampleLargeModal').modal('show');
                    });
                });

                // Delete Test
                $('.delete-btn').on('click', function() {
                    const id = $(this).data('id');
                    if (confirm("Are you sure you want to delete this test?")) {
                        $.ajax({
                            url: "{{ url('admin/delete-all-test') }}/" + id,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(res) {
                                toastr.success(res.success);
                                $('#row-' + id).remove();
                            },
                            error: function() {
                                toastr.error("Failed to delete test.");
                            }
                        });
                    }
                });

                // Toggle Status
                $('.toggle-status').on('click', function() {
                    const id = $(this).data('id');
                    $.post("{{ url('admin/status-all-test') }}/" + id, {
                        _token: "{{ csrf_token() }}"
                    }, function(res) {
                        toastr.success(res.success);
                        setTimeout(() => location.reload(), 800);
                    }).fail(function() {
                        toastr.error("Unable to change status.");
                    });
                });
            });
        </script>
    @endsection
