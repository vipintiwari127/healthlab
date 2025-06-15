@extends('Admin.layout.admin')
@section('admin-content')
<div class="wrapper">
    <div class="page-content-wrapper">
        <div class="page-content">

            <div class="card">
                <div class="card-body">
                    <h5 class="mb-0 text-uppercase">Website Announcement</h5>
                    <hr>
                    <form id="addWebsiteAnnouncementForm" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $announcement->id ?? '' }}">

                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $announcement->title ?? '' }}" required>
                            <div class="invalid-feedback">Please Input a Title.</div>
                        </div>

                        <div class="col-md-5">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" {{ empty($announcement) ? 'required' : '' }}>
                            <div class="invalid-feedback">Please choose an Image.</div>

                            @if(!empty($announcement->image))
                                <img src="{{ asset($announcement->image) }}" alt="Old Image" style="width: 100px; margin-top: 10px;">
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Announcement Message</label>
                            <textarea class="form-control" name="announcement_message" placeholder="Announcement Message ..." rows="3" required>{{ $announcement->announcement_message ?? '' }}</textarea>
                            <div class="invalid-feedback">Please enter a valid Announcement Message.</div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-check form-switch">
                                <label class="form-label">Display Announcement</label>
                                <input class="form-check-input" type="checkbox" name="display_announcement" value="1" {{ !empty($announcement->display_announcement) ? 'checked' : '' }}>
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

{{-- jQuery CDN --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#addWebsiteAnnouncementForm').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: "{{ url('/admin/savewebsite/announcement') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function(response) {
                alert('Announcement saved successfully!');
                location.reload();
            },
            error: function(xhr) {
                let errors = xhr.responseJSON?.errors;
                let errorMessages = '';
                if (errors) {
                    $.each(errors, function(key, value) {
                        errorMessages += value[0] + '\n';
                    });
                    alert(errorMessages);
                } else {
                    alert('Something went wrong.');
                }
            }
        });
    });
});
</script>
@endsection
