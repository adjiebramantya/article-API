@extends('layout.dashboard')

@section('title')
    Edit Post
@endsection

@push('addStyle')
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <strong>Edit Post</strong>
                <span class="small ms-1">{{ $data->title }}</span>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input class="form-control" id="title" type="text" value="{{ $data->title }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="content">Content</label>
                    <textarea class="form-control" id="content" rows="3">{{ $data->content }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="category">Title</label>
                    <input class="form-control" id="category" type="text" value="{{ $data->category }}">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-secondary" type="button">Draft</button>
                    <button class="btn btn-primary me-md-2" type="button">Publish</button>
                </div>
            </div>
          </div>
    </div>
    <!-- /.col-->
</div>
@endsection


@push('addScript')
@endpush
