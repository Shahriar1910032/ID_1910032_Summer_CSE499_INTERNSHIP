@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Blog Comments</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>S1</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contactMessages as $key => $message)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->phone }}</td>
                                        <td>{{ $message->subject }}</td>
                                        <td>
                                            <a href="{{ route('admin.view.contact.message', $message->id) }}"
                                                class="btn btn-inverse-info" title="Edit">View</a>
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
