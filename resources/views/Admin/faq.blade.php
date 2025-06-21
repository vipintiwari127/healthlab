@extends('Admin.layout.admin')

@section('admin-content')
    <!-- Toastr CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    <div class="wrapper">
        <div class="page-content-wrapper">
            <div class="page-content">

                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Health Care</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0 align-items-center">
                                <li class="breadcrumb-item">
                                    <a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    FAQ's
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <button type="button" class="btn btn-primary addBtn" data-bs-toggle="modal" data-bs-target="#faqModal">
                    Add FAQ's
                </button>


                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Data</th>
                                        <th>Update Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $index => $faq)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <b>Ques:</b> {{ $faq->question }}<br>
                                                <b>Ans:</b>
                                                @php
                                                    $words = explode(' ', strip_tags($faq->answer));
                                                    $chunks = array_chunk($words, 20);
                                                    foreach ($chunks as $chunk) {
                                                        echo implode(' ', $chunk) . ',<br>';
                                                    }
                                                @endphp
                                            </td>
                                            <td>{{ $faq->updated_at->format('d-m-Y') }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm editBtn" data-id="{{ $faq->id }}"
                                                    data-question="{{ $faq->question }}" data-answer="{{ $faq->answer }}">
                                                    Edit
                                                </button>
                                                <button class="btn btn-danger btn-sm deleteBtn"
                                                    data-id="{{ $faq->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- FAQ Modal -->
                <div class="modal fade" id="faqModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">FAQ's</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form method="POST" action="{{ route('admin.faq.store') }}"
                                    class="row g-3 needs-validation" novalidate>
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="question" class="form-label">Question</label>
                                        <input type="text" name="question" class="form-control" id="question" required>
                                        <div class="invalid-feedback">Please enter a question.</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="answer" class="form-label">Answer</label>
                                        <input type="text" name="answer" class="form-control" id="answer" required>
                                        <div class="invalid-feedback">Please enter an answer.</div>
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
                <!-- End Modal -->

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Open modal in edit mode
            $('.editBtn').on('click', function() {
                const id = $(this).data('id');
                const question = $(this).data('question');
                const answer = $(this).data('answer');

                $('#faqModal form').attr('action', '/admin/faq/update/' + id);
                $('#faqModal input[name="question"]').val(question);
                $('#faqModal input[name="answer"]').val(answer);
                $('#faqModal').modal('show');
            });

            // Reset form on open for add
            $('.addBtn').on('click', function() {
                $('#faqModal form').attr('action', '{{ route('admin.faq.store') }}');
                $('#faqModal input[name="question"]').val('');
                $('#faqModal input[name="answer"]').val('');
            });

            // Delete with SweetAlert Confirmation
            $('.deleteBtn').on('click', function() {
                const id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This FAQ will be deleted!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/faq/delete/' + id,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                toastr.success("FAQ deleted successfully!");
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
