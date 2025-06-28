@extends('admin.layout.admin')
@section('admin-content')
    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Health lab</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Master Setup</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->


            <!--start shop cart-->
            <section class="shop-page">
                {{-- <h6 class="mb-0 text-uppercase">Danger Nav Pills</h6> --}}
                <hr>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-danger mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="pill" href="#danger-pills-home" role="tab"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="tab-icon"><ion-icon name="home-sharp" class="me-1"></ion-icon>
                                        </div> --}}
                                        <div class="tab-title">Country Management</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="danger-pills-tabContent">
                            {{-- country data --}}
                            <div class="tab-pane fade show active" id="danger-pills-home" role="tabpanel">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleLargeModal">Add Country</button><br><br>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.no</th>
                                                        <th>Country Name</th>
                                                        <th>Url </th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($countries as $key => $country)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $country->country_name }}</td>
                                                            <td>{{ $country->country_url }}</td>
                                                            <td>
                                                                @if ($country->status)
                                                                    <a href="{{ route('country.toggle', $country->id) }}"
                                                                        class="btn btn-success btn-sm">Active</a>
                                                                @else
                                                                    <a href="{{ route('country.toggle', $country->id) }}"
                                                                        class="btn btn-danger btn-sm">Inactive</a>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                <button class="btn btn-sm btn-info"
                                                                    onclick="editCountry({{ $country->id }})">Edit</button>
                                                                <button class="btn btn-sm btn-danger country-delete-btn"
                                                                    data-id="{{ $country->id }}">Delete</button>
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

                        {{-- country modal --}}
                        <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Country</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="card-body p-4">
                                        <form class="row g-3 needs-validation" novalidate="" id="countryForm">
                                            @csrf
                                            <input type="hidden" name="country_id" id="country_id">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="country_name" class="form-label">Country Name</label>
                                                    <input type="text" name="country_name" class="form-control"
                                                        id="country_name" placeholder="Country Name" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid Country Name.
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="country_url" class="form-label">URL</label>
                                                    <input type="text" name="country_url" class="form-control"
                                                        id="country_url" placeholder="URL" required readonly>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid URL.
                                                    </div>
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
                </div>
            </section>
            <!--end shop cart-->
        </div>
        <!-- end page content-->
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        //country form submission
        $('#countryForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('countries.store') }}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status == 'success') {
                        toastr.success(res.message);
                        $('#exampleLargeModal').modal('hide');
                        setTimeout(() =>
                            location.reload(), 1000);
                    }
                }
            });
        });

        //edit country
        function editCountry(id) {
            $.get("{{ url('/admin/countries/edit') }}/" + id, function(data) {
                $('#country_id').val(data.id);
                $('[name="country_name"]').val(data.country_name);
                $('[name="country_url"]').val(data.country_url);
                $('#exampleLargeModal').modal('show');
            });
        }

        // Delete counrty with SweetAlert Confirmation
        $('.country-delete-btn').on('click', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "This Country will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/admin/countries/delete') }}/" + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            toastr.success("Country deleted successfully!");
                            setTimeout(() => location.reload(), 1000);
                        },
                        error: function() {
                            toastr.error("Something went wrong!");
                        }
                    });
                }
            });
        });

        function resetForm() {
            $('#countryForm')[0].reset();
            $('#country_id').val('');
        }
    </script>
    <script>
        document.getElementById('country_name').addEventListener('input', function() {
            let name = this.value;
            let slug = name.toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '') // remove special chars
                .replace(/\s+/g, '-') // replace spaces with -
                .replace(/-+/g, '-'); // remove multiple dashes
            document.getElementById('country_url').value = slug;
        });
    </script>
@endsection
