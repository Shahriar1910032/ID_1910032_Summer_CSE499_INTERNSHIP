@extends('admin.layouts.app')
@section('panel')
    <nav class="page-breadcrumb">
        <a href="#" class="btn btn-inverse-warning">Add Property</a>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Package History All</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>S1</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Package</th>
                                    <th>Invoice</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($packageHistory as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ !empty($item->agent->image) ? url('application/public/upload/agent/' . @$item->agent->image) : url('application/public/upload/no_image.jpg') }}"
                                                style="width: 70px; height: 40px;" alt="Image">
                                        </td>
                                        <td>{{ $item->agent->name }}</td>
                                        <td>{{ $item->package_name }}</td>
                                        <td>{{ $item->invoice }}</td>
                                        <td>{{ $item->package_amount }}</td>
                                        <td>{{ $item->created_at->format('l, d M Y') }}</td>

                                        <td>
                                            <a href="{{ route('admin.package.invoice.pdf', $item->id) }}"
                                                class="btn btn-inverse-warning btn-sm" title="Download"><i
                                                    data-feather="download"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <p class="text-danger" style="text-align: center"> <b>No Data Avaible In Table</b></p>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
