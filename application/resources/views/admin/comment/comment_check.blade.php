@extends('admin.layouts.app')
@section('panel')
    <nav class="page-breadcrumb">
        <a href="{{ route('admin.contact.message.index') }}" class="btn btn-inverse-warning">Message List</a>
    </nav>

    <div class="col-xl-10 mx-auto mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Comment Details</h5>
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">👤 User Name:</label>
                    <div class="border p-2 rounded fw-bold">
                        {{ optional($comments->user)->name ?? 'Guest' }}
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">📝 Blog Title:</label>
                    <div class="border p-2 rounded fw-bold">
                        {{ optional($comments->blog)->title ?? 'N/A' }}
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">📌 Subject:</label>
                    <div class="border p-2 rounded fw-bold">
                        {{ $comments->subject ?? 'No Subject' }}
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">💬 Message:</label>
                    <div class="border p-2 rounded">
                        {{ $comments->message ?? '—' }}
                    </div>
                </div>

                <form id="myForm" action="{{ route('admin.blog.reply.comment') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $comments->id }}">
                    <input type="hidden" name="user_id" value="{{ $comments->user_id }}">
                    <input type="hidden" name="blog_id" value="{{ $comments->blog_id }}">

                    <div class="mb-3">
                        <label for="replySubject" class="form-label fw-bold">✍️ Reply Subject:</label>
                        <textarea name="subject" id="replySubject" rows="2" class="form-control" placeholder="Write a subject...">{{ old('subject') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="replyMessage" class="form-label fw-bold">✍️ Reply Message:</label>
                        <textarea name="message" id="replyMessage" rows="4" class="form-control" placeholder="Write your reply here...">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-reply"></i> Submit Reply
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
