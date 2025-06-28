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
                                    SEO Management
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->

                {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Add SEO Management</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Url</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($seoData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->target_url }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="statusSwitch{{ $item->id }}"
                                                        onchange="toggleStatus({{ $item->id }})"
                                                        {{ $item->status ? 'checked' : '' }}>
                                                </div>
                                            </td>

                                            <td>
                                                <button class="btn btn-sm btn-info"
                                                    onclick="editSEO({{ $item->id }})">Edit</button>
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

                <!-- Modal -->
                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add / Edit SEO Management</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="seoForm">
                                @csrf
                                <input type="hidden" name="id" id="seo_id">
                                <div class="modal-body p-4">
                                    <div class="mb-3">
                                        <label class="form-label">Target URL</label>
                                        <input type="text" name="target_url" class="form-control"
                                            placeholder="Enter Target URL" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Meta Keyword</label>
                                        <input type="text" name="meta_keyword" class="form-control"
                                            placeholder="Enter Meta Keyword">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Meta Description</label>
                                        <input type="text" name="meta_description" class="form-control"
                                            placeholder="Enter Meta Description">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control"
                                            placeholder="Enter Meta Title">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Alt Tag</label>
                                        <input type="text" name="alt_tag" class="form-control"
                                            placeholder="Enter Alt Tag">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Canonical Code</label>
                                        <input type="text" name="canonical_code" class="form-control"
                                            placeholder="Enter Canonical Code">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Extra Meta</label>
                                        <input type="text" name="extra_meta" class="form-control"
                                            placeholder="Enter Extra Meta">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save SEO</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
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
