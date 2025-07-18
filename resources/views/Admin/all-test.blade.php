@extends('admin.layout.admin')
@section('admin-content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                    data-bs-target="#exampleLargeModal">Add Test</button>
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#categoryLargeModal">Add Category</button> --}}

                <hr />
                <div class="row">
                    {{-- <div class="col-md-5">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Category List</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr.no.</th>
                                                <th>Test Category Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($testcategories as $key => $testcategory)
                                                <tr id="row-{{ $testcategory->id }}">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $testcategory->test_category_name }}</td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm"
                                                            onclick="editlabtest({{ $testcategory->id }})" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger category-delete-btn"
                                                            data-id="{{ $testcategory->id }}" title="Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Test List</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr.no.</th>
                                                <th>Test Name</th>
                                                <th>Category</th>
                                                <th>Specimen</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tests as $key => $test)
                                                <tr id="row-{{ $test->id }}">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $test->test_name }}</td>
                                                    <td>{{ $test->category->category_name ?? 'N/A' }}</td>
                                                    <td>{{ $test->specimen_requirement }}</td>
                                                    <td>
                                                        <button
                                                            class="btn btn-sm toggle-status {{ $test->status ? 'btn-success' : 'btn-danger' }}"
                                                            data-id="{{ $test->id }}">
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
                    </div>
                </div>



                <!-- category Modal -->
                {{-- <div class="modal fade" id="categoryLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="categoryForm">
                            @csrf
                            <input type="hidden" name="id" id="category_id">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitle">Add Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body row">
                                    <div class="card-body p-4">
                                        <div class="mb-3">
                                            <label class="form-label">Test Category Name</label>
                                            <input type="text" name="test_category_name" id="test_category_name"
                                                class="form-control" placeholder="Test Category Name" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="submitBtn" class="btn btn-success">Submit</button>
                                            <button type="reset" class="btn btn-light">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}

                {{-- test model --}}
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
                                                <label class="form-label">Multi Test Name</label>
                                                <input type="text" name="multi_test_name" id="multi_test_name"
                                                    class="form-control" placeholder="Multi Test Name">
                                            </div>
                                            <!-- New Field for Parameter -->
                                            <div class="mb-3">
                                                <label class="form-label">Parameter</label>
                                                <select class="form-control" name="parameter_type" id="parameter_type">
                                                    <option disabled selected value="">Select Parameter</option>
                                                    <option value="Profile">Profile</option>
                                                    <option value="Individual">Individual</option>
                                                </select>
                                            </div>

                                            <!-- This input will be shown only when 'Profile' is selected -->
                                            <div class="mb-3" id="profile_input_box" style="display: none;">
                                                <label class="form-label">Profile Name</label>
                                                <input type="text" name="profile_name" id="profile_name"
                                                    class="form-control" placeholder="Enter Profile Name">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>

                                                <!-- Search Input -->
                                                <input type="text" id="categorySearch" class="form-control mb-2"
                                                    placeholder="Search Category...">

                                                <!-- Scrollable Checkbox List -->
                                                <div id="categoryList" class="border rounded p-2"
                                                    style="max-height: 200px; overflow-y: auto;">
                                                    @foreach ($testcategories as $testcategory)
                                                        <div class="form-check category-item">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="test_category[]" value="{{ $testcategory->id }}"
                                                                id="category_{{ $testcategory->id }}">
                                                            <label class="form-check-label"
                                                                for="category_{{ $testcategory->id }}">
                                                                {{ $testcategory->category_name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Specimen Requirement</label>
                                                <input type="text" name="specimen_requirement"
                                                    id="specimen_requirement" class="form-control"
                                                    placeholder="Specimen Requirement">
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

                //edit test
                $(document).ready(function() {
                    // Toggle Profile input based on Parameter Type
                    $('#parameter_type').on('change', function() {
                        if ($(this).val() === 'Profile') {
                            $('#profile_input_box').show();
                        } else {
                            $('#profile_input_box').hide();
                            $('#profile_name').val('');
                        }
                    });

                    // Search filter for category list
                    $('#categorySearch').on('input', function() {
                        const value = $(this).val().toLowerCase();
                        $('.category-item').each(function() {
                            const label = $(this).text().toLowerCase();
                            $(this).toggle(label.includes(value));
                        });
                    });

                    // Edit button click
                    $('.edit-btn').on('click', function() {
                        const id = $(this).data('id');
                        $.get("{{ url('admin/edit-all-test') }}/" + id, function(data) {
                            $('#test_id').val(data.id);
                            $('#test_name').val(data.test_name);
                            $('#multi_test_name').val(data.multi_test_name);
                            $('#parameter_type').val(data.parameter_type).trigger('change');

                            // Show/hide profile_name field
                            if (data.parameter_type === 'Profile') {
                                $('#profile_input_box').show();
                                $('#profile_name').val(data.profile_name);
                            } else {
                                $('#profile_input_box').hide();
                                $('#profile_name').val('');
                            }

                            // Clear previous category selections
                            $('input[name="test_category[]"]').prop('checked', false);

                            // Check categories based on JSON array
                            if (Array.isArray(data.test_category)) {
                                data.test_category.forEach(function(catId) {
                                    $('#category_' + catId).prop('checked', true);
                                });
                            }

                            $('#specimen_requirement').val(data.specimen_requirement);
                            $('#test_description').val(data.test_description);
                            $('#upload_csv').val('');

                            $('#modalTitle').text('Edit Test');
                            $('#exampleLargeModal').modal('show');
                        });
                    });
                });


                // // Delete Test
                // $('.delete-btn').on('click', function() {
                //     const id = $(this).data('id');
                //     if (confirm("Are you sure you want to delete this test?")) {
                //         $.ajax({
                //             url: "{{ url('admin/delete-all-test') }}/" + id,
                //             type: "DELETE",
                //             data: {
                //                 _token: "{{ csrf_token() }}"
                //             },
                //             success: function(res) {
                //                 toastr.success(res.success);
                //                 $('#row-' + id).remove();
                //             },
                //             error: function() {
                //                 toastr.error("Failed to delete test.");
                //             }
                //         });
                //     }
                // });
            });
            // Toggle Status
            $(document).on('click', '.toggle-status', function() {
                const id = $(this).data('id');

                $.post("{{ url('admin/status-all-test') }}/" + id, {
                    _token: "{{ csrf_token() }}"
                }, function(res) {
                    if (res.success) {
                        toastr.success(res.success); // make sure `res.success` exists
                        setTimeout(() => location.reload(), 800);
                    } else {
                        toastr.error("Something went wrong!");
                    }
                }).fail(function() {
                    toastr.error("Unable to change status.");
                });
            });


            // $('#categoryForm').on('submit', function(e) {
            //     e.preventDefault();

            //     let id = $('#category_id').val();
            //     let url = id ? `/admin/Testcategory/update/${id}` : `/admin/Testcategory/store`;

            //     $.ajax({
            //         url: url,
            //         method: 'POST',
            //         data: $(this).serialize(),
            //         success: function(res) {
            //             toastr.success(res.message);
            //             $('#categoryForm')[0].reset();
            //             $('#category_id').val('');
            //             $('#modalTitle').text('Add Category');
            //             $('#categoryLargeModal').modal('hide');
            //             setTimeout(() => location.reload(), 1000); // reload with delay
            //         },
            //         error: function(err) {
            //             toastr.error('Something went wrong');
            //             console.log(err.responseJSON);
            //         }
            //     });
            // });

            // function editlabtest(id) {
            //     $.get(`/admin/Testcategory/edit/${id}`, function(data) {
            //         $('#category_id').val(data.id);
            //         $('#test_category_name').val(data.test_category_name);
            //         $('#modalTitle').text('Update Category'); // Optional - Title change
            //         $('#categoryLargeModal').modal('show');
            //     });
            // }

            // Delete  with SweetAlert Confirmation
            $('.category-delete-btn').on('click', function() {
                const id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This Data will be deleted!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `admin/delete-all-test/${id}`,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
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
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const parameterSelect = document.getElementById('parameter_type');
                const profileInputBox = document.getElementById('profile_input_box');

                parameterSelect.addEventListener('change', function() {
                    if (this.value === 'Profile') {
                        profileInputBox.style.display = 'block';
                    } else {
                        profileInputBox.style.display = 'none';
                    }
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('categorySearch');
                const categoryItems = document.querySelectorAll('.category-item');

                searchInput.addEventListener('input', function() {
                    const searchText = this.value.toLowerCase();
                    categoryItems.forEach(function(item) {
                        const label = item.textContent.toLowerCase();
                        item.style.display = label.includes(searchText) ? '' : 'none';
                    });
                });
            });
        </script>
    @endsection
