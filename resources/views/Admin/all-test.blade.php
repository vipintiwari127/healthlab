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
                                        <th>Test Name</th>
                                        <th>Category</th>
                                        <th>Specimen</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tests as $test)
                                        <tr>
                                            <td>{{ $test->test_name }}</td>
                                            <td>{{ $test->test_category }}</td>
                                            <td>{{ $test->specimen_requirement }}</td>
                                            <td>{{ $test->test_description }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('admin.statusAllTest', $test->id) }}">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm {{ $test->status ? 'btn-success' : 'btn-danger' }}">
                                                        {{ $test->status ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.editAllTest', $test->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form method="POST" action="{{ route('admin.deleteAllTest', $test->id) }}"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure?')"
                                                        class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
<<<<<<< HEAD
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body p-4">
                                        <form class="row g-3 needs-validation" novalidate="">
                                            <input type="hidden" name="id" id="review_id">
                                            <div class="col-md-10">
                                                <label for="bsValidation1" class="form-label">Upload CSV</label>
                                                <input type="file" class="form-control" id="upload_csv"
                                                    placeholder="Upload CSV" required="">
                                                <div class="invalid-feedback">
                                                    Please choose a Upload CSV.
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
                                <div class="col-md-6">
                                    <div class="card-body p-4">
                                        <form class="row g-3 needs-validation" novalidate="">
                                            <input type="hidden" name="id" id="review_id">
                                            <div class="col-md-12">
                                                <label for="bsValidation1" class="form-label">Test Name</label>
                                                <input type="text" class="form-control" id="test_name"
                                                    placeholder="Test Name" required="">
                                                <div class="invalid-feedback">
                                                    Please choose a Test Name.
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="bsValidation1" class="form-label">Category</label>
                                                <input type="text" class="form-control" id="test_category"
                                                    placeholder="Category" required="">
                                                <div class="invalid-feedback">
                                                    Please choose a Category.
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="bsValidation1" class="form-label">Specimen Requirement</label>
                                                <input type="text" class="form-control" id="specimen_requirement"
                                                    placeholder="Specimen Requirement" required="">
                                                <div class="invalid-feedback">
                                                    Please choose a Specimen Requirement.
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="bsValidation1" class="form-label">Description</label>
                                                <input type="text" class="form-control" id="test_description"
                                                    placeholder="Description" required="">
                                                <div class="invalid-feedback">
                                                    Please choose a Review Description.
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
=======
                            <div class="card-body p-4">
                                <form id="csv-form"  method="post" class="form-horizontal"
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

>>>>>>> 5bb8f7c (save)
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


        // Add or Update Form Submission
        $('#seoForm').on('submit', function(e) {
            e.preventDefault();
            let id = $('#seo_id').val();
            let url = id ? `/admin/seo-management/update/${id}` : `/admin/seo-management/store`;
            let method = id ? 'POST' : 'POST';

            $.ajax({
                url: url,
                method: method,
                data: $(this).serialize(),
                success: function(res) {
                    toastr.success(res.message);
                    $('#seoForm')[0].reset();
                    $('#seo_id').val('');
                    $('#exampleLargeModal').modal('hide');
                    location.reload();
                }
            });
        });

        // Edit
        function editSEO(id) {
            $.get(`/admin/seo-management/edit/${id}`, function(data) {
                $('#seo_id').val(data.id);
                $('[name="target_url"]').val(data.target_url);
                $('[name="meta_keyword"]').val(data.meta_keyword);
                $('[name="meta_description"]').val(data.meta_description);
                $('[name="meta_title"]').val(data.meta_title);
                $('[name="alt_tag"]').val(data.alt_tag);
                $('[name="canonical_code"]').val(data.canonical_code);
                $('[name="extra_meta"]').val(data.extra_meta);
                $('#exampleLargeModal').modal('show');
            });
        }


        $(document).ready(function() {
            // Delete with SweetAlert confirmation
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
                            url: `/admin/seo-management/delete/${id}`,
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
        });


        function toggleStatus(id) {
            $.ajax({
                url: '/admin/seo-management/status/' + id,
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
    </script>
@endsection
