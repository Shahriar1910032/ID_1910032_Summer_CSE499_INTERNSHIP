@extends('admin.layouts.app')
@section('panel')
    <nav class="page-breadcrumb">
        {{-- <button type="button" class="btn btn-inverse-warning addBtn">Add Product</button> --}}
        <button type="button" class="btn btn-inverse-warning" data-bs-toggle="modal" data-bs-target="#addCategory">
            Add Category
        </button>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Category List</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>S1</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td>
                                            {{-- <a href="" class="btn btn-inverse-info" title="Edit"><i
                                                    data-feather="edit"></i></a> --}}

                                            {{-- <button type="button" class="btn btn-inverse-info editBtn"
                                                onclick="categoryEdit(this.id)">Edit</button> --}}

                                            <button type="button" class="btn btn-inverse-info" data-bs-toggle="modal"
                                                data-bs-target="#catEdit" id="{{ $item->id }}"
                                                onclick="categoryEdit(this.id)">
                                                Edit
                                            </button>

                                            <a href="{{ route('admin.blog.category.delete', $item->id) }}" id="delete" class="btn btn-inverse-danger"
                                                title="Delete"><i data-feather="trash"></i></a>
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

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" action="{{ route('admin.blog.category.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="exampleInputUsername1" class="form-label">Blog Category Name</label>
                            <input type="text" class="form-control" name="name" autocomplete="off"
                                value="{{ old('name') }}">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End Add Category Modal -->

    <!-- Edit Category Modal -->
    <div class="modal fade" id="catEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="abc" action="{{ route('admin.blog.category.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" id="cat_id" value="">

                        <div class="form-group mb-3">
                            <label for="exampleInputUsername1" class="form-label">Blog Category Name</label>
                            <input type="text" class="form-control" name="name" id="cat" autocomplete="off"
                                value="{{ old('name') }}">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End Edit Category Modal -->

    <!-- Modal -->
    {{-- <div class="modal fade" id="categoryModal" tabindex="-1">
        <div class="modal-dialog">
            <form id="myForm" action="{{ route('admin.blog.category.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Product Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="exampleInputUsername1" class="form-label">Blog Category Name</label>
                            <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                                value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" aria-label="Add To Wishlist" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}
@endsection

@push('script')
    {{-- <script>
        (function($) {
            "use strict"

            let addModal = $("#categoryModal");

            $('.addBtn').on("click", function() {
                addModal.modal("show");
            });

        })(jQuery);
    </script> --}}

    <script type="text/javascript">
        function categoryEdit(id) {
            let url = "{{ route('admin.blog.category.edit', ':id') }}".replace(':id', id);

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: url,

                success: function(data) {
                    //console.log(data)
                    $('#cat_id').val(data.id);
                    $('#cat').val(data.name);
                }
            })
        }
    </script>


    {{-- category Edit --}}
    {{-- <script type="text/javascript">
        function categoryEdit(id) {
            let url = "{{ route('admin.blog.category.edit', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                type: "GET",
                dataType: 'json',
                url: url,


                success: function(data) {

                    console.console.log(data);

                    // $('#name').val(data.name);
                }
            })
        }
    </script> --}}
    {{-- end category edit --}}



    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },

                },
                messages: {
                    name: {
                        required: 'Please Enter Category Name',
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


 <script type="text/javascript">
        $(document).ready(function() {
            $('#abc').validate({
                rules: {
                    name: {
                        required: true,
                    },

                },
                messages: {
                    name: {
                        required: 'Please Enter Category Name',
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
