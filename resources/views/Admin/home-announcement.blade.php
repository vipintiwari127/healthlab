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
                                    Website Announcement
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Add
                    Website Announcement</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Name</th>
                                        {{-- <th>Email</th> --}}
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($HomeAnnouncements as $index => $HomeAnnouncement)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $HomeAnnouncement->title }}</td>
                                            {{-- <td>{{ $HomeAnnouncement->button_name }}</td> --}}
                                            <td>{{ $HomeAnnouncement->link }}</td>
                                            <td>{{ $HomeAnnouncement->message }}</td>
                                            <td> <input class="form-check-input status-toggle" type="checkbox"
                                                    data-id="{{ $HomeAnnouncement->id }}"
                                                    {{ $HomeAnnouncement->status ? 'checked' : '' }}></td>
                                            <td>{{ $HomeAnnouncement->created_at }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-btn"
                                                    data-id="{{ $HomeAnnouncement->id }}">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-btn"
                                                    data-id="{{ $HomeAnnouncement->id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- add home-announcement referral modal --}}

                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Website Announcement</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" id="home-announcementForm" novalidate>
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="bsValidation3" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="bsValidation3" name="title"
                                            placeholder="Title" required>
                                        <div class="invalid-feedback">
                                            Please choose a Title.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation4" class="form-label">Button Name</label>
                                        <input type="text" class="form-control" name="button_name" id="bsValidation4"
                                            placeholder="Button Name" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Button Name.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation12" class="form-label">Link</label>
                                        <input type="text" class="form-control" id="bsValidation12" name="link"
                                            placeholder="Link" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid Link.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="home_announcement_image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="home_announcement_image"
                                            name="image" accept="image/*" required>
                                        <!-- Existing image loaded from DB -->
                                        <img id="existing_home_announcement_image" src="" alt="Current Image"
                                            style="max-height: 100px; margin-top: 10px; display: none;">
                                        <div class="invalid-feedback">
                                            Please upload a valid image.
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Announcement Message</label>
                                        <textarea class="form-control" id="bsValidation13" name="message" placeholder="Announcement Message ..." rows="3"
                                            required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter a valid Announcement Message.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-switch">
                                            <label for="display_announcement" class="form-label">Display
                                                Announcement</label>
                                            <input class="form-check-input" type="checkbox" name="display_announcement"
                                                id="display_announcement" checked>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check form-switch">
                                            <label for="display_query_form" class="form-label">Display Query Form</label>
                                            <input class="form-check-input" type="checkbox" name="display_query_form"
                                                id="display_query_form" checked>
                                        </div>
                                    </div>
                                    <h6>Query Form Fields</h6>
                                    <div class="col-md-3">
                                        <div class="form-check form-switch">
                                            <label for="show_name_field" class="form-label">Name</label>
                                            <input class="form-check-input" type="checkbox" name="show_name_field"
                                                id="show_name_field" checked>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check form-switch">
                                            <label for="show_email_field" class="form-label">Email</label>
                                            <input class="form-check-input" type="checkbox" name="show_email_field"
                                                id="show_email_field" checked>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check form-switch">
                                            <label for="show_phone_field" class="form-label">Phone</label>
                                            <input class="form-check-input" type="checkbox" name="show_phone_field"
                                                id="show_phone_field" checked>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check form-switch">
                                            <label for="show_message_field" class="form-label">Message</label>
                                            <input class="form-check-input" type="checkbox" name="show_message_field"
                                                id="show_message_field" checked>
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

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Home Announcement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="card-body p-4">
                            <form class="row g-3 needs-validation" id="editHomeAnnouncementForm" novalidate>
                                @csrf
                                <input type="hidden" id="edit_home_announcement_id" name="id">
                                <div class="col-md-12">
                                    <label for="edit_title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="edit_title" name="title"
                                        placeholder="Title" required>
                                    <div class="invalid-feedback">
                                        Please choose a Title.
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="edit_button_name" class="form-label">Button Name</label>
                                    <input type="text" class="form-control" id="edit_button_name" name="button_name"
                                        placeholder="Button Name" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Button Name.
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="edit_link" class="form-label">Link</label>
                                    <input type="text" class="form-control" id="edit_link" name="link"
                                        placeholder="Link" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid Link.
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="edit_home_announcement_image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="edit_home_announcement_image"
                                        name="image" accept="image/*">
                                    <div class="invalid-feedback">
                                        Please upload a valid image.
                                    </div>
                                    <!-- Existing image loaded from DB -->
                                    <img id="existing_home_announcement_image" src="" alt="Current Image"
                                        style="max-height: 100px; margin-top: 10px; display: none;">

                                    <!-- Preview of selected new image -->
                                    <img id="preview_edit_home_image" src="" alt="New Preview"
                                        style="max-height: 100px; margin-top: 10px; display: none;">
                                </div>


                                <div class="col-md-12">
                                    <label for="edit_message" class="form-label">Announcement Message</label>
                                    <textarea class="form-control" id="edit_message" name="message" placeholder="Announcement Message ..."
                                        rows="3" required></textarea>
                                    <div class="invalid-feedback">
                                        Please enter a valid Announcement Message.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-switch">
                                        <label for="edit_display_announcement" class="form-label">Display
                                            Announcement</label>
                                        <input class="form-check-input" type="checkbox" name="display_announcement"
                                            id="edit_display_announcement">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-switch">
                                        <label for="edit_display_query_form" class="form-label">Display Query Form</label>
                                        <input class="form-check-input" type="checkbox" name="display_query_form"
                                            id="edit_display_query_form">
                                    </div>
                                </div>
                                <h6>Query Form Fields</h6>
                                <div class="col-md-3">
                                    <div class="form-check form-switch">
                                        <label for="edit_show_name_field" class="form-label">Name</label>
                                        <input class="form-check-input" type="checkbox" name="show_name_field"
                                            id="edit_show_name_field">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check form-switch">
                                        <label for="edit_show_email_field" class="form-label">Email</label>
                                        <input class="form-check-input" type="checkbox" name="show_email_field"
                                            id="edit_show_email_field">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check form-switch">
                                        <label for="edit_show_phone_field" class="form-label">Phone</label>
                                        <input class="form-check-input" type="checkbox" name="show_phone_field"
                                            id="edit_show_phone_field">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check form-switch">
                                        <label for="edit_show_message_field" class="form-label">Message</label>
                                        <input class="form-check-input" type="checkbox" name="show_message_field"
                                            id="edit_show_message_field">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4">Update</button>
                                        <button type="button" class="btn btn-light px-4"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            // Add Home Announcement
            $('#home-announcementForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ url('admin/addhome/announcement') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.success('Home announcement added successfully!');
                        $('#home-announcementForm')[0].reset();
                        $('#exampleLargeModal').modal('hide');
                        setTimeout(() => location.reload(), 1500);
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function(key, value) {
                                toastr.error(value[0]);
                            });
                        } else {
                            toastr.error('Something went wrong. Please try again.');
                        }
                    }
                });
            });

            // Delete Home Announcement
            $('.delete-btn').click(function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This home announcement will be deleted.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/deletehome-announcement/' + id,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function() {
                                toastr.success(
                                    'Home announcement deleted successfully.');
                                setTimeout(() => location.reload(), 1500);
                            },
                            error: function() {
                                toastr.error('Failed to delete home announcement.');
                            }
                        });
                    }
                });
            });

            // Toggle Status
            $('.status-toggle').change(function() {
                let id = $(this).data('id');
                $.post('/admin/statushome-announcement/' + id, {}, function() {
                    toastr.success('Status updated.');
                    setTimeout(() => location.reload(), 1500);
                }).fail(function() {
                    toastr.error('Failed to update status.');
                });
            });

            // Load Edit Modal
            $('.edit-btn').on('click', function() {
                let id = $(this).data('id');

                $.ajax({
                    url: "/admin/edithome-announcement/" + id,
                    type: "GET",
                    success: function(data) {
                        $('#edit_home_announcement_id').val(data.id);
                        $('#edit_title').val(data.title);
                        $('#edit_button_name').val(data.button_name);
                        $('#edit_link').val(data.link);
                        $('#edit_message').val(data.message);
                        $('#edit_display_announcement').prop('checked', data
                            .display_announcement);
                        $('#edit_display_query_form').prop('checked', data.display_query_form);
                        $('#edit_show_name_field').prop('checked', data.show_name_field);
                        $('#edit_show_email_field').prop('checked', data.show_email_field);
                        $('#edit_show_phone_field').prop('checked', data.show_phone_field);
                        $('#edit_show_message_field').prop('checked', data.show_message_field);

                        // Show existing image from database
                        if (data.image) {
                            let imagePath = '/' + data.image;
                            $('#existing_home_announcement_image').attr('src', imagePath)
                        .show();
                            console.log("Loaded existing image:", imagePath);
                        } else {
                            $('#existing_home_announcement_image').hide();
                        }

                        $('#preview_edit_home_image').hide(); // reset preview
                        $('#editModal').modal('show');
                    },
                    error: function() {
                        toastr.error('Failed to fetch home announcement data.');
                    }
                });
            });

            // Image preview on file select in edit form
            $('#edit_home_announcement_image').on('change', function(event) {
                const preview = $('#preview_edit_home_image');
                const file = event.target.files[0];
                if (file) {
                    preview.attr('src', URL.createObjectURL(file)).show();
                } else {
                    preview.hide();
                }
            });

            // Submit Edit Form with Image
            $('#editHomeAnnouncementForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ url('/admin/updatehome-announcement') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function() {
                        toastr.success('Home announcement updated successfully!');
                        $('#editModal').modal('hide');
                        setTimeout(() => location.reload(), 1500);
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function(key, value) {
                                toastr.error(value[0]);
                            });
                        } else {
                            toastr.error('Something went wrong. Please try again.');
                        }
                    }
                });
            });

        });
    </script>
@endsection
