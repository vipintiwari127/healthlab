@extends('admin.layout.admin')
@section('admin-content')
    <!-- Toastr CSS/JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    </script>

    <div class="wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Health Care</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0 align-items-center">
                                <li class="breadcrumb-item">
                                    <a href="#"><ion-icon name="home-outline"></ion-icon></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleLargeModal">Add Blogs</button>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Blog Image</th>
                                        <th>Blog Data</th>
                                        {{-- <th>Blog Url</th> --}}
                                        {{-- <th>Blog Description</th> --}}
                                        <th>Posting Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $index => $blog)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="Blog Image"
                                                    width="80" height="60">
                                            </td>
                                            <td>
                                                <p><b>Title:</b> {{ $blog->title }}</p>

                                                <p><b>Url:</b> {{ $blog->url }}</p>
                                            </td>



                                            <td>{{ $blog->posting_date }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info"
                                                    onclick="editBlog({{ $blog->id }})">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-btn"
                                                    data-id="{{ $blog->id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Blog Modal -->
                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Blogs</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" novalidate method="POST"
                                    enctype="multipart/form-data" id="blogForm" action="{{ route('admin.blog.store') }}">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="posting_date" class="form-label">Blog Posting Date</label>
                                        <input type="date" class="form-control" name="posting_date" id="posting_date"
                                            required>
                                        <div class="invalid-feedback">Please choose a Blog Posting Date.</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="image" class="form-label">Blog Image</label>
                                        <input type="file" class="form-control" name="image" id="image" required>
                                        <div class="invalid-feedback">Please choose a Blog Image.</div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="title" class="form-label">Blog Title</label>
                                        <input type="text" class="form-control" name="title" id="title" required>
                                        <div class="invalid-feedback">Please enter a Blog Title.</div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="url" class="form-label">Blog URL</label>
                                        <input type="text" class="form-control" name="url" id="url" required
                                            readonly>
                                        <div class="invalid-feedback">Please enter a Blog URL.</div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Full Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="4">
                                            {{ old('description', $blog->description ?? '') }}
                                        </textarea>

                                        <div class="invalid-feedback">Please enter a Full Description.</div>
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

                <!-- JS Functions -->
                <script>
                    function editBlog(id) {
                        $.get('/admin/blog/edit/' + id, function(data) {
                            $('#exampleLargeModal').modal('show');
                            $('#blogForm').attr('action', '/admin/blog/update/' + id);
                            $('#posting_date').val(data.posting_date);
                            $('#title').val(data.title);
                            $('#url').val(data.url);
                            $('#description').val(data.description);
                            $('#image').removeAttr('required');
                        });
                    }


                    // Delete with SweetAlert Confirmation
                    $('.delete-btn').on('click', function() {
                        const id = $(this).data('id');

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "This Blog will be deleted!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: '/admin/blog/delete/' + id,
                                    type: 'DELETE',
                                    data: {
                                        "_token": "{{ csrf_token() }}"
                                    },
                                    success: function(response) {
                                        toastr.success("Blog deleted successfully!");
                                        setTimeout(() => location.reload(), 1000);
                                    },
                                    error: function() {
                                        toastr.error("Something went wrong!");
                                    }
                                });
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    {{-- <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        function slugify(text) {
            return text
                .toString()
                .toLowerCase()
                .trim()
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(/[^\w\-]+/g, '') // Remove all non-word chars
                .replace(/\-\-+/g, '-'); // Replace multiple - with single -
        }

        document.getElementById('title').addEventListener('input', function() {
            const slug = slugify(this.value);
            document.getElementById('url').value = slug;
        });
    </script>
@endsection
