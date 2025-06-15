@extends('Admin.layout.admin')
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
                                    Review
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Add Review</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Review By</th>
                                        <th>Rating</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $key => $rev)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $rev->review_by }}</td>
                                            <td>{{ $rev->rating }}</td>
                                            <td>{{ $rev->message }}</td>
                                            <td>{{ $rev->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-btn"
                                                    data-id="{{ $rev->id }}">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-btn"
                                                    data-id="{{ $rev->id }}">Delete</button>
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
                                <h5 class="modal-title">Review</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" novalidate="">
                                    <input type="hidden" name="id" id="review_id">
                                    <div class="col-md-10">
                                        <label for="bsValidation1" class="form-label">Review By</label>
                                        <input type="text" class="form-control" id="review_by" placeholder="Review By"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please choose a Review By.
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="bsValidation1" class="form-label">Rating</label>
                                        <input type="number" class="form-control" id="rating" placeholder="Rating"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please choose a Rating.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation1" class="form-label">Review Message</label>
                                        <input type="text" class="form-control" id="message"
                                            placeholder="Review Message" required="">
                                        <div class="invalid-feedback">
                                            Please choose a Review Message.
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
        $(document).ready(function() {
            // Submit form
            $('form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ url('admin/review/store') }}",
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: $('#review_id').val(),
                        review_by: $('#review_by').val(),
                        rating: $('#rating').val(),
                        message: $('#message').val()
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $('#exampleLargeModal').modal('hide');
                        location.reload();
                    }
                });
            });

            // Edit button
            $('.edit-btn').click(function() {
                const id = $(this).data('id');
                $.get("{{ url('admin/review/edit') }}/" + id, function(data) {
                    $('#review_id').val(data.id);
                    $('#review_by').val(data.review_by);
                    $('#rating').val(data.rating);
                    $('#message').val(data.message);
                    $('#exampleLargeModal').modal('show');
                });
            });


            // Delete with SweetAlert Confirmation
            $('.delete-btn').on('click', function() {
                const id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This Review will be deleted!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/review/delete/' + id,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                toastr.success("Review deleted successfully!");
                                setTimeout(() => location.reload(), 1000);
                            },
                            error: function() {
                                toastr.error("Something went wrong!");
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
