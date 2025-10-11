@extends('admin.layouts.app')
@section('panel')
    <nav class="page-breadcrumb">
        <a href="{{ route('admin.property.state.create') }}" class="btn btn-inverse-warning">Add State</a>
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
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($state as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <img src="{{ asset($item->image) }}" style="width: 70px; height: 40px;"
                                                alt="Image">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.property.state.edit', $item->id) }}" class="btn btn-inverse-info" title="Edit"><i
                                                    data-feather="edit"></i></a>
                                            <a href="{{ route('admin.property.state.delete', $item->id) }}" id="delete" class="btn btn-inverse-danger"
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
