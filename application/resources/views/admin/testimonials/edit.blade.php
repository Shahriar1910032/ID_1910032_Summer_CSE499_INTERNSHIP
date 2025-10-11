@extends('admin.layouts.app')
@section('panel')
    <nav class="page-breadcrumb">
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-inverse-warning">State List</a>
    </nav>
    <div class="col-md-8 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Edit Testimonail</h6>

                    <form id="myForm" action="{{ route('admin.testimonials.update', $testimonials->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="exampleInputUsername1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                                value="{{ $testimonials->name }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputUsername1" class="form-label">Desination</label>
                            <input type="text" class="form-control" name="desination" id="desination" autocomplete="off"
                                value="{{ $testimonials->desination }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputUsername1" class="form-label">Desination</label>
                            <textarea class="form-control" name="short_desc" id="exampleFormControlTextarea1" rows="5">{{ old('short_desc', $testimonials->short_desc ?? '') }}</textarea>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <div class=" form-group mb-3">
                                    <label class="form-label">Testimonials Image</label>
                                    <input type="file" name="image" class="form-control" onchange="mainThumUrl(this)">
                                </div>
                            </div><!-- Col -->

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <img id="mainThmb" src="{{ asset($testimonials->image) }}" alt="admin"
                                        class="rounded-circle p-1 bg-primary" width="100">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary me-3 mt-3">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        function mainThumUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    desination: {
                        required: true,
                    },

                },
                messages: {
                    name: {
                        required: 'Please Enter Name',
                    },
                     desination: {
                        required: 'Please Enter Desination',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endpush
