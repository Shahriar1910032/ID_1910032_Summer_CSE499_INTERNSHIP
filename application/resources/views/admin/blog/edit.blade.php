@extends('admin.layouts.app')
@section('panel')
    <nav class="page-breadcrumb">
        <a href="{{ route('admin.blog.index') }}" class="btn btn-inverse-warning">Blog List</a>
    </nav>
    <div class="col-md-8 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Edit Blog</h6>

                    <form id="myForm" action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
                                </div>
                            </div><!-- Col -->

                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-select" name="category_id" id="exampleFormControlSelect1">
                                        <option selected="" disabled="">Select Category</option>
                                        @foreach ($categorise as $category)
                                            
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $blog->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- Col -->

                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Short Description</label>
                                    <textarea class="form-control" name="meta_description" id="exampleFormControlTextarea1" rows="5">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Tags</label>
                                    <input type="text" data-role="tagsinput" name="tags" value="{{ $blog->tags }}"
                                        class="form-control" />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Long Description</label>
                                    <textarea name="description" class="form-control" id="summernote">{!! $blog->description !!}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Main Thambnail</label>
                                    <input type="file" name="image" class="form-control" onchange="mainThumUrl(this)">
                                </div>
                                <img src="{{ asset($blog->image) }}" alt="" id="mainThmb"
                                    class="wd-80 rounded-circle">
                            </div><!-- Col -->



                        </div><!-- Row -->

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection

@push('style')
@endpush

@push('script')
    {{-- show Image --}}
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
    {{-- show Image End --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                  

                },
                messages: {
                    title: {
                        required: 'Please Enter Blog Name',
                    },
                    category_id: {
                        required: 'Please Select Category',
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

    <!-- summernote cdn -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
    <!--End summernote cdn -->
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
@endpush
