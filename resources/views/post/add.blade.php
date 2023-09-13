@extends('layout.dashboard')

@section('title')
    Add Post
@endsection

@push('addStyle')
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <strong>Add Post</strong>
            </div>
            <div class="card-body">
                <form action="{{route('post.create')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input class="form-control" id="title" type="text" name="title">
                        @error('title')
                            <div class="invalid-feedback" style="display: inline">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="content">Content</label>
                        <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category">Category</label>
                        <input class="form-control" id="category" type="text" name="category">
                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-secondary" type="submit" name="status" value="draft">Draft</button>
                        <button class="btn btn-primary me-md-2" type="submit" name="status" value="publish">Publish</button>
                    </div>
                </form>
            </div>
          </div>
    </div>
    <!-- /.col-->
</div>
@endsection


@push('addScript')
@endpush
