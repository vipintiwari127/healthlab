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
                                    Category List
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Add
                    Category List</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Name</th>
                                        <th>Url</th>
                                        <th>status</th>
                                        <th>Last Update On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoryData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->category_name ?? 'N/A' }}</td>
                                            <td>{{ $item->url ?? 'N/A' }}</td>
                                            {{-- <td>{{ $item->lab_mrp_price }}</td>
                                    <td>
                                       <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                id="statusfeature{{ $item->id }}"
                                                onchange="togglefeature({{ $item->id }})" {{ $item->feature ? 'checked' :
                                            '' }}>
                                        </div>
                                    </td> --}}
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="statusSwitch{{ $item->id }}"
                                                        onchange="toggleStatus({{ $item->id }})"
                                                        {{ $item->status ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            {{-- <td>{{ $item->added_by ?? 'Admin' }}</td> --}}
                                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info"
                                                    onclick="editlabtest({{ $item->id }})">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-btn"
                                                    data-id="{{ $item->id }}">Delete</button>
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
                                <h5 class="modal-title">Add Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" id="categoryForm" novalidate>
                                    @csrf
                                    <input type="hidden" name="id" id="category_id">
                                    <div class="col-md-10">
                                        <label class="form-label">Category Name</label>
                                        <input type="text" class="form-control" id="category_name" name="category_name"
                                            placeholder="Category Name" required>
                                        <div class="invalid-feedback">
                                            Please choose a Category Name.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">URL</label>
                                        <input type="url" class="form-control" name="url" id="url"
                                            placeholder="URL" required>
                                        <div class="invalid-feedback">
                                            Please choose a URL.
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


        $('#categoryForm').on('submit', function(e) {
            e.preventDefault();

            let id = $('#category_id').val();
            let url = id ? `/admin/category/update/${id}` : `/admin/category/store`;

            $.ajax({
                url: url,
                method: 'POST',
                data: $(this).serialize(),
                success: function(res) {
                    toastr.success(res.message);
                    $('#categoryForm')[0].reset();
                    $('#category_id').val('');
                    $('#exampleLargeModal').modal('hide');
                    location.reload();
                },
                error: function(err) {
                    toastr.error('Something went wrong');
                    console.log(err.responseJSON);
                }
            });
        });


        // Edit
        function editlabtest(id) {
            $.get(`/admin/category/edit/${id}`, function(data) {
                $('#category_id').val(data.id);
                $('#category_name').val(data.category_name);
                $('#url').val(data.url);
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
                            url: `/admin/category/delete/${id}`,
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
                url: '/admin/category/status/' + id,
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
