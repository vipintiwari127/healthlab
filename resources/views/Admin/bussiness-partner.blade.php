@extends('Admin.layout.admin')
@section('admin-content')

<div class="wrapper">
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- Breadcrumb -->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Health Care</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item">
                                <a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Business Partner</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">
                Add Business Partner
            </button>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.no</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($partners as $key => $partner)
                                <tr id="row-{{ $partner->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset($partner->logo) }}" alt="Logo" width="50"></td>
                                    <td>{{ $partner->name }}</td>
                                    <td>{{ $partner->created_at }}</td>
                                    <td>{{ $partner->primary_email }}<br>{{ $partner->secondary_email }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm edit-btn" data-id="{{ $partner->id }}">Edit</button>
                                        <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $partner->id }}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Add Modal -->
            <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Business Partner</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="card-body p-4">
                            <form class="row g-3" id="businesspartnersForm" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Primary Email</label>
                                    <input type="email" name="primary_email" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Secondary Email</label>
                                    <input type="email" name="secondary_email" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Redirect To</label>
                                    <select class="form-control" name="redirect_to" required>
                                        <option value="">Select</option>
                                        <option value="website">Website</option>
                                        <option value="query-form">Query Form</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Logo</label>
                                    <input type="file" name="logo" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-light">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form id="businesspartnersEditForm" class="modal-content" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="edit_id">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Business Partner</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body row g-3 p-4">
                            <div class="col-md-12">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="editname" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Primary Email</label>
                                <input type="email" name="primary_email" class="form-control" id="editprimary_email" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Secondary Email</label>
                                <input type="email" name="secondary_email" class="form-control" id="editsecondary_email" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Redirect To</label>
                                <select class="form-control" name="redirect_to" id="editredirect_to" required>
                                    <option value="">Select</option>
                                    <option value="website">Website</option>
                                    <option value="query-form">Query Form</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Logo</label>
                                <input type="file" name="logo" class="form-control">
                                <img id="editLogoPreview" src="" alt="Logo Preview" width="80" class="mt-2">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-light">Reset</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
$(document).ready(function () {

    // Add
    $('#businesspartnersForm').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: "{{ url('admin/addbusiness') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() },
            success: function () {
                alert('Business Partner added!');
                $('#businesspartnersForm')[0].reset();
                $('#exampleLargeModal').modal('hide');
                location.reload();
            },
            error: function (xhr) {
                alert('Error: ' + JSON.stringify(xhr.responseJSON.errors));
            }
        });
    });

    // Edit Button Click
    $('.edit-btn').click(function () {
        let id = $(this).data('id');
        $.ajax({
            url: "/admin/editbusiness/" + id,
            type: "GET",
            success: function (data) {
                $('#edit_id').val(data.id);
                $('#editname').val(data.name);
                $('#editprimary_email').val(data.primary_email);
                $('#editsecondary_email').val(data.secondary_email);
                $('#editredirect_to').val(data.redirect_to);
                $('#editModal').modal('show');
$('#editLogoPreview').attr('src', '/' + data.logo);
            },
            error: function () {
                alert('Failed to fetch data.');
            }
        });
    });

    // Update
    $('#businesspartnersEditForm').submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: "{{ url('admin/updatebusiness') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function () {
                alert('Updated successfully!');
                $('#editModal').modal('hide');
                location.reload();
            },
            error: function (xhr) {
                alert('Error: ' + JSON.stringify(xhr.responseJSON.errors));
            }
        });
    });

    // Delete
    $('.delete-btn').click(function () {
        let id = $(this).data('id');
        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                url: "/admin/deletebusiness/" + id,
                type: "DELETE",
                data: { _token: '{{ csrf_token() }}' },
                success: function () {
                    $('#row-' + id).remove();
                    alert('Deleted successfully!');
                },
                error: function () {
                    alert('Delete failed!');
                }
            });
        }
    });

});
</script> --}}
<script>
$(document).ready(function () {

    // Add
    $('#businesspartnersForm').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: "{{ url('admin/addbusiness') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() },
            success: function () {
                toastr.success('Business Partner added!');
                $('#businesspartnersForm')[0].reset();
                $('#exampleLargeModal').modal('hide');
                setTimeout(() => location.reload(), 1500);
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                if (errors) {
                    $.each(errors, function (key, value) {
                        toastr.error(value[0]);
                    });
                } else {
                    toastr.error('Something went wrong!');
                }
            }
        });
    });

    // Edit Button Click
    $('.edit-btn').click(function () {
        let id = $(this).data('id');
        $.ajax({
            url: "/admin/editbusiness/" + id,
            type: "GET",
            success: function (data) {
                $('#edit_id').val(data.id);
                $('#editname').val(data.name);
                $('#editprimary_email').val(data.primary_email);
                $('#editsecondary_email').val(data.secondary_email);
                $('#editredirect_to').val(data.redirect_to);
                $('#editLogoPreview').attr('src', '/' + data.logo);
                $('#editModal').modal('show');
            },
            error: function () {
                toastr.error('Failed to fetch data.');
            }
        });
    });

    // Update
    $('#businesspartnersEditForm').submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: "{{ url('admin/updatebusiness') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function () {
                toastr.success('Updated successfully!');
                $('#editModal').modal('hide');
                setTimeout(() => location.reload(), 1500);
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                if (errors) {
                    $.each(errors, function (key, value) {
                        toastr.error(value[0]);
                    });
                } else {
                    toastr.error('Update failed!');
                }
            }
        });
    });

    // Delete with SweetAlert
    $('.delete-btn').click(function () {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "This will permanently delete the record.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/admin/deletebusiness/" + id,
                    type: "DELETE",
                    data: { _token: '{{ csrf_token() }}' },
                    success: function () {
                        toastr.success('Deleted successfully!');
                        setTimeout(() => location.reload(), 1500);
                    },
                    error: function () {
                        toastr.error('Delete failed!');
                    }
                });
            }
        });
    });

});
</script>

@endsection
