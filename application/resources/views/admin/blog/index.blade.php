@extends('admin.layouts.app')
@section('panel')
    <nav class="page-breadcrumb">
        <a href="{{ route('admin.blog.create') }}" class="btn btn-inverse-warning">Add Blog</a>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Blog List</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>S1</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $key => $blog)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($blog->image) }}" style="width: 70px; height: 40px;"
                                                alt="Image">
                                        </td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->category->name }}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input flexSwitchCheckStatus" type="checkbox"
                                                    data-activations-status="{{ $blog->status }}"
                                                    data-id="{{ $blog->id }}" data-type="blogs"
                                                    id="flexSwitchCheckStatus{{ $blog->id }}"
                                                    {{ $blog->status == 1 ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-inverse-info" title="Edit"><i
                                                    data-feather="edit"></i></a>
                                            <a href="{{ route('admin.blog.delete', $blog->id) }}" id="delete" class="btn btn-inverse-danger"
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
@endsection
