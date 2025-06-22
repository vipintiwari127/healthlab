@extends('admin.layout.admin')
@section('admin-content')
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
                                <li class="breadcrumb-item active">Lab Test</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">
                    Add Lab Test
                </button>
                <hr />

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Test Name</th>
                                        <th>Partner</th>
                                        <th>MRP Price</th>
                                        <th>Featured</th>
                                        <th>Status</th>
                                        <th>Added By</th>
                                        <th>Added On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($labtestData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->labPartner->name ?? 'N/A' }}</td>
                                            <td>{{ $item->test->test_name ?? 'N/A' }}</td>
                                            <td>{{ $item->lab_mrp_price }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        onchange="togglefeature({{ $item->id }})"
                                                        {{ $item->feature ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        onchange="toggleStatus({{ $item->id }})"
                                                        {{ $item->status ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>{{ $item->added_by ?? 'Admin' }}</td>
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

                {{-- Add/Edit Modal --}}
                <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Lab Test</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <form class="form-horizontal" id="labtest" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" id="labtest_id">

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label>Lab Partner</label>
                                            <select class="form-control" name="lab_partner_id" id="lab_partner_id" required>
                                                <option disabled selected>Select Lab Partner</option>
                                                @foreach ($labpartners as $labpartner)
                                                    <option value="{{ $labpartner->id }}">{{ $labpartner->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Test Name</label>
                                            <select class="form-control" name="test_id" id="test_id"
                                                onchange="get_catname(this.value);get_desc(this.value);get_spcmn(this.value);"
                                                required>
                                                <option disabled selected>Select Test Name</option>
                                                @foreach ($tests as $test)
                                                    <option value="{{ $test->id }}">{{ $test->test_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Category</label>
                                            <select class="form-control" name="category" id="category" required>
                                                <option disabled selected>Select Category</option>
                                                @foreach ($test_categories as $test)
                                                    <option value="{{ $test->id }}">{{ $test->test_category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <div class="col-sm-4">
                                            <label>Lab MRP Price</label>
                                            <input type="number" class="form-control" name="lab_mrp_price"
                                                id="lab_mrp_price" min="0" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Lab Net Price</label>
                                            <input type="number" class="form-control" name="lab_net_price"
                                                id="lab_net_price" min="0">
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Offer Price</label>
                                            <input type="number" class="form-control" name="offer_price" id="offer_price"
                                                min="0">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <div class="col-sm-4">
                                            <label>Reporting Time</label>
                                            <input type="text" class="form-control" name="reporting_time"
                                                id="reporting_time">
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Specimen Requirement</label>
                                            <input type="text" class="form-control" name="specimen_requirement"
                                                id="specimen_requirement" readonly>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Service Type</label><br>
                                            @foreach (['Lab', 'Home', 'Both'] as $type)
                                                <label class="me-3">
                                                    <input type="radio" name="service_type"
                                                        value="{{ $type }}" required> {{ $type }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group mt-3">
                                        <div class="col-sm-12">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="5" name="description" id="description" style="height:200px;"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group mt-3">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Save Lab Test</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- card-body -->
                        </div> <!-- modal-content -->
                    </div>
                </div>

            </div> <!-- page-content -->
        </div> <!-- page-content-wrapper -->
    </div> <!-- wrapper -->

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#labtest').on('submit', function(e) {
            e.preventDefault();
            let id = $('#labtest_id').val();
            let url = id ? `/admin/lab-test/update/${id}` : `/admin/lab-test/store`;

            $.post(url, $(this).serialize(), function(res) {
                toastr.success(res.message);
                $('#labtest')[0].reset();
                $('#labtest_id').val('');
                $('#exampleLargeModal').modal('hide');
                location.reload();
            });
        });

        function editlabtest(id) {
            $.get(`/admin/lab-test/edit/${id}`, function(data) {
                $('#labtest_id').val(data.id);
                $('#lab_partner_id').val(data.lab_partner_id);
                $('#test_id').val(data.test_id);
                $('#category').val(data.category);
                $('#lab_mrp_price').val(data.lab_mrp_price);
                $('#lab_net_price').val(data.lab_net_price);
                $('#offer_price').val(data.offer_price);
                $('#reporting_time').val(data.reporting_time);
                $('#specimen_requirement').val(data.specimen_requirement);
                $('#description').val(data.description);
                $('input[name="service_type"][value="' + data.service_type + '"]').prop('checked', true);
                $('#exampleLargeModal').modal('show');
            });
        }

        $(document).on('click', '.delete-btn', function() {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "This Lab Test will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/lab-test/delete/${id}`,
                        type: 'DELETE',
                        success: function(res) {
                            toastr.success(res.message);
                            setTimeout(() => location.reload(), 1000);
                        },
                        error: function() {
                            toastr.error("Something went wrong!");
                        }
                    });
                }
            });
        });

        function toggleStatus(id) {
            $.post(`/admin/lab-test/status/${id}`, function(res) {
                toastr.success(res.message);
            }).fail(function() {
                toastr.error("Status update failed.");
            });
        }

        function togglefeature(id) {
            $.post(`/admin/lab-test/feature/${id}`, function(res) {
                toastr.success(res.message);
            }).fail(function() {
                toastr.error("Feature update failed.");
            });
        }
    </script>
@endsection
