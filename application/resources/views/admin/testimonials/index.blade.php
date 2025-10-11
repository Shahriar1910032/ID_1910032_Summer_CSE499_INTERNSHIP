@extends('admin.layouts.app')
@section('panel')
    <nav class="page-breadcrumb">
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-inverse-warning">Add Testimonial</a>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">State List</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>S1</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Desination</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($item->image) }}" style="width: 70px; height: 40px;"
                                                alt="Image">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->desination }}</td>
                                        <td>
                                            <a href="{{ route('admin.testimonials.details', $item->id) }}"
                                                class="btn btn-inverse-info" title="Edit"><i data-feather="edit"></i></a>
                                            <a href="{{ route('admin.testimonials.delete', $item->id) }}" id="delete"
                                                class="btn btn-inverse-danger" title="Delete"><i
                                                    data-feather="trash"></i></a>
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
