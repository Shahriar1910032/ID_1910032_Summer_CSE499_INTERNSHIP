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
                                    <th>Sl</th>
                                    <th>Blog</th>
                                    <th>User Name</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $key => $comment)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ optional($comment->blog)->title ?? 'N/A' }}</td>
                                        <td>{{ optional($comment->user)->name ?? 'Guest' }}</td>
                                        <td>{{ $comment->subject ?? 'No Subject' }}</td>
                                        <td>
                                            <a href="{{ route('admin.comment.check', $comment->id) }}"
                                               class="btn btn-inverse-info" title="Reply">Reply</a>                                
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
