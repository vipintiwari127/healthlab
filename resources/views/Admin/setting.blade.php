@extends('admin.layout.admin')
@section('admin-content')
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
                            <li class="breadcrumb-item active" aria-current="page">Setting</li>
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
                                        <div class="tab-title">General</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#danger-pills-profile" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="tab-icon"><ion-icon name="person-sharp" class="me-1"></ion-icon>
                                        </div> --}}
                                        <div class="tab-title">Social Media</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#danger-pills-contact" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        {{-- <div class="tab-icon"><ion-icon name="call-sharp" class="me-1"></ion-icon>
                                        </div> --}}
                                        <div class="tab-title">SEO</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="danger-pills-tabContent">
                            <div class="tab-pane fade show active" id="danger-pills-home" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="row g-3 needs-validation" novalidate method="POST"
                                            enctype="multipart/form-data" id="blogForm"
                                            action="{{ route('admin.general.store') }}">
                                            @csrf
                                            <div class="col-md-3">
                                                <label for="image" class="form-label">Website Logo</label>
                                                <input type="file" class="form-control" name="website_image"
                                                    id="website_image" required>
                                                <div class="invalid-feedback">Please choose a Image.</div>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="site_name" class="form-label">Site Name </label>
                                                <input type="text" class="form-control" name="site_name" id="site_name"
                                                    required>
                                                <div class="invalid-feedback">Please choose a Site Name.</div>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="search_distance" class="form-label">Search Distance</label>
                                                <input type="text" class="form-control" name="search_distance"
                                                    id="search_distance" required>
                                                <div class="invalid-feedback">Please enter a Search Distance.</div>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="primary_phone" class="form-label">Primary Phone </label>
                                                <input type="number" class="form-control" name="primary_phone"
                                                    id="primary_phone" required>
                                                <div class="invalid-feedback">Please enter a Primary Phone.</div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="alternative_phone" class="form-label">Alternative Phone </label>
                                                <input type="number" class="form-control" name="alternative_phone"
                                                    id="alternative_phone" required>
                                                <div class="invalid-feedback">Please enter a Alternative Phone.</div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="website_email" class="form-label">Website Email </label>
                                                <input type="text" class="form-control" name="website_email"
                                                    id="website_email" required>
                                                <div class="invalid-feedback">Please enter a Website Email.</div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="booking_email" class="form-label">Booking Form Email </label>
                                                <input type="text" class="form-control" name="booking_email"
                                                    id="booking_email" required>
                                                <div class="invalid-feedback">Please enter a Booking Form Email.</div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="contact_email" class="form-label">Contact Form Email </label>
                                                <input type="text" class="form-control" name="contact_email"
                                                    id="contact_email" required>
                                                <div class="invalid-feedback">Please enter a Contact Form Email.</div>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="bussiness_address_1" class="form-label">Business Address 1
                                                </label>
                                                <textarea class="form-control" name="bussiness_address_1" id="bussiness_address_1" rows="3" required></textarea>
                                                <div class="invalid-feedback">Please enter a Business Address 1.</div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="copyright_context" class="form-label">Copyright Context
                                                </label>
                                                <textarea class="form-control" name="copyright_context" id="copyright_context" rows="3" required></textarea>
                                                <div class="invalid-feedback">Please enter a Copyright Context.</div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="footer_about_company" class="form-label">Footer About Company
                                                </label>
                                                <textarea class="form-control" name="footer_about_company" id="footer_about_company" rows="3" required></textarea>
                                                <div class="invalid-feedback">Please enter a Footer About Company .</div>
                                            </div>

                                            <!-- START: Slider Container -->
                                            <div id="slider-container">
                                                <div class="row slider-group">
                                                    <div class="col-md-6">
                                                        <label for="slider_image" class="form-label">Home Page Slider
                                                            Banner</label>
                                                        <input type="file" class="form-control" name="slider_image[]"
                                                            required>
                                                        <div class="invalid-feedback">Please choose an Image.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="slider_title" class="form-label">Home Page Slider
                                                            Title</label>
                                                        <input type="text" class="form-control" name="slider_title[]"
                                                            required>
                                                        <div class="invalid-feedback">Please choose a Title.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="button_name" class="form-label">Home Page Slider
                                                            Button Name</label>
                                                        <input type="text" class="form-control" name="button_name[]"
                                                            required>
                                                        <div class="invalid-feedback">Please choose a Button Name.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="slider_link" class="form-label">Home Page Slider
                                                            Link</label>
                                                        <input type="text" class="form-control" name="slider_link[]"
                                                            required>
                                                        <div class="invalid-feedback">Please choose a Link</div>
                                                    </div>
                                                    <div class="col-12 text-end mt-2">
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm remove-slider-btn d-none">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END: Slider Container -->

                                            <!-- Add Slider Button -->
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-success mb-3" id="add-slider-btn">+
                                                    Add Slider</button>
                                            </div>

                                            <!-- Submit & Reset Buttons -->
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
                            <div class="tab-pane fade" id="danger-pills-profile" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="row g-3 needs-validation" novalidate method="POST"
                                            enctype="multipart/form-data" id="blogForm"
                                            action="{{ route('admin.blog.store') }}">
                                            @csrf
                                            <div class="col-md-4">
                                                <label for="facebook_url" class="form-label">Facebook URL </label>
                                                <input type="text" class="form-control" name="facebook_url"
                                                    id="facebook_url" required>
                                                <div class="invalid-feedback">Please choose a Facebook URL.</div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="twitter_url" class="form-label">Twitter URL</label>
                                                <input type="text" class="form-control" name="twitter_url"
                                                    id="twitter_url" required>
                                                <div class="invalid-feedback">Please enter a Twitter URL.</div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="linkedin_url" class="form-label">Linkedin URL</label>
                                                <input type="text" class="form-control" name="linkedin_url"
                                                    id="linkedin_url" required>
                                                <div class="invalid-feedback">Please enter a Linkedin URL.</div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="instagram_url" class="form-label">Instagram URL
                                                </label>
                                                <input type="text" class="form-control" name="instagram_url"
                                                    id="instagram_url" required>
                                                <div class="invalid-feedback">Please enter a Instagram URL.</div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="youtube_url" class="form-label">Youtube URL </label>
                                                <input type="text" class="form-control" name="youtube_url"
                                                    id="youtube_url" required>
                                                <div class="invalid-feedback">Please enter a Youtube URL .</div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="google_plus_url" class="form-label">Goople Plus URL </label>
                                                <input type="text" class="form-control" name="google_plus_url"
                                                    id="google_plus_url" required>
                                                <div class="invalid-feedback">Please enter a Goople Plus URL .</div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="pintrest_url" class="form-label">Pintrest URL </label>
                                                <input type="text" class="form-control" name="pintrest_url"
                                                    id="pintrest_url" required>
                                                <div class="invalid-feedback">Please enter a Pintrest URL.</div>
                                            </div>

                                            <!-- Submit & Reset Buttons -->
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
                            <div class="tab-pane fade" id="danger-pills-contact" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="row g-3 needs-validation" novalidate method="POST"
                                            enctype="multipart/form-data" id="blogForm"
                                            action="{{ route('admin.blog.store') }}">
                                            @csrf
                                            <div class="col-md-6">
                                                <label for="default_meta_title" class="form-label">Default Meta Title </label>
                                                <input type="text" class="form-control" name="default_meta_title"
                                                    id="default_meta_title" required>
                                                <div class="invalid-feedback">Please choose a Default Meta Title .</div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="meta_keyword" class="form-label">Meta Keyword </label>
                                                <input type="text" class="form-control" name="meta_keyword"
                                                    id="meta_keyword" required>
                                                <div class="invalid-feedback">Please enter a Meta Keyword .</div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="meta_description" class="form-label">Default Meta Description</label>
                                                <input type="text" class="form-control" name="meta_description"
                                                    id="meta_description" required>
                                                <div class="invalid-feedback">Please enter a Default Meta Description.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="extra_meta" class="form-label">Home Page Extra Meta 
                                                </label>
                                                <input type="text" class="form-control" name="extra_meta"
                                                    id="extra_meta" required>
                                                <div class="invalid-feedback">Please enter a Home Page Extra Meta .</div>
                                            </div>
                                            
                                            <!-- Submit & Reset Buttons -->
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
    <script>
        $(document).ready(function() {
            $('#add-slider-btn').on('click', function() {
                let $original = $('.slider-group').first();
                let $clone = $original.clone();

                // Clear input values
                $clone.find('input').val('');

                // Show remove button in cloned sets
                $clone.find('.remove-slider-btn').removeClass('d-none');

                $('#slider-container').append($clone);
            });

            // Remove the specific slider group
            $(document).on('click', '.remove-slider-btn', function() {
                $(this).closest('.slider-group').remove();
            });
        });
    </script>

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
            let url = id ? `/admin/seo-management/update/${id}` : `/admin/general/settin/update/`;
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
            $.get(`/admin/general/settin/edit/${id}`, function(data) {
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


    
    </script>
    
@endsection
