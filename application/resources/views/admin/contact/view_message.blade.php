@extends('admin.layouts.app')
@section('panel')
    <nav class="page-breadcrumb">
        <a href="{{ route('admin.blog.comment') }}" class="btn btn-inverse-warning">Comment List</a>
    </nav>

    <div class="col-xl-10 mx-auto mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Contact Message with {{ $contactMessage->name }}</h5>
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label fw-bold">User Name:</label>
                    <div class="border p-2 rounded fw-bold">
                        {{ $contactMessage->name }}
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">User Phone:</label>
                    <div class="border p-2 rounded fw-bold">
                        {{ $contactMessage->phone }}
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Email:</label>
                    <div class="border p-2 rounded fw-bold">
                        {{ $contactMessage->email }}
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Subject:</label>
                    <div class="border p-2 rounded fw-bold">
                        {{ $contactMessage->subject }}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="replyMessage" class="form-label fw-bold">✍️ Message:</label>
                    <textarea name="subject" rows="4" class="form-control">{{ $contactMessage->subject }}</textarea>
                </div>

            </div>
        </div>
    </div>
@endsection
